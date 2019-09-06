<?php
	$conn=mysqli_connect('localhost','root','','social_media');
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
$fnameErr=$lnameErr=$usernameErr=$phoneErr=$genderErr=$mailErr=$passErr=$cpassErr="";
if(isset($_POST['reg_user']))
{
    $fname=mysqli_real_escape_string($conn, $_POST['fname']);
    $lname=mysqli_real_escape_string($conn, $_POST['lname']);
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $mail=mysqli_real_escape_string($conn, $_POST['mail']);
    $pass=mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass=mysqli_real_escape_string($conn, $_POST['cpass']);

    $var=0;
    if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
        $fnameErr="Only letters and white space allowed!"; $var=1;}
    if(!preg_match("/^[a-zA-Z ]*$/",$lname)){
        $lnameErr="Only letters and white space allowed!"; $var=1;}
    if(!preg_match("/^[0-9 ]*$/",$phone)){
        $phoneErr="Only numerals allowed!"; $var=1;}
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $pass)) {
    	$passErr="Password must contain 1 digit, 1 letter with minimum 8 characters!"; $var=1;}
    if(!preg_match('/^[0-9A-Za-z!@#$%]*$/', $username)) {
    	$usernameErr="Username should only contain digits, letters and special characters(!@#$%)!"; $var=1;}
    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",  $mail)) {
    	$mailErr="E-mail is not valid!"; $var=1;}

    if($var==1){
        header("location:login_page.html");
    }

    $squ="SELECT username FROM Users WHERE Username='".$username."'";
    $result1=mysqli_query($conn, $squ);
    if(mysqli_num_rows($result1)!=0) {
    	echo "Username already exists!";
    	header("location:login_page.html");
    }

    if($pass!=$cpass)
    {
    	$cpassErr="Password didn't match";
    	header("location:login_page.html");
    }

    $pass=md5($pass);

    $sqr="INSERT INTO `record` (`First_Name`,`Last_Name`,`Username`,`Mobile_No.`,`Gender`,`E-mail`,`Password`) VALUES('$fname', '$lname', '$username', '$phone', '$gender', '$mail', '$pass')";
    $result= mysqli_query($conn, $sqr) or die(mysqli_error($conn));
    if($result) {
    	echo "Successfully Registered :)";
    	header("location:login_page.html");
    }
    else {
    	echo "Not registered yet!";
    	header("location:login_page.html");
    }

}
?>