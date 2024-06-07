<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- php code for dynamic value start  -->

<?php 
$user_name=$_SESSION['username'];
$get_user="select * from `user_table` where username='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];

?>

<!-- php code for dynamic value end -->

    <h3 class="text-success "> All My Orders </h3>

    <!-- table will start -->
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
        <tr>
            <th>SI No</th>
            <th>Amount Due</th>
            <th>Invoice Number</th>
            <th>Total Product</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody class="bg-secondary text-light">
            
                <!-- php code select the data from user_orders start -->

                <?php
                $get_order_details="select * from `user_orders` where user_id=$user_id";
                $result_orders=mysqli_query($con,$get_order_details);
                $number=1;
                while($row_data=mysqli_fetch_assoc($result_orders)){
                    
                    
                    $order_id=$row_data['order_id'];
                    $amount_due=$row_data['amount_due'];
                    $invoice_number=$row_data['invoice_number'];
                    $total_products=$row_data['total_products'];
                    $order_date=$row_data['order_date'];
                    $order_status=$row_data['order_status'];
                    if($order_status=='pending'){
                        $order_status='Incomplete';
                    }else{
                        $order_status='Complete';
                    }
                
                    echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    
                    <td>$order_date</td>
                    <td>$order_status</td>";
                    ?>

                    <?php 
                    if($order_status=='Complete'){
                        echo "<td> Paid </td>";
                    }else{
                      echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'> confirm </a></td>
                    </tr>";
                    }
                    $number++;
                }

                ?>
                <!-- php code select the data from user_orders end -->

        </tbody>
    </table>
    <!-- table will end -->
</body>
</html>