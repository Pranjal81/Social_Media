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
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $phone=$row['phone'];
    $mail=$row['email'];
    $gender=$row['gender'];
    $user_id=$id;
    $img_location=$row['profile_picture'];
    $birthday=$row['birthday'];
    $_SESSION['fnameErr']=$_SESSION['lnameErr']=$_SESSION['phoneErr']=$_SESSION['genderErr']=$_SESSION['emailErr']="";
$result1=mysqli_query($conn, "SELECT * FROM `post` WHERE user_id= '$id' ORDER BY `post_id` DESC");
$row1= mysqli_fetch_assoc($result1);
    $post_image= $row1['post_image'];

?>