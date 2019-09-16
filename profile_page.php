
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
  background-color: #534;
}
li a.list2 {
  display: block;
  color: #055;
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
</style>
</head>
<body bgcolor="lightgrey" background="bg2.png" style="background-size: cover;background-attachment: fixed;">

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a class="active" href="profile_page.php">Profile</a></li>
    <li class="list1"><a href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="#contact">Friend List</a></li>
    <li class="list1"><a href="#contact">My Photos</a></li>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<br>

<h2 style="float: left; margin-left: 80px;font-size: 30px;">Hello &nbsp;<?php echo $firstname; ?></h2>

<img style="border-radius: 4px;float:right;margin-top: 20%;margin-right: 20px;" src="<?php echo $img_location; ?>" alt="image"><br>



<br><br>
<b style="font-size: 27px; color:#030501;">
<h1 align="center"><i><u>Personal Information:</h1></b></i></u>
<ul style="margin-left: 150px;margin-top: 55px;">
  <b style="font-size: 35px;">
  <li style="padding : 20px 20px;">First Name : &nbsp;<?php echo $firstname; ?></li>
  <li style="padding : 20px 20px;">Last Name &nbsp;: &nbsp;<?php echo $lastname; ?></li>
  <li style="padding : 20px 20px;">Username &nbsp;&nbsp;: &nbsp;<?php echo $username; ?></li>
  <li style="padding : 20px 20px;">E-mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $mail; ?></li>
  <li style="padding : 20px 20px;">Phone No &nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $phone; ?></li>
  <li style="padding : 20px 20px;">Birthday &nbsp;&nbsp;&nbsp; : &nbsp;<?php echo $birthday; ?></li>
</b>
</ul>
</body>
</html>