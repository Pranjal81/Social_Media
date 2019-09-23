<?php

include 'connection.php';
include 'session.php';

if($_POST['add'])
{
	$un=$_POST['usern'];
	$resu=mysqli_query($conn, "SELECT * FROM `friends` WHERE (`un`='$un' AND `fun`='$username') OR (`un`='$username' AND `fun`='$un')");
	if(!mysqli_num_rows($resu))
	{
        $s=mysqli_query($conn, "INSERT INTO `friends`(`un`, `fun`) VALUES ('$username', '$un')");
        $s=mysqli_query($conn, "INSERT INTO `friends`(`fun`, `un`) VALUES ('$username', '$un')");
        $_SESSION['f']="added in friend list";
        header("location:searchlist.php");
    }
    else {
    	$_SESSION['f']="Already friends";
    	header("location:searchlist.php");
    }
}
else
{
	header("location:searchlist.php");
}
?>