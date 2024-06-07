<?php
//connect file start 
include('../includes/connect.php');
//connect file end

//connect the function start
include('../functions/common_function.php');
//connect the function end

//check user_id is present or not start 
if(isset($_GET['user_id'])){ //this will show the unquie user
    $user_id=$_GET['user_id']; //user_id from order_table
    
}
//check user_id is present or not end 

//getting total items and total price of all items start
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "select * from `cart_details` where ip_address='$get_ip_address'";
//$cart_query_price = "select * from `cart_details` where user_id='$user_id'";
$result_cart_price = mysqli_query($con,$cart_query_price);

/* invoice number start */
$invoice_number = mt_rand();
//echo $invoice_number;
$status='pending'; //order_status from order_table
/* invoice number end */

$count_products = mysqli_num_rows($result_cart_price); //total_product from order_table
while($row_price=mysqli_fetch_array($result_cart_price)){ // while is used for check the total items in the cart
    $product_id=$row_price['product_id']; //$product_id is varible and product_id is table value
    $select_product = "select * from `products` where product_id = $product_id";
    $run_price = mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price += $product_values;
    }
}
//getting total items and total price of all items end 

//getting quantity from cart start
$get_cart="select * from `cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal = $total_price; //amount_due from order_table
}else{
    $quantity=$quantity; //quantity=5 means it will be multiple by next line
    $subtotal=$total_price*$quantity;//5*5 = 25
}
//getting quantity from cart end 

//insert to order_tables start
$insert_orders = "insert into `user_orders` (user_id,amount_due,invoice_number,total_products,order_date,order_status)
values ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')"; //order_status will be use single quotes mean it is varchar fn
$result_query=mysqli_query($con,$insert_orders); //this line is used for execute the query
if($result_query){
    echo "<script>alert('Orders are Submitted Successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//insert to order_tables end 

//order_pending table start
$insert_pending_orders = "insert into `order_pending` (user_id,invoice_number,product_id,quantity,order_status)
values ($user_id,$invoice_number,$product_id,$quantity,'$status')"; //order_status will be use single quotes mean it is varchar fn
$result_pending_orders=mysqli_query($con,$insert_pending_orders);//this line is used for execute the query
//order_pending table end 

//delete items from cart start
$empty_cart = "Delete from `cart_details` where ip_address='$get_ip_address'";
$result_delete = mysqli_query($con,$empty_cart);
//delete items from cart end 

?>