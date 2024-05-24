<h3 class="text-center text-success">All Payment</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <!-- php code for display the dynamic value start -->

    <?php 
    $get_payments="select * from `user_payments`";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'> No Payments is Received </h2>";  
}else{

    echo "<tr class='text-center'>
    <th>SI No</th>
    <th>Invoice Number</th>
    <th>Amount</th>
    <th>Payment Mode</th>
    <th>Order Date</th>
    <th>Delete</th>
</tr>
</thead>

<tbody class='bg-secondary text-light'>";
    
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $payment_id=$row_data['payment_id'];
        $order_id=$row_data['order_id'];
        $invoice_number=$row_data['invoice_number'];
        $amount=$row_data['amount'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
    
        ?> 
        
        <tr class='text-center'>
        <td> <?php echo $number ?> </td>
        <td><?php echo $invoice_number ?></td>
        <td> <?php echo $amount ?></td>
        <td><?php echo $payment_mode?></td>
        <td> <?php echo $date ?></td>
        
        <td><a href='admin.php?delete_payments=<?php echo $payment_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        
    </tr> 
     
    <?php 
    }
    ?>
    
<?php 
}
?>
    

    <!-- php code for display the dynamic value end -->

        
    

    <!-- <tbody class="bg-secondary text-light">
        <tr>
            <td>1</td>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>d</td>
            <td>e</td>
            <td>f</td>
        </tr> -->

    </tbody> 
    
</table>