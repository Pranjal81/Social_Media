<?php

include 'connection.php';
session_start();
if(!isset($_SESSION['id']))
{
	$_SESSION['error']="Please login first!";
	header("location:loginpage.php");
}

$id=$_SESSION['id'];
$result=mysqli_query($conn,"SELECT * FROM `user` WHERE user_id= '$id'");
$row= mysqli_fetch_assoc($result);
    $username=$row['username'];
    $_SESSION['success']="You have logged in Successfully :)";
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $phone=$row['phone'];
    $mail=$row['email'];
    $gender=$row['gender'];
    $user_id=$id;
    $img_location=$row['profile_picture'];

?>