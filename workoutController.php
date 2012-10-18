
<?PHP
session_start();

include "db_connect.php";
$email= $_SESSION['email'];
$title = $_POST['title'];
$type= $_POST['type'];
$workout= $_POST['workout'];

$findid = "SELECT id FROM users WHERE email= '$email'";
$res = mysqli_query($db, $findid);
$row = mysqli_fetch_array($res);
$user_id = $row['id'];


if($title != null){
	if ($type != "null"){
		if($workout != null){
			$insert = "INSERT INTO workout (title, type, workout) values ('$title', '$type', '$workout')";
			$result = mysqli_query($db, $insert);
			
			$find = "SELECT id FROM workout WHERE title='$title'";
			$result2 = mysqli_query($db, $find);
			$row = mysqli_fetch_array($result2);
			$workout_id = $row['id'];
			
			$addOwner = "INSERT INTO owner (user_id, workout_id) VALUES ('$user_id', '$workout_id')";
			$add = mysqli_query($db, $addOwner);
			
			header("Location: home.php");
		}else{
			include "addWorkout.php";
			echo "<center><h1><font color='red'>Please include a workout!</font></h1></center>";
		}
	}else{
		include "addWorkout.php";
		echo "<center><h1><font color='red'>Please include the type of the workout!!</font></h1></center>";
	}
}else{
	include "addWorkout.php";
	echo "<center><h1><font color='red'>Please include a title for the workout!</font></h1></center>";
}

?>
