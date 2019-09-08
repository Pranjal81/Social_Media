<?php
session_start();
$conn=mysqli_connect('localhost','root','','social_media');
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
$fnameErr=$lnameErr=$usernameErr=$phoneErr=$genderErr=$mailErr=$passErr=$cpassErr="";
echo $_SESSION['error'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login/Registration</title>
	<style >
		.body{
			margin: 0;
			padding: 0;
			background-color: white;
			}
		.header
		{
			background-color:darkblue;
			width:100%; 
			height: 80px;
			border:1px solid darkblue;

		}
		.left
		{
			width: 55%;
			position: absolute;
			left:0;
		}
		.right
		{
			width: 45%;
			position: absolute;
			top:16%;
			left: 56%;
		}
			.registration_form
		{
			background-color:white;
			border: 1px solid rgb(189, 199, 216);
			border-radius:5px;
			font-family:Helvetica, Arial, sans-serif;
			font-size:18px;
			font-weight:500;
			outline-color:rgb(77, 144, 254);
			padding-bottom:8px;
			padding-top:8px;
			padding-left:10px;
			padding-right:10px;
			margin:6px;
		}
		#error
		{
			color: red;
			font-size: 100%;
		}
	</style>
</head>
<body>
	<div class="header">
		<span style="float: left;color:white;margin-top: 25px;font-size: 30px;margin-left: 30px">
		<b>
			APNIBOOK
		</b>
		</span>
		<span style="position: absolute;right:250px;color:white; margin-top: 15px;margin-right: 150px">Username</span>
		<span style="position:absolute;right:150px;color:white; margin-top: 15px;margin-left: 150px">Password</span>
		<br>
		<input type="text" name="username" placeholder="Username" style="position: absolute;right: 320px;border:2px solid white;margin-top: 25px"></input>
		<input type="password" name="pass" placeholder="Password" style="position: absolute;right: 70px;border: 2px solid white;margin-top: 25px;">
		<input style="background-color: blue; position: absolute;right: 10px;margin-top: 25px;color:white;border: 2px solid white;" type="submit" value="Login" name="log_user">
	</div>
	<div class="left">
		<span style="color:#0E385F;font-size: 20px;margin:2%;position: relative;">COME, REQUEST, SHARE!</span>
		<span style="color:#0E385F;">It helps to connect with friends and share memories with them.</span>
	</div>
	<div  class="right">
		
			<span style="font-size: 30px;color: #333;font-family: Halvetica,Aerial, sans-serif;">Create an account.<br><br></span>
			<span style="font-size: 22px;color: #333;font-family: Halvetica,Aerial, sans-serif;">
				Enjoy with Friends.<br>
				Stay Connected!<br>
			</span>

			<b><h2>SIGN-UP:</h2></b>
		<form action="sign_up.php" method="POST">
		<input class="registration_form" type="text" name="fname" placeholder="First Name" style="width: 180px;" autofocus><span id="error">*<?php echo $fnameErr; ?></span>
		<input class="registration_form" type="text" name="lname" placeholder="Last Name" style="width: 180px;"><span id="error"><?php echo $lnameErr; ?></span>
		<input class="registration_form" type="text" name="username" placeholder="Username" style="width: 500px;"><span id="error">*<?php echo $usernameErr; ?></span>
		<input class="registration_form" type="text" name="phone" placeholder="Mobile No" style="width: 500px;"><span id="error">*<?php echo $phoneErr; ?></span>
		<input class="registration_form" type="radio" name="gender" value="true" style="width: 180px;" value="M"><span>MALE</span>
		<input class="registration_form" type="radio" name="gender" style="width: 180px;" value="F"><span>FEMALE</span><span id="error">*<?php echo $genderErr; ?></span>
		<input class="registration_form" type="text" name="mail" placeholder="Email" style="width: 500px;"><span id="error">*<?php echo $mailErr; ?></span>
		<input class="registration_form" type="password" name="pass" placeholder="Password" style="width: 500px;" ><span id="error">*<?php echo $passErr; ?></span>
		<input class="registration_form" type="password" name="cpass" placeholder="Confirm Password" style="width: 500px;"><span id="error">*<?php echo $cpassErr; ?></span>
		<input type="submit" value="Submit" name="reg_user">
		</form>
	</div>
</body>
</html>
