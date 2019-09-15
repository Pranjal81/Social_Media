<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['submit']))
{
	$post_image=$_POST['fileToUpload'];
	$sqq=mysqli_query($conn,"INSERT INTO `post` (`user_id`, `post_image`) VALUES ('$user_id', '$post_image')");
	$_SESSION['scs']='Posted';
	header("location:home.php");
}

?>