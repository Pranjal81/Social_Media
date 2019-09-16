<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['subsearch']))
{
	$search_profile=$_POST['search'];
	$s=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$search_profile'");
	if(mysqli_num_rows($s)>0)
	{
		$username=$row['username'];
        $img_location=$row['profile_picture'];
		header("location:search_list.php");
	}
	else {
		$_SESSION['fail']="No user found!";
		header("location:search_list.php");
	}
	
}

?>