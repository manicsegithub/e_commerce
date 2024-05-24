<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success">All Product</h3>

    <table class="table table-bordered mt-5">
        <!-- the table head start -->
        <thead class="bg-info">
            <tr>
                <th>Product Id</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <!-- the table head end -->

        <!-- table body start -->
        <tbody class="bg-secondary text-light">

            <!-- dynamic process data for display all product start -->
            <?php 
            $get_products="select * from `products`";
            $result=mysqli_query($con,$get_products);
            $number=0;//it represent product id
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id']; //any variable name = while loop inside variable and product table column name want match means it will be display
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $status=$row['status'];
                $number++;
                ?>
                <tr class='text-center'>
                <td><?php echo $number; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_image'/></td>
                <td><?php echo $product_price; ?></td>
                <td>
                    <!-- php code for sold count start -->
                    <?php 
                    $get_count="select * from `order_pending` where product_id=$product_id";
                    $result_count=mysqli_query($con,$get_count);
                    $rows_count=mysqli_num_rows($result_count);
                    echo $rows_count;
                    ?>
                    <!-- php code for sold count end -->
                </td>
                <td><?php echo $status; ?></td>
                <td><a href='admin.php?edit_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='admin.php?delete_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
            <?php 
            }
            ?>
            <!-- dynamic process data for display all product end -->

<!-- static data start -->

            <!-- <tr class="text-center">
                <td>1</td>
                <td>Apple</td>
                <td>img</td>
                <td>100</td>
                <td>2</td>
                <td>true</td>
                <td><a href="" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="" class="text-light"><i class="fa-solid fa-trash"></i></a></td>
            </tr> -->

<!-- static data end -->
             
        </tbody>
        <!-- table body end -->

    </table>
</body>
</html>