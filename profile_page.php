<?php

include 'connection.php';
include 'session.php';
if(isset($_SESSION['scs'])) {
  echo $_SESSION['scs'];
  unset($_SESSION['scs']);
}
if(isset($_SESSION['err'])) {
  echo $_SESSION['err'];
  unset($_SESSION['err']);
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
</style>
</head>
<body>

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
  <li class="list1"><a  href="home.php">Home</a></li>
  <li class="list1"><a class="active" href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="#contact">Friend List</a></li>
    <li class="list1"><a href="#contact">My Photos</a></li>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<form><input type="button" onclick="window.location.href='edit_profile.php'" value="Edit" style="float: right;margin-right: 50px;font-size: 25px;"></form>

<h2 style="float: left; margin-left: 80px;font-size: 30px;">Hi &nbsp;<?php echo $firstname; ?></h2>
<center>
<img style="border-radius: 4px;" src="<?php echo $img_location; ?>"><br>
<b><?php echo $firstname;?> &nbsp; <?php echo $lastname; ?></b>
</center>

<br><br>
<h1 align="center">Personl Info</h1>
<ul style="margin-left: 150px;margin-top: 55px;">
  <b style="font-size: 35px;">
  <li style="padding : 20px 20px;">First Name : &nbsp;<?php echo $firstname; ?></li>
  <li style="padding : 20px 20px;">Last Name : &nbsp;<?php echo $lastname; ?></li>
  <li style="padding : 20px 20px;">Username : &nbsp;<?php echo $username; ?></li>
  <li style="padding : 20px 20px;">E-mail : &nbsp;<?php echo $mail; ?></li>
  <li style="padding : 20px 20px;">Phone No : &nbsp;<?php echo $phone; ?></li>
  <li style="padding : 20px 20px;">Birthday : &nbsp;<?php echo $birthday; ?></li>
</b>
</ul>

</body>
</html>