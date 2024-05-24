<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

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
        <h2 class="text-center mb-5"> Admin Registration </h2>

        <!-- div for algin the img and form start  -->

        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5"> <!-- lg means large and xl means extra-large -->
               <img src="../img/adminreg.jpg" alt="Admin Registration" class="img-fluid">
            </div>

            <div class="col-lg-6 col-xl-4"> <!-- lg means large and xl means extra-large -->
               <form action="" method="POST">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" autocomplete="off" name="admin_name" placeholder="Enter your name" required="required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" autocomplete="off" name="admin_email" placeholder="Enter your email" required="required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" autocomplete="off" name="admin_password" placeholder="Enter your password" required="required" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="confirm_password" id="confirm_password" autocomplete="off" name="confirm_password" placeholder="Enter your confirm_password" required="required" class="form-control">
                </div>

                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Don't you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                </div>

               </form>
            </div>
        </div>
        <!-- div for algin the img and form end  -->

    </div>
</body>
</html>

<!-- php code start -->
<?php 
include('../includes/connect.php');

if(isset($_POST['admin_registration'])){ /*the user_register is take from name attribute or submit btn */
   //$admin_id = $_POST['admin_id'];
   $admin_name = $_POST['admin_name']; //the name attribute is copy and paste inside the post['']
   $admin_email = $_POST['admin_email'];
   $admin_password = $_POST['admin_password'];
   /* password_hash start */
   $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
   /* password_hash end */
   $confirm_password = $_POST['confirm_password'];
//    $user_address = $_POST['user_address'];
//    $user_mobile = $_POST['user_mobile'];
//    $user_image =$_FILES['user_image']['name'];
//    $user_tmp_image =$_FILES['user_image']['tmp_name'];
//    $user_ip = getIPAddress();

  /* select query start */

    $select_query ="select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'"; //username=$user_name means php column name = code name 
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    
    if($rows_count>0){
    echo "<script>alert('Username and Email id is already exist')</script>";
   }else if($admin_password!=$confirm_password){
    echo "<script>alert('Password does not Match')</script>";
   }
   else{
    /*insert query start */


  $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password)
  values('$admin_name','$admin_email','$hash_password')";
  $sql_execute=mysqli_query($con,$insert_query);

  echo "<script>alert('Successfully Register')</script>";
 
  /* insert query end */

  /* select query end */
  }
}