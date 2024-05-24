<?php 

if(isset($_GET['delete_payments'])){
    $delete_payments= $_GET['delete_payments'];

    //delete query start 

    $delete_payments = "Delete  from `user_payments` where payment_id=$delete_payments";
    $result_payments=mysqli_query($con,$delete_payments);
    if($result_payments){
        echo "<script>alert('payment delete successfully')</script>";
        echo "<script>window.open('./admin.php','_self')</script>";
    }
    //delete query end 
}

?>