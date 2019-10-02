<?php

include 'connection.php';
include 'session.php';
if(isset($_SESSION['deleted'])) {
  echo $_SESSION['deleted'];
  unset($_SESSION['deleted']);
}
if(isset($_SESSION['postid']))
{ unset($_SESSION['postid']); }
if(isset($_SESSION['postimage']))
{ unset($_SESSION['postimage']); }

?>
<!DOCTYPE html>
<html>
<head>
<style>
ul.horizontal {
  list-style-type: none;
  margin: 0;
  width: 98%;
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
</style>
</head>
<body bgcolor="lightgrey" background="bg2.png" style="background-size: cover;background-attachment: fixed;">

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="friendlist.php">Friend List</a></li>
    <li class="list1"><a class="active" href="myphotos.php">My Photos</a></li>
    <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1" style="height:40px;width: 180px;padding: 10px 15px;">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>


<?php
$result1=mysqli_query($conn, "SELECT * FROM `post` WHERE `username`='$username' ORDER BY `post_id` DESC");
if(mysqli_num_rows($result1)>0)
{
	while($rowx=mysqli_fetch_assoc($result1))
	{
	$postp=$rowx['post_image'];
	$postid=$rowx['post_id']; ?>
	<center>
    <br><br>
    <img src="<?php echo $postp; ?>" style="height: 500px; width: 500px;" alt="Post image"><br>
    <form action="deletepost.php" method="POST">
      <input type="hidden" name="postid" value="<?php echo $postid ?>">
      <input type="submit" value="Delete" name="delsubmit1">
    </form><br>
    </center>
<?php
}
}

?>