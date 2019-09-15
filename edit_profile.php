<?php

include 'connection.php';
include 'session.php';

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
  background-color: #333;
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
  background-color: #4CAF50;
}
#error
    {
      color: red;
      font-size: 70%;
    }
</style>
</head>
<body>

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="#contact">Friend List</a></li>
    <li class="list1"><a href="#contact">My Photos</a></li>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<div style="float: right;">
<img src="<?php echo $img_location; ?>"alt="Profile picture"><br>
<b>Change profile picture</b>
<form action="profile_photo.php" method="POST">
 <input type="file" name="edit_profile_photo" placeholder="Edit Profile Photo"><br>
 <input type="submit" name="change_profile_photo" value="Change Profile Picture">
</form>
</div>

<form action="edit_profilephp.php" method="POST">
  <label for="fname">Firstname:</label>
  <input type="text" id="fname" name="fname" value="<?php echo $firstname; ?>" autofocus><span id="error">*<?php echo $_SESSION['fnameErr']; $_SESSION['fnameErr']=""; ?></span><br>
  <label for="lname">Lastname:</label>
  <input type="text" id="lname" name="lname" value="<?php echo $lastname; ?>"><span id="error"><?php echo $_SESSION['lnameErr']; $_SESSION['lnameErr']=""; ?></span><br>
  <label for="phone">Phone No.:</label>
  <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"><span id="error">*<?php echo $_SESSION['phoneErr']; $_SESSION['phoneErr']=""; ?></span><br>
  <label for="bday" >Birthday:</label>
  <input type="date" id="bday" name="birthday" value="<?php echo $birthday; ?>"><br>
  <label>Gender:</label>
  <input type="radio" id="male" name="gender" value="<?php echo $gender; ?>">
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="<?php echo $gender; ?>">
  <label for="female">Female</label><span id="error">*<?php echo $_SESSION['genderErr']; $_SESSION['genderErr']=""; ?></span><br>
  <label for="email">E-mail:</label>
  <input type="text" id="email" name="email" value="<?php echo $mail; ?>"><span id="error">*<?php echo $_SESSION['emailErr']; $_SESSION['emailErr']=""; ?></span><br>
  <input type="submit" name="save" value="Save">
</form>
</body>
</html>

