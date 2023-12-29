<?php
include('include/db.php');

session_start();
if (isset($_SESSION['cart']) && $_SESSION['cart'] !== null) {
if (isset($_SESSION['user_id']) && $_SESSION['username'] !== null) {
	$username = $_SESSION['username'];
	$user_id = $_SESSION['user_id'];
	$product_name = $_POST['hidden_product_name'];
    $price = $_POST['hidden_product_price'];
    $quantity = $_POST['product_quantity'];
    $total = $_POST['hidden_product_total'];
    $total_amount = $_POST['hidden_total_amount'];
    $delivery_date = $_POST['delivery_date'];
    $payment_method = $_POST['payment_method'];
    $insert_order = "INSERT INTO orders (user_id, delivery_date, payment_method, total_amount) values ('$user_id', '$delivery_date', '$payment_method', '$total_amount')";
    mysqli_query($con, $insert_order);
    $order_id = mysqli_insert_id($con);
    for ($i=0; $i < count($product_name); $i++) { 
    	$insert_order_details = "INSERT INTO order_details (order_id, product_name, quantity) values ('$order_id', '$product_name[$i]', '$quantity[$i]')";
    	mysqli_query($con, $insert_order_details);
    }
    unset($_SESSION['cart']);
    header("Location: cart.php?order_success=1");
} else {
	echo "<script>
	alert('Require login to order.');
	location.assign('user_login.php');
	</script>";
}
} else {
	echo "<script>
	alert('Please select a product to order.');
	location.assign('cart.php');
	</script>";
}
?>