<?php
session_start();
$conn=mysqli_connect('localhost','root','','social_media');
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
if(!isset($_SESSION['usernameErr']) || !isset($_SESSION['username1Err'])) {
$_SESSION['fnameErr']="";
$_SESSION['lnameErr']="";
$_SESSION['usernameErr']="";
$_SESSION['phoneErr']="";
$_SESSION['genderErr']="";
$_SESSION['mailErr']="";
$_SESSION['passErr']="";
$_SESSION['cpassErr']="";
$_SESSION['error']="";
}
echo $_SESSION['error'];
$_SESSION['error']="";
?>

<!DOCTYPE html>
<html>
<head>
<title>Login/Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header">
		<span class="text">
		<b>
			APNIBOOK
		</b>
		</span>
		<span style="margin-left:44vw;color:white;">Username</span>
		<span style="margin-left:6vw;color:white;">Password</span>
		<br>
		<form action="sign_up.php" method="POST">
		<input type="text" name="username1" placeholder="Username" class="user">
		<input type="password" name="pass1" placeholder="Password" class="user1">
		<input style="background-color: #534;color:white;border: 2px solid white;right: 3vw;" type="submit" value="Login" name="log_user">
	    </form>
	</div>
	<div class="right">
		<br><br><span style="color:#0E385F;font-size: 20px;margin:2%;position: relative;">JOIN, CONNECT and SHARE :)</span><br>
		<span style="color: #0E385F;">It helps to connect with friends and share memories with them.</span>
	</div>
	<div class="loginpic">
		<img src="smbg.png" alt="pic" style="width: 400px; height: 400px;">
	</div>
	<div class="left">
		
			<br><br><span style="font-size: 3vw;color: #333;font-family: Halvetica,Aerial, sans-serif;">Create an account:<br></span>

		<form action="sign_up.php" method="POST">
		<input class="registration_form" type="text" name="fname" placeholder="First Name" style="width: 180px;" autofocus><span id="error">*<?php echo $_SESSION['fnameErr']; $_SESSION['fnameErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="lname" placeholder="Last Name" style="width: 180px;"><span id="error"><?php echo $_SESSION['lnameErr']; $_SESSION['lnameErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="username" placeholder="Username" style="width: 400px;"><span id="error">*<?php echo $_SESSION['usernameErr']; $_SESSION['usernameErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="phone" placeholder="Mobile No" style="width: 400px;"><span id="error">*<?php echo $_SESSION['phoneErr']; $_SESSION['phoneErr']=""; ?></span><br>
		<input class="registration_form" type="radio" name="gender" style="width: 50px;" value="Male"><span>MALE</span>
		<input class="registration_form" type="radio" name="gender" style="width: 50px;" value="Female"><span>FEMALE</span><span id="error">*<?php echo $_SESSION['genderErr']; $_SESSION['genderErr']=""; ?></span><br>
		<input class="registration_form" type="text" name="mail" placeholder="Email" style="width: 400px;"><span id="error">*<?php echo $_SESSION['mailErr']; $_SESSION['mailErr']=""; ?></span><br>
		<input class="registration_form" type="password" name="pass" placeholder="Password" style="width: 400px;" ><span id="error">*<?php echo $_SESSION['passErr']; $_SESSION['passErr']=""; ?></span><br>
		<input class="registration_form" type="password" name="cpass" placeholder="Confirm Password" style="width: 400px;"><span id="error">*<?php echo $_SESSION['cpassErr']; $_SESSION['cpassErr']=""; ?></span><br>
		<input type="submit" value="Create account" name="reg_user" style="background-color: #534; color:white;border: 1px solid rgb(189, 199, 216); border-radius:4px; padding: 1vw; margin-left: 1vw;">
		</form>
	</div>
</body>
</html>
