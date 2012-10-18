<?PHP
session_start();
include("header.php");
$email=$_SESSION['email'];
$getAdmin= "SELECT admin FROM users WHERE email='$email'";
$isAdmin=mysqli_query($db, $getAdmin);
$row=mysqli_fetch_array($isAdmin);
$admin=$row['admin'];
if ($admin != 1){
	header("Location: home.php");
}
?>

<html>
<title>SWIMDUB - ADD/EDIT USERS</title>
<body>
<div id="page">
        <div id="page-bgtop">
                <div id="page-bgbtm">
                        <div id="content">
                                <div class="post">
                                        <div class="post-bgtop">
                                                <div class="post-bgbtm">
							<div class="entry">
							<h1>ADD/EDIT USERS</h1>
                                                        <table id=\"hor-minimalist-b\"><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Admin?</th><th>Action</th></tr>
							<form action="addUser.php">
							<tr><td width = 1000><input type="text" name="first"></td>
							<td width = 1000><input type="text" name="last"></td>
							<td width = 1000><input type="text" name="email"></td>
							<td width = 500><select name="admin"><option value="0">No</option><option value="1">Yes</option></select></td>
							<td width = 500><input type="submit" value="Add"></td></tr></form>
							<?PHP
							$getUsers= "SELECT * FROM users ORDER BY last_name";
							$result= mysqli_query($db, $getUsers);
							while($row=mysqli_fetch_array($result)){
								$first=$row['first_name'];
								$last= $row['last_name'];
								$email=$row['email'];
								$admin=$row['admin'];
								$id= $row['id'];
	                                                        echo "<form action=\"editUser.php\">";
	                                                        echo "<tr><td width = 1000><input type=\"text\" name=\"first\" value=\"$first\"></td>";
        	                                                echo "<td width = 1000><input type=\"text\" name=\"last\" value=\"$last\"></td>";
                	                                        echo "<td width = 1000><input type=\"text\" name=\"email\" value=\"$email\"></td>";
								if ($admin == 0){
	                        	                                echo "<td width = 500><select name=\"admin\"><option value=\"0\">No</option><option value=\"1\">Yes</option></select></td>";
								}else{
									echo "<td width = 500><select name=\"admin\"><option value=\"1\">Yes</option><option value=\"0\">No</option></select></td>";
								}
								echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
                                	                        echo "<td width = 500><input type=\"submit\" value=\"Update\"></td></tr></form>";

							}?>
	
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

