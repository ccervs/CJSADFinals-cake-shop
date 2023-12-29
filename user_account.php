<?php
include('include/db.php');

if (isset($_GET['edit_success']) && $_GET['edit_success'] == 1) {
    echo "<script>alert('Edited details!')</script>";
    echo "<script>window.location.assign('user_account.php')</script>";
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
?>

<!doctype html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Account - Sweet & Delicaces Cake Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
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
                            <h2 class="pageheader-title"><?php echo $printUsername;?>'s' Account</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $printUsername;?>'s Account</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        $user_id = $_SESSION['user_id'];
                        $select = "SELECT * FROM user WHERE user_id = $user_id";
                        $query = mysqli_query($con, $select);
                        $res = mysqli_fetch_assoc($query);
                        ?>
                        <form id="form" class="splash-container" method="post" action="user_update.php">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" name="username" required="" autocomplete="off" value="<?php echo $res['username'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="email" name="user_email" required="" autocomplete="off" value="<?php echo $res['user_email'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" required="" name="user_password" value="<?php echo $res['user_password'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="tel" name="user_mobile" required="" pattern="[0-9]{11}" autocomplete="off" value="<?php echo $res['user_mobile'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-lg" type="text" name="user_address" required="" autocomplete="off" value="<?php echo $res['user_address'];?>">
                                    </div>
                                    <div class="form-group pt-2">
                                        <input type="hidden" value="<?php echo $res['user_id'];?>" name="hidden_user_id">
                                        <button class="btn btn-block btn-primary" type="submit">Change</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"><?php echo $printUsername;?>'s' Order Details</h2>
                        </div>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $printUsername;?>'s Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Orders Details Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Order id</th>
                                                <th>Product name</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                                            
                                            $select = "SELECT order_details.*, orders.order_id FROM order_details JOIN orders ON order_details.order_id = orders.order_id WHERE user_id = $user_id";
                                            $query = mysqli_query($con, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['order_id'];?></td>
                                                <td><?php echo $res['product_name'];?></td>
                                                <td><?php echo $res['quantity'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No. </th>
                                                <th>Order id</th>
                                                <th>Product name</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title"><?php echo $printUsername;?>'s Order History</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                        </div>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $printUsername;?>'s Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Orders Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Orders id</th>
                                                <th>Delivery date</th>
                                                <th>Payment method</th>
                                                <th>Total amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $select = "SELECT * FROM orders WHERE user_id = $user_id";
                                            $query = mysqli_query($con, $select);
                                            $i = 1;
                                            while ($res = mysqli_fetch_assoc($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $res['order_id'];?></td>
                                                <td><?php echo $res['delivery_date'];?></td>
                                                <td><?php echo $res['payment_method'];?></td>
                                                <td>Php. <?php echo $res['total_amount'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No. </th>
                                                <th>Users id</th>
                                                <th>Delivery date</th>
                                                <th>Payment method</th>
                                                <th>Total amount</th>
                                            </tr>
                                        </tfoot>
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
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
    <script src="js/data-table.js"></script>
</body>
</html>

<?php
}
else {
    header("Location: user_login.php");
}
?>