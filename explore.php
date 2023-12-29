<?php
include('include/db.php');

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
    <title>Explore - Sweet & Delices Cake Shop</title>
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
                            <h2 class="pageheader-title">Products</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="homepage.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Explore</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">
                    <?php
                    $select = "SELECT * FROM products ORDER BY RAND()";
                    $query = mysqli_query($con, $select);
                    while ($res = mysqli_fetch_assoc($query)) {
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="product-thumbnail rounded">
                            <div class="product-img-head">
                                <div class="product-img">
                                    <?php
                                    $file_array = explode(', ', $res['product_image']);
                                    ?>
                                    <img src="uploads/<?php echo $file_array[0];?>" class="img-fluid">
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-content-head">
                                    <h3 class="product-title"><?php echo $res['product_name'];?></h3>
                                    <div class="product-price">Php. <?php echo $res['product_price'];?>.00</div>
                                </div>
                                <div class="product_btn">
                                    <button onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-primary">Add to Cart</button>
                                    <!-- <a href="#" onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-primary">Add to Cart</a> -->
                                    <a href="product_details.php?product_id=<?php echo $res['product_id'];?>" class="btn btn-outline-light">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>

                <?php
                 include("./include/category_card.php")
                ?>
s
            </div>
            <?php
            include("./include/footer.php")?>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/main-js.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true, margin: 10, dots: 0, autoplay: 4000, autoplayHoverPause: true, responsive:{
                    0:{items:1}, 600:{items:2}, 1000:{items:4}
                }
            })
        });
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
    </script>
</body>
</html>