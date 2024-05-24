<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .edit_img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>

<!-- php code for edit and display dynamic value start -->

<?php 
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    //echo $edit_id;
    $get_data = "select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

    //fetching the category id start 
    $select_category = "select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo $category_title;
    //fetching the category id end
    
    // fetching the brand id start 
    $select_brand = "select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    //echo $brand_title;
    //fetching the brand id end

}

?>
<!-- php code for edit and display dynamic value end -->

<!-- php code for editing and update the product start -->

<?php 
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    
    //checking the all items are filled are not start and also use required==required

    if($product_title=='' or $product_description=='' or  $product_keywords=='' or
    $product_category=='' or $product_brands=='' or $product_image1=='' or 
    $product_image2=='' or $product_image3=='' or $product_price==''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // update query start 
        $update_product="update `products` set product_title='$product_title',product_description='$product_description',
        product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brands',
        product_price='$product_price',product_image1='$product_image1',product_image2='$product_image2',
        product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id='$edit_id'";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
        // update query end 
    }
   //checking the all items are filled are not end and also use required==required



}
?>

<!-- php code for editing and update the product end -->



    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_tile" class="form-label">Product Title</label>
                <input type="text" id="product_title" value="<?php echo $product_title ?>" name="product_title" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" value="<?php echo $product_description ?>" name="product_description" class="form-control" required="required">
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" value="<?php  echo $product_keywords ?>"name="product_keywords" class="form-control" required="required">
            </div>

            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select" id="">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?> </option>
                    <!-- php code display dynamic value start -->
                    <?php 
                     //fetching the category id start 
                      $select_category_all= "select * from `categories`";
                      $result_category_all=mysqli_query($con,$select_category_all);
                      while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                      $category_title=$row_category_all['category_title'];
                      $category_id=$row_category_all['category_id'];
                      echo "<option value='$category_id'>$category_title </option>";
                    };
                      //echo $category_title;
                     //fetching the category id end
                    ?>
                    <!-- php code display dynamic value end -->

                    <!-- <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option> -->

                </select>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_Brands" class="form-label">Product Brands</label>
                <select name="product_brands" class="form-select" id="">
                    <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>

                    <?php 
                     //fetching the brand id start 
                      $select_brand_all= "select * from `brands`";
                      $result_brand_all=mysqli_query($con,$select_brand_all);
                      while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                      $brand_title=$row_brand_all['brand_title'];
                      $brand_id=$row_brand_all['brand_id'];
                      echo "<option value='$brand_id'>$brand_title </option>";
                    };
                      //echo $category_title;
                     //fetching the brand id end
                    ?>


                    <!-- <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option> -->

                </select>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>

                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1?>" alt="" class="edit_img">
                </div>

            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>

                <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image2 ?>" alt="" class="edit_img">
                </div>

            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image3</label>

                <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image3 ?>" alt="" class="edit_img">
                </div>

            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" value="<?php echo $product_price ?>" name="product_price" class="form-control" required="required">
            </div>

            <div class="w-50 m-auto">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
            </div>

        </form>
    </div>
</body>
</html>

