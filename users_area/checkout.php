<!-- Connect file start -->
<?php
//connect file start 
include('../includes/connect.php');
//connect file end
//session start
session_start(); 
//session end 

?>

<!-- Connect file end -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Checkout Page</title>
    <!-- bootstrap CSS Link start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap CSS Link end -->

    <!-- font awseme link start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awseme link end -->

    <!-- CSS Style sheets -->
    <link rel="stylesheet" href="style.css">

    <!-- style image start -->

    <style>
        .logo{
            width: 7%;
            height: 7%;
        }
    </style>
    <!-- style image end -->

</head>

<body>
    <!-- nav Bar start-->
    <div class="container-fluid p-0">
        <!-- 1st child start-->
        <nav class="navbar navbar-expand-lg nav-light bg-info">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Logo</a> -->
                <img src="../img/1.logo.jpg" alt="" class="logo">
                <img src="" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        
                    </ul>
                    <!-- search btn start -->
                    <form class="d-flex" role="search" action="../search_product.php" method="get"> <!-- action="search_product.php" method="get" is the very important one for display crt image-->
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product"> <!-- name="search_data_product" will copy and paste in the commom fn page-->
                    </form>
                    <!-- search btn end -->
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
                <a class='nav-link' href='user_login.php'>Login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='user_logout.php'>Logout</a>
            </li>";
            }
            ?>

            <!-- php code logout end  -->

            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
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

    <!-- 4th child start or Product-->
    <div class="row px-1" >
        <div class="col-md-12">
            <!-- md means screen and add the product img, 10 show the gap between the sidebar -->
            <div class="row" >
              <?php 
              if(!isset($_SESSION['username'])){
                include('user_login.php');
              }else{
                include('payment.php');
              }
              ?>
            </div>
        </div>
        
        <!-- side nav start -->

    
        <!-- side nav end -->
<!-- Last child start -->
<!-- <div class="bg-info p-3 text-center">
        <p> All Copyright, Design by Mani at 2024</p>
    </div> -->

    <!-- call the footer.php start -->
    <?php
    include('../includes/footer.php');
    ?>
    <!-- call the footer.php end -->

    <!-- Last Child end -->
    </div>
    <!-- 4th child end or Product -->
    

    <!-- bootstrap js link start -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
    </script>
    <!-- bootstrap js link end -->
</body>
</html>