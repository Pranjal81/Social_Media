<?php

include 'connection.php';
include 'session.php';
echo $_SESSION['success'];
$_SESSION['success']="";

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
  <li class="list1"><a class="active" href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="#contact">Friend List</a></li>
    <li class="list1"><a href="#contact">My Photos</a></li>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<?php

$result=mysqli_query($conn,"SELECT * FROM `post` ORDER BY post_id DESC") or die(mysqli_error());
while($row=mysqli_fetch_assoc($result)) {
  $userid=$row['user_id'];
  $postimage=$row['post_image'];
  $content=$row['content'];
  $created=$row['created'];
?>
<img src="photos/"<?php echo $postimage ?>>
<p><?php echo $content ?></p>
<b><?php echo $time= time_stamp($time) ?></b><br>

<?php
}
?>


</body>
</html>