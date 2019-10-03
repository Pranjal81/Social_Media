<?php

include 'connection.php';
include 'session.php';
if(isset($_SESSION['scs'])) {
  echo $_SESSION['scs'];
  unset($_SESSION['scs']);
}
if(isset($_SESSION['err'])) {
  echo $_SESSION['err'];
  unset($_SESSION['err']);
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<ul class="horizontal">
  <li class="list1"><img src="<?php echo $img_location; ?>" alt="Avatar" class="profilepic"></li>
  <li class="list1"><a href="home.php">Home</a></li>
  <li class="list1"><a class="active" href="profile_page.php">Profile</a></li>
  <li class="list1"><a href="edit_profile.php">Edit</a></li>
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
<form><input type="button" onclick="window.location.href='edit_profile.php'" value="Edit" style="float: right;margin-right: 50px;font-size: 25px;"></form>
<legend><h2>Personl Info</h2></legend>
<img class="profilepics" src="<?php echo $img_location; ?>"><br>
<div class="vl">
<ul class="details1">
  <li class="space">First Name&nbsp; : &nbsp;<?php echo $firstname; ?></li>
  <li class="space">Last Name &nbsp;: &nbsp;<?php echo $lastname; ?></li>
  <li class="space">Username &nbsp;&nbsp;: &nbsp;<?php echo $username; ?></li>
  <li class="space">E-mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $mail; ?></li>
  <li class="space">Phone No &nbsp;&nbsp;: &nbsp;<?php echo $phone; ?></li>
  <li class="space">Birthday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<?php echo $birthday; ?></li>
</ul></div>
</fieldset>
</div>

</body>
</html>