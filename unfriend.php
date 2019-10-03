<?php

include 'connection.php';
include 'session.php';

if(isset($_POST['unfriend']))
{
	$uf=$_POST['uf'];
	$resu=mysqli_query($conn, "DELETE FROM `friends` WHERE `un`='$username' AND `fun`='$uf'");
	$resu1=mysqli_query($conn, "DELETE FROM `friends` WHERE `fun`='$username' AND `un`='$uf'");
	$_SESSION['u']="Removed from Friend list";
	header("location:friendlist.php");
}
else
{
	header("location:friendlist.php");
}

?>