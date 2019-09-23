<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['submit']))
{
	$post_image=$_POST['fileToUpload'];
	$caption=$_POST['caption'];
	$unm=$_POST['usernamee'];
	$sqq=mysqli_query($conn,"INSERT INTO `post` (`user_id`, `username`, `post_image`, `content`) VALUES ('$user_id', '$unm', '$post_image', '$caption')");
	$_SESSION['scs']='Posted';
	header("location:home.php");
}

?>