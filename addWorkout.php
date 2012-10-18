<?php
session_start();
?>
<html>
<title>SWIMDUB - Add a Workout</title>
<body bgcolor=black>
<?PHP
	include("header.php");
?>
<div id="page">
	<div id="page-bgtop">
		<div id="page-bgbtm">
			<div id="content">
				<div class="post">
					<div class="post-bgtop">
						<div class="post-bgbtm">
							<div class="entry">
								<h1>ADD A NEW WORKOUT</h1>
								<form method="post" action="workoutController.php">
								Title:<input type="text"  name="title" id="title"/><br>
								Type of Workout: <select name="type"><br>
								<option value="null"></option>
								<option value="swim">Swim</option>
								<option value="xfit">Crossfit</option>
								<option value="weights">Weights</option>
								<option value="other">other</option>
								</select><br>
								<textarea name="workout" value="workout" rows="10" cols="50"></textarea><br>
								<input type="submit" value=submit>
								</form>
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