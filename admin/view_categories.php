<h3 class="text-center text-success"> All Categories </h3>

<!-- table start -->
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>SI.No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody class="bg-secondary text-light">

    <!-- php code dynamic value display from category table start -->

    <?php 
    $select_category = "select * from `categories`";
    $result=mysqli_query($con,$select_category);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $category_id=$row['category_id'];
        $category_title=$row['category_title'];
        $number++;
    
    ?>
        <tr class="text-center">
            <td> <?php echo $number; ?></td>
            <td> <?php echo $category_title; ?></td>
            <td><a href='admin.php?edit_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='admin.php?delete_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
    <?php
    } //while loop continous 
    ?>
    <!-- php code dynamic value display from category table end -->
    </tbody>
</table>
<!-- table end -->