<?php 

if(isset($_GET['delete_users'])){
    $delete_users = $_GET['delete_users'];

    //delete query start 

    $delete_users = "Delete  from `user_table` where user_id=$delete_users";
    $result_users=mysqli_query($con,$delete_users);
    if($result_users){
        echo "<script>alert('User is delete successfully')</script>";
        echo "<script>window.open('./admin.php','_self')</script>";
    }
    //delete query end 
}

?>