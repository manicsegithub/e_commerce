<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

// session start
@session_start();
// session end 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login </title>

    <!-- bootstrap CSS Link start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap CSS Link end-->

    <!-- style start -->
    <style>  /* for hidden the x-axis scroll bar */
    body{
        overflow-x: hidden;
    }
    </style>
    <!-- style end -->

 </head>


<body>
    <div class="container-fluid my-3"> 
        <h2 class="text-center"> User Login </h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6"> <!-- lg means large and xl means extra large -->
            <form action="" method="post" > <!-- entype is used for using img -->
             <!-- username feild start -->
               <div class="form-outline mb-3">
                <label for="user_username" class="form-label"> Username </label>
                <input type="text" id="user_username" class="form-control" 
                   placeholder="Enter your Username" autocomplete="off" required="required" name="user_username"/>
               </div>
             <!-- username feild end -->

             <!-- user password start -->
             <div class="form-outline mb-3">
                <label for="user_password" class="form-label"> Password </label>
                <input type="password" id="user_password" class="form-control" 
                   placeholder="Enter your Password" autocomplete="off" required="required" name="user_password"/>
               </div>
             <!-- user password end -->
              
             <p class="small fw-bold mt-2 pt-1 mb-0"> <a href="#" style="color:black" > Forgot-password </a></p>

             <!-- Register Btn start -->
             <div class="mt-3 pt-2"> <!-- mt means margin top and pt means padding top --> 
                <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login"/>
                <p class="small fw-bold mt-2 pt-1 mb-0"> Don't have an account ? <a href="user_registration.php" class="text-danger">Register</a></p>
             </div>
             <!-- Register Btn end  -->

            </form>
            </div>
        </div>
    </div>

   
</body>
</html>


<?php 

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    

    $select_query = "select * from `user_table` where username='$user_username'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result); //this line will be linked by phpadmin
    $user_ip = getIPAddress();

    /* Cart item start */
    $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";
    $select_cart = mysqli_query($con,$select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    /* cart item end */

    if($rows_count>0){
        $_SESSION['username'] = $user_username;//session will be used 
        if(password_verify($user_password,$row_data['user_password'])){
            
            // echo "<script>alert('Login Successfully')</script>";
            if($rows_count==1 and $row_count_cart==0){  //row_count_cart == 0 means there is no item is present in cart 
                $_SESSION['username'] = $user_username;//session will be used 
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username'] = $user_username;//session will be used 
                echo "<script>alert('Login Successfully')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Password Credentails')</script>";
        }

    }else{
        echo "<script>alert('Invalid username Credentails')</script>";
    }

}

?>