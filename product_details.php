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
    <title>Product Details - Product Details</title>
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
        include("./include/nav.php")?>
            <div class="container-fluid dashboard-content">    
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Product</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="homepage.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item"><a href="explore.php" class="breadcrumb-link">Explore</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mx-5">

                    <?php
                    $product_id = $_GET['product_id'];
                    $select = "SELECT * FROM products where product_id = $product_id";
                    $query = mysqli_query($con, $select);
                    $res = mysqli_fetch_assoc($query);
                    ?>
                    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0 m-b-30">
                                <div class="product-slider p-4">
                                    <div id="carouselExampleIndicators" class="product-carousel carousel slide" data-ride="carousel">
                                        <?php
                                        $file_array = explode(', ', $res['product_image']);
                                        ?>
                                        <div class="carousel-inner">
                                            <?php
                                            for ($i = 0; $i < count($file_array); $i++) {
                                            ?>
                                            <div class="carousel-item <?php if($i == 0) {echo 'active';} ?>">
                                                <img class="d-block w-100" src="uploads/<?php echo $file_array[$i];?>" alt="slide<?php echo $i;?>">
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30 d-flex">
                                <div class="product-details p-4">
                                    <div class="border-bottom pb-3 mb-3">
                                        <h2 class="mb-3"><?php echo $res['product_name'];?></h2>
                                        <h3 class="mb-0 text-primary">Php. <?php echo $res['product_price'];?>.00</h3>
                                    </div>
                                    <div class="product-description">
                                        <h4 class="mb-1">Descriptions</h4>
                                        <p><?php echo $res['product_description'];?></p>
                                        <button onclick="add_cart(<?php echo $res['product_id'];?>)" class="btn btn-primary btn-block btn-lg">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php
                 include("./include/category_card.php")
                ?>

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
