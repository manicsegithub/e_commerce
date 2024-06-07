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
    <title>E-Commerce Site</title>
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
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-plus"><sup> <?php cart_item(); ?> </sup></i></a>
                            <!-- sup means sub class -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php  total_cart_price(); ?>/- </a>
                        </li>


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
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-light" type="submit" name="search_data_product">Search</button> -->
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
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

    <!-- 4th child start or Product-->
    <div class="row px-1">
        <div class="col-md-10">
            <!-- md means screen and add the product img, 10 show the gap between the sidebar -->
            <div class="row">

                <!-- Fetching Product start -->
                <!-- Display start -->
                <?php
                //calling fn from common_function start 
                //getproducts();
                get_all_products();//all product will display on product page 
                get_unique_products();
                get_unique_brand();
                //search_product();
                

                //calling fn from common_function end
                //   $select_query = "select * from `products` order by rand() LIMIT 0,3"; //order by rand means product will dynamically change and limit 0,3 means home page will display only 3 images.
                //   $result_query = mysqli_query($con,$select_query);
                //   //$row = mysqli_fetch_assoc($result_query);
                //   //echo $row['product_title'];//this name is call from product table
                //   while($row = mysqli_fetch_assoc($result_query)){ //this will check the enterie data in database 
                //     $product_id = $row['product_id']; //variable = row[column in database name]
                //     $product_title = $row['product_title'];
                //     $product_description= $row['product_description'];
                //     //$product_keywords = $row['product_keywords'];
                //     $category_id = $row['category_id'];
                //     $brand_id = $row['brand_id'];
                //     $product_image1 = $row['product_image1'];
                //     //$product_image2 = $row['product_image2'];
                //     //$product_image3 = $row['product_image3'];
                //     $product_price = $row['product_price'];
                //     //this below link was used to dynamic display start
                //     echo "<div class='col-md-4 mb-2'> <!-- mb for margin bottom gap -->
                //     <div class='card'>
                //         <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                //         <div class='card-body'>
                //             <h5 class='card-title'>$product_title</h5>
                //             <p class='card-text'>$product_description</p>
                //             <a href='#' class='btn btn-info'>Add To Cart </a>
                //             <a href='#' class='btn btn-secondary'>Veiw Cart </a>
                //         </div>
                //     </div>
                // </div>";
                // //this below link was used to dynamic display end 
                //   } 
                
                ?>
                <!-- Display end -->
                <!-- Fetching Product end -->

                <!-- <div class="col-md-4 mb-2"> // mb for margin bottom gap 
                    <div class="card">
                        <img src="./img/2.laptop.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-info">Add To Cart </a>
                            <a href="#" class="btn btn-secondary">Veiw Cart </a>
                        </div>
                    </div>
                </div> -->

                <!-- Remove All below data start -->
                <!-- <div class="col-md-4  mb-2"> 
                    <div class="card">
                        <img src="./img/3.harddisk.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-info">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">Veiw Cart </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4  mb-2">
                    <div class="card">
                        <img src="./img/4.mouse.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-info">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">Veiw Cart </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4  mb-2">
                    <div class="card">
                        <img src="./img/5.speaker.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-info">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">Veiw Cart </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4  mb-2">
                    <div class="card">
                        <img src="./img/6.cctv.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-info">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">Veiw Cart </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4  mb-2">
                    <div class="card">
                        <img src="./img/7.keyboard.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-info">Add to Cart</a>
                            <a href="#" class="btn btn-secondary">Veiw Cart </a>
                        </div>
                    </div>
                </div> -->
                <!-- Remove All below data end -->

            </div>
        </div>

        <!-- side nav start -->

        <div class="col-md-2 bg-secondary p-0">
            <!-- Brand will be display start -->
            <ul class="navbar-nav me-auto text-center"> <!-- me means margin -->
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light">
                        <h4>Delivery Brands</h4>
                    </a>
                </li>

                <!-- php code display the file start  -->
                <?php
                //calling fn start
                getbrands();
                //calling fn end 
                
                // $select_brands = "select * from `brands`";
                // $result_brands = mysqli_query($con,$select_brands);
                // // $row_data=mysqli_fetch_assoc($result_brands);
                // // echo $row_data['brand_title']; //this loop will be overloaded so we use while loop for that.
                // //echo $row_data['brand_id']; 
                
                // while ($row_data=mysqli_fetch_assoc($result_brands)) {
                //     $brand_title = $row_data['brand_title']; //row means next next line will be display
                //     $brand_id = $row_data['brand_id'];
                //     echo "<li class='nav-item'>
                //             <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a> 
                //           </li>";//href will diplay the brand id in bottom level.
                // }
                ?>
                <!-- php code display the file end -->

                <!-- Below line will be sample  -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link text-light">Brand 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Brand 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Brand 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Brand 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Brand 1</a>
                </li> -->
            </ul>
            <!-- Brand will be end -->

            <!-- Categories will start -->
            <ul class="navbar-nav me-auto text-center"> <!-- me means margin -->
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light">
                        <h4>Categories</h4>
                    </a>
                </li>

                <!-- php code category display the file start  -->
                <?php
                getcategories();

                // $select_categories = "select * from `categories`";
                // $result_categories = mysqli_query($con,$select_categories);
                // // $row_data=mysqli_fetch_assoc($result_brands);
                // // echo $row_data['brand_title']; //this loop will be overloaded so we use while loop for that.
                // //echo $row_data['brand_id']; 
                
                // while ($row_data=mysqli_fetch_assoc($result_categories)) {
                //     $category_title = $row_data['category_title']; //row means next next line will be display and its is a column name 
                //     $category_id = $row_data['category_id'];
                //     echo "<li class='nav-item'>
                //             <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a> 
                //           </li>";//href will diplay the brand id in bottom level.
                // }
                ?>
                <!-- php code category display the file end -->


                <!-- <li class="nav-item">
                    <a href="#" class="nav-link text-light">Categories 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Categories 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Categories 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Categories 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Categories 1</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-light">Categories 1</a>
                </li> -->
            </ul>
            <!-- Categories will be end -->

        </div>
        <!-- side nav end -->
        <!-- Last child start -->
        <!-- <div class="bg-info p-3 text-center">
        <p> All Copyright, Design by Mani at 2024</p>
        </div> -->

        <!-- calling footer start -->
        <?php
        include("./includes/footer.php");
        ?>
        <!-- calling footer end -->

        <!-- Last Child end -->
    </div>
    <!-- 4th child end or Product -->


    <!-- bootstrap js link start -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- bootstrap js link end -->
</body>

</html>