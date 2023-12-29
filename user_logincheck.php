<?php
include('include/db.php');

$username = $_POST['username'];
$user_password = $_POST['user_password'];
$select = "SELECT * FROM user WHERE username = '$username' AND user_password = '$user_password'";
$query = mysqli_query($con, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	session_start();
	$_SESSION['user_id'] = $res['user_id'];
	$_SESSION['username'] = $res['username'];
	header("Location: homepage.php?login_success=1");
} 
else {
	header("Location: user_login.php?login_error=1");
}
?>

