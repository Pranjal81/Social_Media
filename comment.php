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
  <li class="list1"><a class="active" href="friendlist.php">Friend List</a></li>
  <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class ="searchinlist">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<?php
if(isset($_SESSION['postimage']))
{
	$post_image=$_SESSION['postimage'];
}
else
{
	$post_image=$_POST['post_image'];
}
?>
    <center>
    <img src="<?php echo $post_image ?>"><br>
    <?php
    if(isset($_SESSION['postid']))
    {
        $postid=$_SESSION['postid'];
    }
    else
    {
    	$postid=$_POST['post_id'];
    }
    $result1=mysqli_query($conn, "SELECT * FROM `comments` WHERE `post_id`='$postid' ORDER BY `comment_id` ASC");
    while($rowx=mysqli_fetch_assoc($result1))
    {
    	?>
    	<b><?php echo $rowx['username']; ?></b>&nbsp;<span><?php echo $rowx['content_comment']; ?></span><br>
    	<?php
    }
    ?>
    <form action="commentphp.php" method="POST">
    	<b><?php echo $username ?>&nbsp;</b><input type="text" name="com" placeholder="Write a comment...">
    	<input type="hidden" name="post__id" value="<?php echo $postid ?>">
    	<input type="hidden" name="post__image" value="<?php echo $post_image ?>">
    	<input type="submit" name="commented" value="Post comment">
    </form>
</center>
</body>
</html>