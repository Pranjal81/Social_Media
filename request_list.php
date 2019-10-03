<?php
include 'connection.php';
include 'session.php';
if(isset($_SESSION['d']))
{
	echo $_SESSION['d'];
	unset($_SESSION['d']);
}
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
  <li class="list1"><a class="active" href="request_list.php">Friend requests</a></li>
  <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class ="searchinlist">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<?php
$resu=mysqli_query($conn, "SELECT * FROM `friend_requests` WHERE `run`='$username' ORDER BY `request_id` DESC");
while($rowx=mysqli_fetch_assoc($resu))
{
    $un=$rowx['un'];
	$res1=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$un'");
	$rowy=mysqli_fetch_assoc($res1);
	$pp1=$rowy['profile_picture'];
	$fn=$rowy['firstname'];
	$ln=$rowy['lastname'];
?><br>
<center><div style="border:2px solid black;width: 300px;">
<b style="font-family: Halvetica,Aerial, sans-serif;">
<?php
  echo $fn;
  echo "&nbsp;";
  echo $ln;
?>
  <br>
  <img style="border: 3px solid white; height: 100px; width: 100px; border-radius: 80%;" src="<?php echo $pp1; ?>" alt="Profile picture">
 <form action="addfriend.php" method="POST">
 	<input type="hidden" name="au" value="<?php echo $un; ?>">
    <input type="submit" value="Accept" name="accept">
</form>
<form action="unfriend.php" method="POST">
 	<input type="hidden" name="du" value="<?php echo $un; ?>">
    <input type="submit" value="Delete" name="reject">
</form>
</div>
</center>
<br>
<?php
}
?>

</body>
</html>