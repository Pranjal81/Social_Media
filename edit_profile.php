<?php

include 'connection.php';
include 'session.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" class="profilepic"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a href="profile_page.php">Profile</a></li>
  <li class="list1"><a class="active" href="edit_profile.php">Edit</a></li>
  <li class="list1"><a href="friendlist.php">Friend List</a></li>
  <li class="list1"><a href="request_list.php">Friend requests</a></li>
    <li class="list1"><a href="myphotos.php">My Photos</a></li>
    <li class ="searchinlist">
      <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search" style="height: 20px;">
        <input style="background-color: #7d2019;color:white;" type="submit" value="Search" name="subsearch"></form>
  <li class="list1" style="float:right"><a href="logout.php">Logout</a></li>
</ul>

<div class="details">
<fieldset style="border: 8px solid #989898;">
<legend><h2>Personl Info</h2></legend>
<div class="profilepics">
<img src="<?php echo $img_location; ?>"alt="Profile picture"><br>
<b>Change profile picture</b>
<form action="profile_photo.php" method="POST">
 <input type="file" name="edit_profile_photo" placeholder="Edit Profile Photo"><br>
 <input type="submit" name="change_profile_photo" value="Change Profile Picture">
</form>
</div>
<div class="vl">
<form action="edit_profilephp.php" method="POST">
  <ul class="details1"><h6>
  <li class="space">
  <label for="fname">Firstname:</label>
  <input type="text" id="fname" name="fname" value="<?php echo $firstname; ?>" autofocus><span id="error">*<?php echo $_SESSION['fnameErr']; $_SESSION['fnameErr']=""; ?></span>
  <li class="space">
  <label for="lname">Lastname:</label>
  <input type="text" id="lname" name="lname" value="<?php echo $lastname; ?>"><span id="error"><?php echo $_SESSION['lnameErr']; $_SESSION['lnameErr']=""; ?></span>
  <li class="space">
  <label for="phone">Phone No:</label>
  <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"><span id="error">*<?php echo $_SESSION['phoneErr']; $_SESSION['phoneErr']=""; ?></span>
  <li class="space">
  <label for="bday" >Birthday:</label>
  <input type="date" id="bday" name="birthday" value="<?php echo $birthday; ?>">
  <li class="space">
  <input style="height:25px; width:20px; padding: 0px;" type="radio" id="male" name="gender" value="<?php echo $gender; ?>">
  <label for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <input style="height:25px; width:20px;" type="radio" id="female" name="gender" value="<?php echo $gender; ?>">
  <label for="female">Female</label><span id="error">*<?php echo $_SESSION['genderErr']; $_SESSION['genderErr']=""; ?></span>
  <li class="space">
  <label for="email">E-mail:</label>
  <input type="text" id="email" name="email" value="<?php echo $mail; ?>"><span id="error">*<?php echo $_SESSION['emailErr']; $_SESSION['emailErr']=""; ?></span>
  <input style="width: 100px; background-color: #7d2019; color: white;" type="submit" name="save" value="Save">
  </h6>
</ul>
</form>
</div>
</fieldset>
</div>
</body>
</html>

