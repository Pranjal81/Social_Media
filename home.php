<?php
include 'connection.php';
include 'session.php';
echo $_SESSION['success'];
$_SESSION['success']="";
if(isset($_SESSION['scs'])) {
  echo $_SESSION['scs'];
  unset($_SESSION['scs']);
}
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
  <li class="list1"><a class="active" href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="friendlist.php">Friend List</a></li>
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1" style="height:40px;width: 180px;padding: 10px 15px;">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<p id="home">
<form method="post" action="post.php">
<center>
    <b style="font-size: 25px;" >Select image to upload:
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload" style ="border: 3px;margin-top:2%;border-radius:5px;width: 20%;height: 5%;">
    <input type="text" name="caption" placeholder="Add a caption...">
    <input type="hidden" name="usernamee" value="<?php echo $username; ?>"><br>
    <input type="submit" value="Upload" name="submit" style="background-color: black; color:white;border: 2px solid grey; width: 20%;height: 5%;border-radius:3px;width: 10%;">
  </b>
</center>
</form>

<?php
$result1=mysqli_query($conn, "SELECT * FROM `post` WHERE 1 ORDER BY `post_id` DESC");
while ($row1= mysqli_fetch_assoc($result1)) {
    $post_image= $row1['post_image'];
    $unm=$row1['username'];
    $caption=$row1['content'];
    $postid=$row1['post_id'];
    $result2=mysqli_query($conn, "SELECT * FROM `friends` WHERE `un`='$username' AND `fun`='$unm'");
    if(mysqli_num_rows($result2)>0 || $unm==$username) {
      $result3=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$unm'");
      $rowz=mysqli_fetch_assoc($result3);
?>
    <center>
    <br><br>
    <img src="<?php echo $rowz['profile_picture']; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"><b><?php echo $unm; ?></b><br>
    <img src="<?php echo $post_image; ?>" style="height: 500px; width: 500px;" alt="image"><br>
    <pre style="margin-right: 135px;"><b>@<?php echo $unm; ?></b>&nbsp;<?php echo $caption; ?></pre><br>

    <form action="comment.php" method="POST">
      <input type="hidden" name="post_id" value="<?php echo $postid ?>">
      <input type="hidden" name="cun" value="<?php echo $username ?>">
      <input type="hidden" name="postun" value="<?php echo $unm ?>">
      <input type="hidden" name="post_image" value="<?php echo $post_image ?>">
      <input type="submit" value="Comments" name="comment">
    </form>

    <?php
    if($unm==$username) { ?>
    <form action="deletepost.php" method="POST">
      <input type="hidden" name="postid" value="<?php echo $postid ?>">
      <input type="submit" value="Delete" name="delsubmit">
    </form></center>
    <?php } ?>
<?php
}
else {;
}
}
?>


</body>
</html>