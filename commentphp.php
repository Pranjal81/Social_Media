<?php

include 'connection.php';
include 'session.php';

if($_POST['commented'])
{
	$content_comment=$_POST['com'];
	$postid=$_POST['post__id'];
	$postimage=$_POST['post__image'];
	$result1=mysqli_query($conn, "INSERT INTO `comments` (`post_id`, `username`, `content_comment`) VALUES ('$postid', '$username', '$content_comment')");
	$_SESSION['postid']=$postid;
	$_SESSION['postimage']=$postimage;
	header("location:comment.php");
}

?>