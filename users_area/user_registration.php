<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- bootstrap CSS Link start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap CSS Link end-->

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center"> New User Registration </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6"> <!-- lg means large and xl means extra large -->
            <form action="" method="POST" enctype="multipart/form-data"> <!-- entype is used for using img -->
             <!-- username feild start -->
               <div class="form-outline mb-3">
                <label for="user_username" class="form-label"> Username </label>
                <input type="text" id="user_username" class="form-control" 
                   placeholder="Enter your Username" autocomplete="off" required="required" name="user_username"/>
               </div>
             <!-- username feild end -->

             <!-- user email start -->
             <div class="form-outline mb-3">
                <label for="user_email" class="form-label"> Email </label>
                <input type="email" id="user_email" class="form-control" 
                   placeholder="Enter your Email" autocomplete="off" required="required" name="user_email"/>
               </div>
             <!-- user email end -->

            

             <!-- user password start -->
             <div class="form-outline mb-3">
                <label for="user_password" class="form-label"> Password </label>
                <input type="password" id="user_password" class="form-control" 
                   placeholder="Enter your Password" autocomplete="off" required="required" name="user_password"/>
               </div>
             <!-- user password end -->

              <!-- comfirm password start -->
              <div class="form-outline mb-3">
                <label for="confirm_user_password" class="form-label"> Comfirm Password </label>
                <input type="password" id="confirm_user_password" class="form-control" 
                   placeholder="Enter your Confirm Password" autocomplete="off" required="required" name="confirm_user_password"/>
               </div>
             <!-- confirm password end -->

             <!-- user image start -->
             <div class="form-outline mb-3">
                <label for="user_image" class="form-label"> User Image </label>
                <input type="file" id="user_image" class="form-control" 
                    required="required" name="user_image"/>
               </div>
             <!-- user image end -->
            
              <!-- user Address feild start -->
              <div class="form-outline mb-3">
                <label for="user_address" class="form-label"> Address </label>
                <input type="text" id="user_address" class="form-control" 
                   placeholder="Enter your Address" autocomplete="off" required="required" name="user_address"/>
               </div>
             <!-- user Address feild end -->

             <!-- user contact feild start -->
             <div class="form-outline mb-3">
                <label for="user_mobile" class="form-label"> Contact </label>
                <input type="text" id="user_mobile" class="form-control" 
                   placeholder="Enter your Mobile" autocomplete="off" required="required" name="user_mobile"/>
               </div>
             <!-- user contact feild end -->

             <!-- Register Btn start -->
             <div class="mt-4 pt-2"> <!-- mt means margin top and pt means padding top --> 
                <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register"/>
                <p class="small fw-bold mt-2 pt-1 mb-0"> Already have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
             </div>
             <!-- Register Btn end  -->

            </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code start -->
<?php 
if(isset($_POST['user_register'])){ /*the user_register is take from name attribute or submit btn */
   $user_username = $_POST['user_username']; //the name attribute is copy and paste inside the post['']
   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];
   /* password_hash start */
   $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
   /* password_hash end */
   $user_confirmpassword = $_POST['confirm_user_password'];
   $user_address = $_POST['user_address'];
   $user_mobile = $_POST['user_mobile'];
   $user_image =$_FILES['user_image']['name'];
   $user_tmp_image =$_FILES['user_image']['tmp_name'];
   $user_ip = getIPAddress();

  /* select query start */

    $select_query ="select * from `user_table` where username='$user_username' or user_email='$user_email'"; //username=$user_name means php column name = code name 
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
    echo "<script>alert('Username and Email id is already exist')</script>";
   }else if($user_password!=$user_confirmpassword){
    echo "<script>alert('Password does not Match')</script>";
   }
   else{
    /*insert query start */

  move_uploaded_file($user_tmp_image,"./user_images/$user_image"); 
  $insert_query = "insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
  values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
  $sql_execute=mysqli_query($con,$insert_query);

  echo "<script>alert('Successfully Register')</script>";
 
  /* insert query end */

  /* select query end */
  }

  /* select cart items start */
  $select_cart_items = "Select * from `cart_details` where ip_address='$user_ip'";
  $result_cart = mysqli_query($con,$select_cart_items);
  $rows_count = mysqli_num_rows($result_cart);
  if($rows_count>0){
    $_SESSION['username'] = $user_username;//session will be used 
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }else{
    echo "<script>window.open('../index.php','_self')</script>";
  }
  /* select cart items end */
}




?>

<!-- php code end -->