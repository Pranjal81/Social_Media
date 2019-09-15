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
<body bgcolor="lightgrey" background="bg2.png">

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" style="width: 60px; height: 50px;margin: 0;padding: 0;border-radius: 50%;padding-right: 5px;"></li>
  <li class="list1"><a class="active" href="#home">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="#contact">Friend List</a></li>
    <li class="list1"><a href="#contact">My Photos</a></li>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<p id="home">
<form method="post" enctype="multipart/form-data"><center>
    <b style="font-size: 25px;" >Select image to upload:
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload" style ="border: 3px;margin-top:2%;border-radius:5px;width: 20%;height: 5%;">
    <input type="submit" value="Upload Image" name="submit" style=" background-color: black; color:white;border: 2px solid grey; width: 20%;height: 5%;border-radius:3px;width: 10%;">
  </b>
</center>
</form>
<?php
$result=mysqli_query($conn,"SELECT * FROM `post` ORDER BY post_id DESC") or die(mysqli_error());
while($row=mysqli_fetch_assoc($result)) {
  $userid=$row['user_id'];
  $postimage=$row['post_image'];
  $content=$row['content'];
  $created=$row['created'];
?>
<br>
<img src="photos/"<?php echo $postimage ?>>
<p><?php echo $content ?></p>
<b><?php echo $time= time_stamp($time) ?></b><br>

<?php
}
?>


</body>
</html>