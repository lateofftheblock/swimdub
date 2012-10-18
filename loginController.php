<?php
session_start();

include "db_connect.php";
$email = $_POST['email'];
$pw = $_POST['pass'];



$query = "SELECT * FROM users WHERE email = '$email' AND pwd = '$pw'";
$result = mysqli_query($db, $query);
if ($row = mysqli_fetch_array($result)){

  $_SESSION['email'] = $email;
  if($pw == "eagles"){
	header('Location: pwdChange.php');
  }else{
  	header('Location: home.php');
  }
}else{

    include "login.php";
	echo "<p><font color = white>Incorrect username or password</font></p>\n";

}

?>
