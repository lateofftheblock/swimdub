<?PHP
include("db_connect.php");
$first=$_GET['first'];
$last=$_GET['last'];
$email=$_GET['email'];
$admin=$_GET['admin'];
$id=$_GET['id'];
if($first != null && $last != null && $email != null){
	$query = "SELECT * FROM users WHERE email = '$email' AND NOT id='$id'";
        $result = mysqli_query($db, $query);

        if ($row = mysqli_fetch_array($result)){
                include("modifyUsers.php");
                echo"This user already exists!";
        }else{

        $updateUser= "UPDATE users SET last_name='$last', first_name='$first', email='$email', admin='$admin' where id=$id";
        $updating= mysqli_query($db, $updateUser);
        header("Location: modifyUsers.php");
        }
}else{
        include("modifyUsers.php");
        echo "Please complete the entire form";
}
?>

