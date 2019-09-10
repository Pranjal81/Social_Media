<?php
    session_start();
    $_SESSION['error']="";
	$conn=mysqli_connect('localhost','root','','social_media');
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
$fnameErr=$lnameErr=$usernameErr=$phoneErr=$genderErr=$mailErr=$passErr=$cpassErr="";
if(isset($_POST['reg_user']))
{
    $_SESSION['error']="";
    $var1=0;
    if(empty($_POST['fname'])) {
        $fnameErr="Firstname can not be empty!";
        $var1=1;
    }
    if(empty($_POST['username'])) {
        $usernameErr="Username can not be empty!";
        $var1=1;
    }
    if(empty($_POST['phone'])) {
        $phoneErr="Phone no. can not be empty!";
        $var1=1;
    }
    if(empty($_POST['gender'])) {
        $genderErr="Please select a gender";
        $var1=1;
    }
    if(empty($_POST['mail'])) {
        $mailErr="E-mail can not be empty!";
        $var1=1;
    }
    if(empty($_POST['pass'])) {
        $passErr="Password can not be empty!";
        $var1=1;
    }
    if(empty($_POST['cpass'])) {
        $cpassErr="Please re-enter your password";
        $var1=1;
    }
    if($var1==1) {
        $_SESSION['error']= "Please fill all fields!";
        header("location:loginpage.php");
    }

    else{

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
        $_SESSION['error']= "Validation incomplete";
        header("location:loginpage.php");
    }

    else{

    $squ="SELECT * FROM `record` WHERE Username='$username'";
    $res=mysqli_query($conn, $squ);
    if(mysqli_num_rows($res)) {
    	$_SESSION['error']= "Username already exists!";
    	header("location:loginpage.php");
    }

    else{

    if($pass!=$cpass)
    {
    	$cpassErr="Password did not match!";
        $_SESSION['error']= "Password did not match!";
    	header("location:loginpage.php");
    }

    else{

    //$pass=md5($pass);

    $sqr="INSERT INTO `record` (`First_Name`,`Last_Name`,`Username`,`Mobile_No.`,`Gender`,`E-mail`,`Password`) VALUES('$fname', '$lname', '$username', '$phone', '$gender', '$mail', '$pass')";
    $result= mysqli_query($conn, $sqr) or die(mysqli_error($conn));
    if($result) {
    	$_SESSION['error']= "Successfully Registered :)";
    	header("location:loginpage.php");
    }
    else {
    	$_SESSION['error']= "Not registered yet!";
    	header("location:loginpage.php");
    }
}
}
}
}

}

if(isset($_POST['log_user']))
{
    $_SESSION['error']="";
    $var1=0;
    if(empty($_POST['pass1'])) {
        $passErr="Password can not be empty!";
        $var1=1;
    }
    if(empty($_POST['username1'])) {
        $usernameErr="Username can not be empty!";
        $var1=1;
    }
    if($var1==1) {
        $_SESSION['error']= "Please enter both the fields!";
        header("location:loginpage.php");
    }
    else {
        $username1=mysqli_real_escape_string($conn, $_POST['username1']);
        $pass1=mysqli_real_escape_string($conn, $_POST['pass1']);

        $var2=0;
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $pass1)) {
            $passErr="Password must contain 1 digit, 1 letter with minimum 8 characters!"; $var2=1;}
        if(!preg_match('/^[0-9A-Za-z!@#$%]*$/', $username1)) {
            $usernameErr="Username should only contain digits, letters and special characters(!@#$%)"; $var2=1;}
        if($var2==1)
        {
            $_SESSION['error']="Please enter valid username and password!";
        }
        else {

        //$pass1=md5($pass1);

        $sqch= "SELECT * FROM record WHERE Username='$username1'";
        $res1=mysqli_query($conn, $sqch);
        if(mysqli_num_rows($res1)>0)
        {
            $sqq= "SELECT * FROM `record` WHERE Username='$username1'";
            $res2 = mysqli_query($conn, $sqq);
            $row = mysqli_fetch_assoc($res2);
            if($row['Password']==$pass1) {
            $_SESSION['username']=$username1;
            $_SESSION['error']="You have logged in Successfully :)";
            $_SESSION['firstname']=$row['First_Name'];
            $_SESSION['lastname']=$row['Last_Name'];
            $_SESSION['phone']=$row['Mobile_No.'];
            $_SESSION['mail']=$row['E-mail'];
            $_SESSION['gender']=$row['gender'];
            header("location:BlockBreaker.php");
            }
            else {
                $_SESSION['error']="Password is incorrect!";
                header("location:loginpage.php");
            }
        }

        else {
            $_SESSION['error']="Username does not exist!";
            header("location:loginpage.php");
        }
    }
    }
}
?>