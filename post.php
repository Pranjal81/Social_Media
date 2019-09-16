<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['submit']))
{
	$post_image=$_POST['fileToUpload'];
	$caption=$_POST['caption'];
	$sqq=mysqli_query($conn,"INSERT INTO `post` (`user_id`, `post_image`, `content`) VALUES ('$user_id', '$post_image', '$caption')");
	$_SESSION['scs']='Posted';
	header("location:home.php");
}

?>