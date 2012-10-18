<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<link rel="SHORTCUT ICON" href="eagle.ico">
<body>
<div id="header">
	<div id="menu">
		<ul>
			<li><a href="home.php">HOME</a></li>
			<li><a href="workouts.php">WORKOUTS</a></li>
<?PHP
	include("db_connect.php");
	if ($_SESSION['email'] != NULL){
?>
			<li><a href="myWorkouts.php">MY WORKOUTS</a></li>
			<li><a href="addWorkout.php">ADD WORKOUT</a></li>
<?PHP
			$email=$_SESSION['email'];
			$getAdmin= "SELECT admin FROM users WHERE email='$email'";
			$isAdmin=mysqli_query($db, $getAdmin);
			$row=mysqli_fetch_array($isAdmin);
			$admin=$row['admin'];
			if ($admin == 1){?>
				<li><a href="modifyUsers.php">ADD/EDIT USERS</a></li>
			<?PHP }?>
			<li><a href="logout.php">LOGOUT</a></li>
			<?PHP
}else{
?>
			<li><a href="login.php">LOGIN</a></li>
<?PHP
}
?>
		</ul>
	</div>
	<!-- end #menu -->
</div>
<div id="logo">
	<a href="home.php"> </a>
</div>
</body>
