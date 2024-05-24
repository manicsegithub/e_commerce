<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <!-- php code for display the dynamic value start -->

    <?php 
    $get_user="select * from `user_table`";
    $result=mysqli_query($con,$get_user);
    $row_count=mysqli_num_rows($result);
    

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'> No Users Yet</h2>";  
}else{

    echo "<tr class='text-center'>
    <th>SI No</th>
    <th>User ID </th>
    <th>User Name</th>
    <th>User email</th>
    
    <th>User Image</th>
    <th>User IP</th>
    <th>User Address</th>
    <th>User mobile</th>
    <th>Delete</th>
</tr>
</thead>

<tbody class='bg-secondary text-light'>";
    
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        
        $user_image=$row_data['user_image'];
        $user_ip=$row_data['user_ip'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        //$date=$row_data['date'];
        $number++;
    
        ?> 
        
        <tr class='text-center'>
        <td> <?php echo $number ?> </td>
        <td> <?php echo $user_id ?> </td>
        <td> <?php echo $username ?> </td>
        <td> <?php echo $user_email ?> </td>
        
        <td> <?php echo "<img src='../users_area/user_images/$user_image' alt='' class='product_image' >" ?> </td>
        <td> <?php echo $user_ip ?> </td>
        <td> <?php echo $user_address ?> </td>
        <td> <?php echo $user_mobile ?> </td>
        <td><a href='admin.php?delete_users=<?php echo $user_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        
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