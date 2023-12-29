<?php
include('include/db.php');

$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
$user_mobile = $_POST['user_mobile'];
$user_address = $_POST['user_address'];
$insert = "INSERT INTO user (username, user_email, user_password, user_mobile, user_address) VALUES ('$username', '$user_email', '$user_password', '$user_mobile', '$user_address')";
$select = "SELECT * FROM user WHERE username = '$username'";
$query = mysqli_query($con, $select);
$res = mysqli_fetch_assoc($query);
if (mysqli_num_rows($query) > 0) {
	header("Location: user_register.php?register_msg=1");
}
else {
	mysqli_query($con, $insert);
	header("Location: user_login.php");
}
?>