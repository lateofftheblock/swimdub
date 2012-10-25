<?php
include("db_connect.php");
$first=addslashes($_GET['first']);
$last=addslashes($_GET['last']);
$email=$_GET['email'];
$admin=$_GET['admin'];
$pwd= "eagles";
if($first != null && $last != null && $email != null){
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($db, $query);
	
	if ($row = mysqli_fetch_array($result)){
		include("modifyUsers.php");
		echo"this user already exists!";
	}else{

        $addUser= "INSERT INTO users (first_name, last_name, email, pwd, admin) VALUES('$first', '$last', '$email', '$pwd', '$admin')";
	$adding= mysqli_query($db, $addUser);
	header("Location: modifyUsers.php");

	}
}else{
	include("modifyUsers.php");
	echo "Please complete the entire form";
}

?>
