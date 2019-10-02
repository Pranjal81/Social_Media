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
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1" style="height:40px;width: 180px;padding: 10px 15px;">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #534;color:white;" type="submit" value="Search" name="subsearch">
      </form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<b>Search result:</b><br>

<?php 
if (isset($_SESSION['uname'])) {
?>
<center>
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
  <img style="border: 3px solid white; height: 105px; width: 105px; border-radius: 80%;" src="<?php echo $_SESSION['pp']; unset($_SESSION['pp']); ?>" alt="Profile picture">
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
</body>
</html>