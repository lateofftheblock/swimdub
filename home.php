<?php
session_start();
?>

<html>
<Title>SWIMDUB</title>
<body>
<?php
	include('header.php');
?>
<div id="page">
	<div id="page-bgtop">
		<div id="page-bgbtm">
			<div id="content">
				<div class="post">
					<div class="post-bgtop">
						<div class="post-bgbtm">
						<?php
						if($_SESSION['email'] != NULL){
							$name = $_SESSION['email'];
							echo "<h1>Welcome $name!</h1>";
						}else{
							echo "<h1>Welcome Guest!</h1>";
						}
						echo "<p><font size=3 color=grey>This is the UMW Swimteam's workout sharing network.</font></p>";
						echo "<h1>Recent Workouts</h1>";
						echo "_____________________________________________________________________________________________________________________________<br><br>";
						$getWorkouts= "SELECT u.last_name, u.first_name, w.title, w.type, w.workout, w.date_added FROM users u INNER JOIN workout w INNER JOIN owner o ON u.id = o.user_id AND w.id = o.workout_id ORDER BY date_added DESC LIMIT 0, 5";
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
                                                	echo "No workouts have been posted yet!!";
                                                }?>
						</div>
					</div>	
				</div>	
			</div>
		</div>
	</div>
</div>
</body>
</html>
