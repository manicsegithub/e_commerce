<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- bootstrap CSS Link start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap CSS Link end-->

    <!-- font awseme link start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awseme link end -->

    <!-- style for hidden the scroll bar start -->

    <style>
    body{
        overflow: hidden;
    }
    </style>

    <!--  style for hidden the scroll bar end -->

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5"> Admin Login </h2>

        <!-- div for algin the img and form start  -->

        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5"> <!-- lg means large and xl means extra-large -->
               <img src="../img/adminreg.jpg" alt="Admin Registration" class="img-fluid">
            </div>

            <div class="col-lg-6 col-xl-4"> <!-- lg means large and xl means extra-large -->
               <form action="" method="POST">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Username</label>
                    <input type="text" id="admin_name" autocomplete="off" name="admin_name" placeholder="Enter your name" required="required" class="form-control">
                </div>

                

                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="admin_password" id="admin_password" autocomplete="off" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                </div>

               

                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Register</a></p>
                </div>

               </form>
            </div>
        </div>

        <!-- div for algin the img and form end  -->

    </div>
</body>
</html>

<!-- php code for verify the adminname & password start -->

<?php 
include('../includes/connect.php');

if(isset($_POST['admin_login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['admin_password'];
    

    $select_query = "select * from `admin_table` where admin_name='$admin_name'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result); //this line will be linked by phpadmin
    //$user_ip = getIPAddress();

    /* Cart item start */
    // $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";
    // $select_cart = mysqli_query($con,$select_query_cart);
    // $row_count_cart = mysqli_num_rows($select_cart);
    /* cart item end */

    if($rows_count>0){
        $_SESSION['admin_name'] = $admin_name;//session will be used 
        if(password_verify($admin_password,$row_data['admin_password'])){
            
            // echo "<script>alert('Login Successfully')</script>";
            if($rows_count==1){  //row_count_cart == 0 means there is no item is present in cart 
                $_SESSION['admin_name'] = $admin_name;//session will be used 
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('admin_login.php','_self')</script>";
             }
            // else{
            //     $_SESSION['username'] = $user_username;//session will be used 
            //     echo "<script>alert('Login Successfully')</script>";
            //     echo "<script>window.open('payment.php','_self')</script>";
            // }
        }else{
            echo "<script>alert('Invalid Password Credentails')</script>";
        }

    }else{
        echo "<script>alert('Invalid username Credentails')</script>";
    }

}

?>

<!-- php code for verify the adminname & password end -->