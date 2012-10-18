<?PHP
session_start();
include("db_connect.php");
$email= $_SESSION["email"];
$change= $_GET["change"];
$start=$change;
$getCount= "SELECT COUNT(*) FROM workout";
$count= mysqli_query($db, $getCount);

$getWorkouts= "SELECT u.last_name, u.first_name, w.title, w.type, w.workout, w.date_added FROM users u INNER JOIN workout w INNER JOIN owner o ON u.id = o.user_id AND w.id = o.workout_id WHERE u.email = '$email' ORDER BY date_added DESC LIMIT $start , 5";
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
        echo "You have not posted any workouts yet!!";
}
mysql_close($db);
?>

