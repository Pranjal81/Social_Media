<?php

include 'connection.php';
include 'session.php';

if($_SESSION['send'])
{
	$un=$_POST['usern'];
	$re=mysqli_query($conn, "INSERT INTO `friend_requests` VALUES ('$username','$un')");
	$_SESSION['sent']="Friend request sent successfully";
}

?>