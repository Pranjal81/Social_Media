<?php
	$conn=mysqli_connect('localhost','root','','social_media');
	if(isset($conn))
	{
		if(isset($_POST['submit']))
		{
			$unique="SELECT * FROM record WHERE Username='$_POST[username]'";
			$fire=mysqli_query($conn,$unique); 
			if(mysqli_num_rows($fire)==0)
			{
				$in="INSERT INTO record (First_Name,Last_Name,E-mail,Mobile_No.,Gender,Username,Password) 	VALUES ('$_POST[fname]','$_POST[lname]','$_POST[mail]','$_POST[phone]','$_POST[gender]','$_POST[username]','$_POST[pass]')";
				mysqli_query($conn,$in);
			}
		}
	}
?>