<?php 

if(isset($_GET['delete_orders'])){
    $delete_orders= $_GET['delete_orders'];

    //delete query start 

    $delete_orders = "Delete  from `user_orders` where order_id=$delete_orders";
    $result_orders=mysqli_query($con,$delete_orders);
    if($result_orders){
        echo "<script>alert('Order delete successfully')</script>";
        echo "<script>window.open('./admin.php','_self')</script>";
    }
    //delete query end 
}

?>