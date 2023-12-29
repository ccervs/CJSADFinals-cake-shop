<?php
include('include/db.php');

if (isset($_GET['remove_success']) && $_GET['remove_success'] == 1) {
    echo "<script>alert('Product succesfully removed.')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
if (isset($_GET['order_success']) && $_GET['order_success'] == 1) {
    echo "<script>alert('Order placed!')</script>";
    echo "<script>window.location.assign('cart.php')</script>";
}
session_start();
if (!empty($_SESSION['cart'])) {
    $printCount = count($_SESSION['cart']);
}
else {
    $printCount = 0;
}
if (!empty($_SESSION['user_id']) && !empty($_SESSION['username'])) {
    $printUsername = $_SESSION['username'];
}
else {
    $printUsername = "None"; 
}
?>
<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart - Sweet & Delices Cake Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
</head>

<body>
    <div class="dashboard-main-wrapper">
        <?php
        include("./include/nav.php")
        ?>
            <div class="container-fluid dashboard-content">    
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Cart</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item"><a href="explore.php" class="breadcrumb-link">Explore</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Cart Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    	<div class="card">
                    		<div class="card-body">
                    			<div class="table-responsive">
                    				<table class="table table-bordered">
                    					<thead>
                    						<tr>
                    							<th>No.</th>
                    							<th>Product Name</th>
                    							<th>Price</th>
                    							<th>Quantity</th>
                    							<th>Total</th>
                    							<th>Action</th>
                    						</tr>
                    					</thead>
                                        <form method="post" action="insert_orders.php">
                    					<tbody>
                    						<?php
                    						if ($printCount == 0) {
                    						?>
                    						<tr>
                    							<td colspan="6" align="center">Your cart is empty!</td>
                    						</tr>
                    						<?php } else { ?>
                    						<?php
                                            $total_amount = 0;
                    						for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                    							$select = "SELECT * FROM products WHERE product_id = {$_SESSION['cart'][$i]}";
                    							$query = mysqli_query($con, $select);
                    							$j = $i;
                    							while ($res = mysqli_fetch_assoc($query)) { 
                                                $total_amount = $total_amount + $res['product_price'];
                    						?>
                    						<tr>
                    							<td><?php echo ++$j;?></td>
                    							<td><?php echo $res['product_name'];?><input type="hidden" name="hidden_product_name[]" value="<?php echo $res['product_name'];?>"></td>
                    							<td>Php. <?php echo $res['product_price'];?>.00<input type="hidden" name="hidden_product_price[]" value="<?php echo $res['product_price'];?>"></td>
                    							<td><input class="form-control" type="number" min="1" max="9" step="1" value="1" name="product_quantity[]" onchange="prodTotal(this)"></td>
                    							<td><span>Php. <?php echo $res['product_price'] * 1;?>.00</span><input type="hidden" name="hidden_product_total[]" value="<?php echo $res['product_price'];?>"></td>
                    							<td align="center"><a href="remove_product.php?val_i=<?php echo $i;?>"><i class="fas fa-trash-alt"></i></a></td>
                    						</tr>
                    					    <?php } ?>
                    					    <?php } ?>
                    					    <?php } ?>
                    					    <tr>
                    					    	<td colspan="4" align="right">Total Amount:</td>
                    					    	<td colspan="2" id="total_amount"><span>Php. <?php if ($printCount == 0){echo 0;} else {echo $total_amount;}?>.00</span><input type="hidden" name="hidden_total_amount" value="<?php echo $total_amount;?>"></td>
                    					    </tr>
                                            <tr>
                                                <td colspan="3">
                                                    Delivery Date: <input class="form-control" type="date" name="delivery_date" required="">
                                                </td>
                                                <td colspan="3">
                                                    Payment Method: <select class="form-control" name="payment_method">
                                                        <option>Cash</option>
                                                        <option>Card</option>
                                                    </select>
                                                </td>
                                            </tr>
                    					    <tr>
                    					    	<td colspan="6" align="right">
                    					    		<button class="btn btn-warning" onclick="clear_cart()">Clear</button>
                    					    		<button class="btn btn-primary" type="submit">Checkout</button>
                    					    	</td>
                    					    </tr>
                    					</tbody>
                    					</form>
                    				</table>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                </div>

            </div>
            <?php
            include("./include/footer.php")
            ?>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
        function add_cart(product_id) {
                $.ajax({
                    url:'cart_fetch.php',
                    data:'id='+product_id,
                    method:'get',
                    dataType:'json',
                    success:function(cart){
                        console.log(cart);
                        $('.badge').html(cart.length);
                    }
                });
            }       
        function prodTotal(quantity) { 
            var price = $(quantity).parent().prev().find('input').val();
        	var total = quantity.value * price;
            $(quantity).parent().next().find('input').val(total);
            $(quantity).parent().next().find('span').html("Php. "+total);
            var total_amount = 0;
            $('input[name="hidden_product_total[]"]').each(function(){
                total_amount += parseInt($(this).val()); 
            });
            $('#total_amount').find('span').html("Php. "+total_amount);
            $('#total_amount').find('input').val(total_amount);
        }  
        function clear_cart() {
            var flag = confirm("Do you want to clear cart?");
            if (flag) {
                window.location.href = "cart_clear.php";
            }
        }
    </script>
</body>
</html>