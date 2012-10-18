<?PHP
session_start();
include("header.php");
$getLimit= "SELECT * FROM workout";
$limit= mysqli_query($db, $getLimit);
$rowz=mysqli_num_rows($limit);
?>
<html>
<head>
<script>

function display(change)
{

if (change=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","workoutDisplay.php?change="+change,true);
xmlhttp.send();
}
</script>
</head>
<title>SWIMDUB - All Workouts</title>
<?PHP
$getWorkouts= "SELECT u.last_name, u.first_name, w.title, w.type, w.workout, w.date_added FROM users u INNER JOIN workout w INNER JOIN owner o ON u.id = o.user_id AND w.id = o.workout_id
 ORDER BY date_added DESC LIMIT 0, 5";
$result= mysqli_query($db, $getWorkouts);
?>
<body>
<div id="page">
	<div id="page-bgtop">
		<div id="page-bgbtm">
			<div id="content">
				<div class="post">
					<div class="post-bgtop">
						<div class="post-bgbtm">
							<div class="entry">
							<h1>WORKOUTS</h1><br>
							<div id="txtHint">
								<?PHP
								//include("workoutDisplay.php");
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
								?>
							</div>
							<?PHP
							$count=0;
							if ($rowz > 5 && $rowz != 0){
								$pageCounter=1;
								echo "<form>";
								echo "Page: <select name=\"change\" onchange=\"display(this.value)\">";
								while ($count < $rowz){
									echo "<option value=$count>$pageCounter</option>";
									$count= $count+5;
									$pageCounter= $pageCounter+1;
								}
							}
							?>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
