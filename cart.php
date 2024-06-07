<!-- Connect file start -->
<?php
//connect file start 
include('includes/connect.php');
//connect file end

//connect the function start
include('functions/common_function.php');
//connect the function end 

// session start
session_start();
//session end 
?>
<!-- Connect file end -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Site-Cart Details </title>
    <!-- bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font awseme link start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awseme link end -->

    <!-- CSS Style sheets -->
    <link rel="stylesheet" href="style.css">

    <!-- cart_img style start -->

    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>

    <!-- cart_img style end -->

</head>

<body>
    <!-- nav Bar start-->
    <div class="container-fluid p-0">
        <!-- 1st child start-->
        <nav class="navbar navbar-expand-lg nav-light bg-info">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Logo</a> -->
                <img src="./img/1.logo.jpg" alt="" class="logo">
                <img src="" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-plus"><sup>
                                        <?php cart_item(); ?>
                                    </sup></i></a>
                            <!-- sup means sub class -->
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/- </a>
                        </li> -->


                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> 
                         <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li> -->
                    </ul>



                </div>
            </div>
        </nav>
        <!-- 1st child end -->
    </div>
    <!-- nav Bar end -->

    <!-- second Child start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Welcome Guest</a>
            </li> -->

            <!-- php code logout start  -->
            <?php
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>";
            }
            
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
            </li>";
            }
            ?>
            <!-- php code logout end  -->

            <!-- <li class="nav-item">
                <a class="nav-link" href="./users_area/user_login.php">Login</a>
            </li> -->

        </ul>
    </nav>
    <!-- second child end -->

    <!-- 3rd Child start -->
    <div class="bg-light">
        <h3 class="text-center">Yuva Computer</h3>
        <p class="text-center">Welcome to Yuva Computer Natham</p>
    </div>
    <!-- 3rd child end -->

    <!-- 4th child start -->

    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                <!-- <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan="2">Operations</th>
                    </tr>
                </thead> -->
            <tbody>
                    <!-- php code for display the dynamic data start -->

                    <?php
                    global $con;
                    $get_ip_add = getIPAddress();
                    $total_price = 0;
                    $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
                    $result_query = mysqli_query($con, $cart_query);

                    $result_count=mysqli_num_rows($result_query);//this line will check the item present or not inside the cart
                    if($result_count>0){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";



                    while ($row = mysqli_fetch_array($result_query)) {
                        $product_id = $row['product_id'];
                        $select_products = "select * from `products` where product_id ='$product_id'";
                        $result_products = mysqli_query($con, $select_products);

                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                            $product_price = array($row_product_price['product_price']); //mysql price will store here [200,300]
                            $price_table = $row_product_price['product_price'];
                            $product_title = $row_product_price['product_title'];
                            $product_image1 = $row_product_price['product_image1'];
                            $product_values = array_sum($product_price); //500
                            $total_price += $product_values; //500
                    
                            ?>


                            <tr>
                                <td> <?php echo $product_title ?> </td>
                                <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                <td><input type="text" name="qty" class="form-input w-50"></td>

                                <!-- php code for update_cart start -->

                                <?php

                                $get_ip_add = getIPAddress();
                                if(isset($_POST['update_cart'])){
                                    $quantity=$_POST['qty'];
                                    $update_cart = "update `cart_details` set quantity=$quantity where ip_address='$get_ip_add'";
                                    $result_products_quantity= mysqli_query($con,$update_cart);
                                    $total_price=$total_price*$quantity;
                                }

                                ?>

                                <!-- php code for update_cart end -->

                                <td> <?php echo $price_table?>/- </td>
                                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                <td>
                                    <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                                    <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->

                                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart"> <!-- name is very important-->
                                    <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart"> <!-- name is very important-->
                                </td>
                            </tr>
                        <?php 
                        }
                    }
                }

                else{
                    echo "<h2 class='text-center text-danger'> Cart is Empty </h2>";
                }
                    ?>
                    <!-- php code for display the dynamic data end -->

                </tbody>
            </table>
            <!-- subtotal start -->
            <div class="d-flex mb-5"> <!-- d-flex make a horizontal feild-->

            <?php 
             global $con;
             $get_ip_add = getIPAddress();
             //$total_price = 0;
             $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
             $result_query = mysqli_query($con, $cart_query);

             $result_count=mysqli_num_rows($result_query);//this line will check the item present or not inside the cart
             if($result_count>0){
                echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>  $total_price/- </strong></h4>
                <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none' >CheckOut</a></button>";
             }else{
                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
             }
             if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
             }
            
            ?>

                <!-- <h4 class="px-3">Subtotal: <strong class="text-info">  echo $total_price /- </strong></h4>
                <a href="index.php"><button class="bg-info px-3 py-2 border-0 mx-3"> Continue Shopping </button></a>
                <a href="#"><button class="bg-secondary px-3 py-2 border-0 text-light"> CheckOut </button></a> -->
            </div>
            <!-- subtotal end -->
            
        </div>
    </div>
    </form>

    <!-- function to remove the item start -->

    <?php 
    function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query = "Delete from `cart_details` where product_id=$remove_id";
                $run_delete = mysqli_query($con,$delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item=remove_cart_item();
    
    ?>

    <!-- function to remove the item end -->

    <!-- 4th child end -->



    <?php
    include('./includes/footer.php');
    ?>




    <!-- bootstrap js link start -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- bootstrap js link end -->
</body>

</html>