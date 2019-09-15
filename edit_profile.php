<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['save']))
{
  $_SESSION['fnameErr']=$_SESSION['lnameErr']=$_SESSION['phoneErr']=$_SESSION['genderErr']=$_SESSION['mailErr']="";
    $_SESSION['error']="";
    $var1=0;
    if(empty($_POST['fname'])) {
        $_SESSION['fnameErr']="Firstname can not be empty!";
        $var1=1;
    }
    if(empty($_POST['phone'])) {
        $_SESSION['phoneErr']="Phone no. can not be empty!";
        $var1=1;
    }
    if(empty($_POST['gender'])) {
        $_SESSION['genderErr']="Please select a gender";
        $var1=1;
    }
    if(empty($_POST['mail'])) {
        $_SESSION['mailErr']="E-mail can not be empty!";
        $var1=1;
    }
    if($var1==1) {
        header("location:edit_profile.php");
    }

    else{

    $fname=mysqli_real_escape_string($conn, $_POST['fname']);
    $lname=mysqli_real_escape_string($conn, $_POST['lname']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $mail=mysqli_real_escape_string($conn, $_POST['email']);
    $bday=$_POST['birthday'];

    $var=0;
    if(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
        $_SESSION['fnameErr']="Only letters and white space allowed!"; $var=1; }
    if(!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $_SESSION['lnameErr']="Only letters and white space allowed!"; $var=1; }
    if(!preg_match("/^[0-9 ]*$/",$phone)) {
        $_SESSION['phoneErr']="Only numerals allowed!"; $var=1; }
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",  $mail)) {
      $_SESSION['mailErr']="E-mail is not valid!"; $var=1; }

    if($var==1){
        header("location:edit_profile.php");
    }

    else{
    $sqr="UPDATE `user` SET firstname='$fname', lastname='$lname', phone='$phone' birthday='$bday', gender='$gender', email='$mail' WHERE user_id='$user_id'";
    $result= mysqli_query($conn, $sqr) or die(mysqli_error($conn));
    if($result) {
      $_SESSION['scs']= "Successfully saved :)";
      header("location:profile_page.php");
    }
    else {
      $_SESSION['err']= "Something is wrong, please try again later!";
      header("location:profile_page.php");
    }
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
ul.horizontal {
  list-style-type: none;
  margin: 0;
  padding: 1.5%;
  overflow: hidden;
  background-color: #534;
}
ul.vertical {
  list-style-type: none;
  margin: 0;
  padding: 0;
  margin-top: 0px;
  width: 150px;
  height: 600px;
  background-color: #333;
}
li a.list2 {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}
li.list1 {
  float: left;
  border-right:2px solid #bbb;
}
li:last-child {
  border-right: none;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 18px 25px;
  text-decoration: none;
}
li a:hover:not(.active) {
  background-color: #111;
}
.active {
  background-color: #86DF20;
}
#error
    {
      color: red;
      font-size: 70%;
    }
input{
  height: 40px;
  width: 20%;
  border-color: #534;
  border-width: 2px;
  border-radius: 3px;
  margin-top: 7px;
  border-radius: 5px;

}
</style>
</head>
<body bgcolor="lightgrey" background="bg2.png">

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a class="active" href="#edit">Edit</a></li>
  <li class="list1"><a href="contact.html">Friend List</a></li>
  <li class="list1"><a href="photos.html">My Photos</a></li>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<p id="edit">
<form action="edit_profile.php" method="POST" style="font-size: 25px;text-align: center;"><b>
  <label for="fname">Firstname:</label>
  <input type="text" id="fname" name="fname" value="<?php echo $firstname; ?>" autofocus><span id="error">*<?php echo $_SESSION['fnameErr']; $_SESSION['fnameErr']=""; ?></span><br>
  <label for="lname">Lastname:</label>
  <input type="text" id="lname" name="lname" value="<?php echo $lastname; ?>"><span id="error">*<?php echo $_SESSION['lnameErr']; $_SESSION['lnameErr']=""; ?></span><br>
  <label for="phone">Phone No.:</label>
  <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"><span id="error">*<?php echo $_SESSION['phoneErr']; $_SESSION['phoneErr']=""; ?></span><br>
  <label for="bday" >Birthday:</label>
  <input type="date" id="bday" name="birthday" value="<?php echo $birthday; ?>"><br>
  <label>Gender:</label>
  <input type="radio" id="male" name="gender" value="<?php echo $gender; ?>" style="width: 5%;">Male
  <input type="radio" id="female" name="gender" value="<?php echo $gender; ?>" style="width: 5%;">Female<br>
  <label for="email">E-mail:</label>
  <input type="text" id="email" name="email" value="<?php echo $mail; ?>"><span id="error">*<?php echo $_SESSION['emailErr']; $_SESSION['emailErr']=""; ?></span><br><br>
  <input type="submit" name="save" value="Save" style="background-color:#534;width: 7%;">
</form></b>
</p>
</body>
</html>
