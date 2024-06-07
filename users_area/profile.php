<!-- Connect file start -->
<?php
//connect file start 
include('../includes/connect.php');
//connect file end

//connect the function start
include('../functions/common_function.php');
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
    <title>E-Commerce Site <?php echo $_SESSION['username']?></title>
    <!-- bootstrap CSS Link start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap CSS Link end-->

    <!-- font awseme link start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awseme link end -->

    <!-- CSS Style sheets start -->
    <link rel="stylesheet" href="../style.css">
    
    <!-- CSS style sheets end  -->

    <!-- style start -->
    <style>  /* for hidden the x-axis scroll bar */
    body{
        overflow-x: hidden;
    }
    .profile_img{
width: 90px;
 height: 80%;  
object-fit: contain; 
margin: auto;
display: block;
}

/* .edit_image{
    width: 100px;
    height: 100px;
    object-fit: contain;
} */

    </style>
    <!-- style end -->

</head>

<body>
    <!-- nav Bar start-->
    <div class="container-fluid p-0">
        <!-- 1st child start-->
        <nav class="navbar navbar-expand-lg nav-light bg-info">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Logo</a> -->
                <img src="../img/1.logo.jpg" alt="" class="logo">
                
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
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-plus"><sup> <?php cart_item(); ?> </sup></i></a>
                            <!-- sup means sub class -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php  total_cart_price(); ?>/- </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="../admin/admin.php">Admin</a> 
                        </li>  -->
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
                <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='user_logout.php'>Logout</a>
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

    <!-- 4th child end -->
    

        <div class="row">

        
        <div class="col-md-2">  <!-- 2 represent the side nav bar-->
        <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
        <li class="nav-item bg-info">
           <a class="nav-link text-light"  href="#"><h4>Your Profile</h4></a>
        </li>

        <!-- Fetch the image start -->
        <?php
        $username=$_SESSION['username'];
        $user_image="select * from `user_table` where username='$username'";
        $result_image= mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($result_image);
        $user_image=$row_image['user_image'];
        echo "<li class='nav-item '>
        <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
      </li>";
        ?>
        <!-- Fetch the image end -->

        <li class="nav-item ">
           <a class="nav-link text-light"  href="profile.php">Pending Order</a>
        </li>
        <li class="nav-item ">
           <a class="nav-link text-light"  href="profile.php?edit_account">Edit Account</a>
        </li>
        <li class="nav-item ">
           <a class="nav-link text-light"  href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item ">
           <a class="nav-link text-light"  href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item ">
           <a class="nav-link text-light"  href="user_logout.php">Logout</a>
        </li>
        
        </ul>
        </div>

        <div class="col-md-10 text-center"> <!-- 10 represent the remind space  and 2+10= 12 is total padding size and i will change 8 for my coninent-->
        <!-- fn is call from common_function.php start -->
         <?php get_user_order_details(); 
         if(isset($_GET['edit_account'])){
            include('edit_account.php');
         }
         if(isset($_GET['my_orders'])){
            include('user_order.php');
         }
         if(isset($_GET['delete_account'])){
            include('delete_account.php');
         }
         ?>
         <!-- fn is call from common_function.php end -->
        </div>

    </div>
    
    
        <!-- call the footer.php start -->
        
        <?php
    include('../includes/footer.php');
    ?>
    
    <!-- call the footer.php end -->
    

    <!-- bootstrap js link start -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- bootstrap js link end -->
</body>
</html>