<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['subsearch']))
{
	$search_profile=$_POST['search'];
	$s=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$search_profile'");
	if(mysqli_num_rows($s)>0)
	{
		$ss=mysqli_query($conn, "SELECT * FROM `user` WHERE `username`='$search_profile'");
		$row2=mysqli_fetch_assoc($ss);
		$_SESSION['uname']=$row2['username'];
        $_SESSION['pp']=$row2['profile_picture'];
        $_SESSION['fname']=$row2['firstname'];
        $_SESSION['lname']=$row2['lastname'];
		header("location:searchlist.php");
	}
	else {
		$_SESSION['fail']="No user found!";
		header("location:searchlist.php");
	}
	
}

?>