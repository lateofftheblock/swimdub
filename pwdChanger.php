<?php
session_start();

include "db_connect.php";
$email = $_SESSION['email'];
$pwd1 = $_POST['pwd1'];
$pwd2 = $_POST['pwd2'];

if($pwd1 != "eagles" && $pwd1==$pwd2){
	$changePwd= "UPDATE users SET pwd='$pwd1' WHERE email='$email'";
	$results=mysqli_query($db, $changePwd);
	header('Location: home.php');
}else{
	include("pwdChange.php");
	echo "The passwords your entered were either not valid or did not match. Please try again";
}
?>
