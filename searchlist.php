<?php
include 'connection.php';
include 'session.php';
if(isset($_SESSION['f']))
echo $_SESSION['f'];
unset($_SESSION['f']);
if(isset($_SESSION['sent']))
{
  echo $_SESSION['sent'];
  unset($_SESSION['sent']);
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
  <li class="list1"><a href="myphotos.php">My Photos</a></li>
  <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class ="searchinlist">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<br>
<center>
<fieldset class="ment">
<legend><b>Search result:</b></legend>
<br>
<?php 
if (isset($_SESSION['uname'])) {
?>
<center style="font-size: 25px;">
  <?php
  echo $_SESSION['fname'];
  echo "&nbsp;";
  echo $_SESSION['lname'];
  unset($_SESSION['fname']);
  unset($_SESSION['lname']);
  $uname=$_SESSION['uname'];
  unset($_SESSION['uname']);
  ?>
  <br>
  <img class="imgsrch" src="<?php echo $_SESSION['pp']; unset($_SESSION['pp']); ?>" alt="Profile picture">
  <?php
  $resu = mysqli_query($conn, "SELECT * FROM `friends` WHERE `un`='$username' AND `fun`='$uname'");
  if(mysqli_num_rows($resu)>0)
  {
  ?>
  <center>
  <form>
  <form action="unfriend.php" method="POST">
  <input type="hidden" name="uf" value="<?php echo $uname ?>">
    <input type="submit" value="Unfriend" name="unfriend">
  </form>
  </center>
  <?php
  } 
  else
  {
    $resu1 = mysqli_query($conn, "SELECT * FROM `friend_requests` WHERE `un`='$username' AND `run`='$uname'");
  if(mysqli_num_rows($resu1)>0)
  {
  ?>
  <center>
  <input type="submit" name="uf" value="Friend request sent">
  </center>
  <?php
  }
  else
  {
    ?>
    <center>
    <form action="send_friend_request.php" method="POST">
      <input type="hidden" name="usern" value="<?php echo $uname; ?>">
    <input type="submit" value="Add as Friend" name="send">
    </form>
    </center>
<?php
  }
  }
 } 
else { 
?>
  <center>
  <?php
  echo $_SESSION['fail'];
  unset($_SESSION['fail']);
}
?>
  </center>
</fieldset>
</center>
</body>
</html>