<?php
	$conn=mysqli_connect('localhost','root','','social_media');
	if($conn)
	{	echo "conn";
		if(isset($_POST['submit']))
		{	echo "all set";
			$unique="SELECT * FROM record WHERE Username='$_POST[username]'";
			$fire=mysqli_query($conn,$unique); 
			if(mysqli_num_rows($fire)==0)
			{echo "done";
				$in="INSERT INTO record (First_Name,E-mail,Mobile_No.,Gender,Username,Password) 
					VALUES ('$_POST[fname]', '$_POST[mail]', '$_POST[phone]', '$_POST[gender]', '$_POST[username]','$_POST[pass]')";
				mysqli_query($conn,$in);
				echo "help";
			}
		}
	}
 ?>