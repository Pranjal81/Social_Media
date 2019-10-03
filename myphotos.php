<?php

include 'connection.php';
include 'session.php';

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" class="profilepic"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="friendlist.php">Friend List</a></li>
  <li class="list1"><a href="request_list.php">Friend requests</a></li>
  <li class="list1"><a class="active" href="myphotos.php">My Photos</a></li>
  <li class ="searchinlist">
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
    <div style="border:3px solid black;width: 400px;">
    <img src="<?php echo $postp; ?>" style="height: 400px; width: 400px;" alt="Post image"><br>
    <form action="deletepost.php" method="POST">
      <input type="hidden" name="postid" value="<?php echo $postid ?>">
      <input type="submit" value="Delete" name="delsubmit1">
    </form><br>
    </div>
    </center>
<?php
}
}
?>
</body>
</html>