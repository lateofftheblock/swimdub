
 <?PHP
include("db_connect.php");
$change= $_GET["change"];
$start=$change;
$getWorkouts= "SELECT u.last_name, u.first_name, w.title, w.type, w.workout, w.date_added FROM users u INNER JOIN workout w INNER JOIN owner o ON u.id = o.user_id AND w.id = o.workout_id
 ORDER BY date_added DESC LIMIT $start , 5";
$result= mysqli_query($db, $getWorkouts);
if($result != null){
	while($row=mysqli_fetch_array($result)){
        	$last_name = $row['last_name'];
                $title= $row['title'];
                $first_name = $row['first_name'];
                $type= $row['type'];
                $date_added=$row['date_added'];
                $workout=$row['workout'];
                echo "<h2>$title</h2>";
                echo "<h3>By: $first_name $last_name | $type  | $date_added </h3><br>";
                echo nl2br($workout);
                echo "<br><br>";
                echo "_____________________________________________________________________________________________________________________________<br><br>";
	}
}else{
	echo "No one has posted any workouts yet!!";
}
mysql_close($db);
?>

