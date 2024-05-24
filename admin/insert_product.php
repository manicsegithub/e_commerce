<!-- connect.php will connect to this page start  -->
<?php 
  include('../includes/connect.php');
?>
<!-- connect.php will connect to this page end  -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Admin Dashboard </title>

    <!-- bootstrap css link start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap css link end -->

    <!-- font awseme link start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awseme link end -->

    <!-- css link start -->
    <link rel="stylesheet" href="../style.css">
    <!-- css link end -->

</head>

<body class="bg-light">
    <div class="container mt-3"> <!-- mt means margin top -->
        <h1 class="text-center">Insert Product</h1>

        <!-- Form start -->
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype is used to insert image -->
        <!-- Product title start -->
            <div class="form-outline mb-4 w-50 m-auto"> <!--w-50 means width,  m-auto means margin auto make equal space-->
                <label for="product_title" class="form-label"> Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Enter Product Title" autocomplete="off" required="required"> <!-- name and id will take for the above label (for="product_title")-->
            </div>
        <!-- product title end -->

        <!-- Description start -->
            <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <label for="product_description" class="form-label"> Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control"
                placeholder="Enter Description" autocomplete="off" required="required"> <!-- name and id will take for the above label (for="description")-->
            </div>
        <!-- Description end -->

         <!-- product_keywords start -->
         <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <label for="product_keyword" class="form-label"> Product Keywords </label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                placeholder="Enter Product Keyword" autocomplete="off" required="required"> <!-- name and id will take for the above label (for="product_keywords")-->
            </div>
        <!-- product_keywords end -->

        <!-- category start -->
        <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <select name="product_categories" id="" class="form-select"> <!-- class="form-select" is used the select the values --> 
                    <option value=""> Select a Category </option>

                    <!-- php code for dynamic start  -->
                    <?php
                      $select_query = "Select * from `categories`";
                      $result_query = mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title']; //category_title must used in database and cannot use like this ('$category_title') it will not display the elements
                        $category_id=$row['category_id']; //category_id must used in database 
                        echo "<option value='$category_id'>$category_title</option>";//the value='$category_id' also we use the value='$category_title'
                      }

                    ?>
                    <!-- php code for dynamic end  -->

                    <!-- <option value="">  Category1 </option>
                    <option value="">  Category2 </option>
                    <option value="">  Category3 </option>
                    <option value="">  Category4 </option> -->
                </select>
        </div>
        <!-- category end -->

         <!-- Brand start -->
         <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <select name="product_brands" id="" class="form-select"> <!-- class="form-select" is used the select the values --> 
                    <option value=""> Select a Brands </option>

                     <!-- php code for dynamic start  -->
                     <?php
                      $select_query = "Select * from `brands`";
                      $result_query = mysqli_query($con,$select_query);
                      while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title']; //brand_title must used in database and cannot use like this ('$category_title') it will not display the elements
                        $brand_id=$row['brand_id']; //brand_id must used in database 
                        echo "<option value='$brand_id'>$brand_title</option>"; //the value='$brand_id' also we use the value='$brand_title'
                      }

                    ?>
                    <!-- php code for dynamic end  -->

                    <!-- <option value=""> Brand1 </option>
                    <option value=""> Brand2 </option>
                    <option value=""> Brand3 </option>
                    <option value=""> Brand4 </option> -->
                </select>
            </div>
        <!-- Brand end -->

         <!-- image1 start -->
         <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <label for="product_image1" class="form-label"> Product Image1 </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                 required="required"> <!-- name and id will take for the above label (for="product_image1")-->
            </div>
        <!-- image1 end -->

         <!-- image2 start -->
         <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <label for="product_image2" class="form-label"> Product Image2 </label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                 required="required"> <!-- name and id will take for the above label (for="product_image2")-->
            </div>
        <!-- image2 end -->

         <!-- image3 start -->
         <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <label for="product_image3" class="form-label"> Product Image3 </label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"
                 required="required"> <!-- name and id will take for the above label (for="product_image3")-->
            </div>
        <!-- image3 end -->

        <!-- price start -->
        <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <label for="product_price" class="form-label"> Product Price </label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Enter Product Price" autocomplete="off" required="required"> <!-- name and id will take for the above label (for="product_keywords")-->
            </div>
        <!-- price end -->

        <!-- submit start -->
        <div class="form-outline mb-4 w-50 m-auto"> <!-- w-50 means width, m-auto means margin auto make equal space-->
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert product" required="required"> <!-- value="insert Product" is dsiplay on screen,px is padding x-axis-->
            </div>
        <!-- submit end -->


        </form>
        <!-- Form end -->

        <!-- php code for insert product start -->
        <?php
        if(isset($_POST['insert_product'])){ //insert_product is copy from the submit btn in above line (name="insert_product") it will be active to store.
            $product_title = $_POST['product_title']; //in square barket insert the name attribute value inside place it (name="product_title")
            $product_description = $_POST['product_description'];
            $product_keyword = $_POST['product_keyword'];
            $product_categories = $_POST['product_categories'];
            $product_brands = $_POST['product_brands'];
            $product_price = $_POST['product_price'];
            $product_status = 'true';

            //accessing image 
            $product_image1 = $_FILES['product_image1']['name'];
            $product_image2 = $_FILES['product_image2']['name'];
            $product_image3 = $_FILES['product_image3']['name'];

            //accessing image temp name 
            $temp_image1 = $_FILES['product_image1']['tmp_name'];
            $temp_image2 = $_FILES['product_image2']['tmp_name'];
            $temp_image3 = $_FILES['product_image3']['tmp_name'];

            //checking empty condition start 
            if($product_title=='' or $product_description=='' or $product_keyword=='' or 
            $product_categories=='' or $product_brands=='' or $product_price=='' or 
            $product_image1=='' or $product_image2=='' or $product_image3==''){ //or is the condition,use single equal to means it will assign the values.double equal to means it will assign condition  
            echo "<script> alert('Please fill all available feilds')</script>"; //this is the alert msg
            exit();
            }else{ //move to new folder or the else condition will be work all image will be store in one new folder
                move_uploaded_file($temp_image1,"./product_images/$product_image1"); //temp name and folder name and product name 
                move_uploaded_file($temp_image2,"./product_images/$product_image2");
                move_uploaded_file($temp_image2,"./product_images/$product_image3");

                //insert query start 
                $insert_product = "insert into `products` (product_title,product_description,product_keywords, 
                category_id,brand_id,product_image1,product_image2,product_image3,
                product_price,date,status) values('$product_title','$product_description',
                '$product_keyword','$product_categories','$product_brands',
                '$product_image1','$product_image2','$product_image3',
                '$product_price',NOW(),'$product_status')"; //products is the table name and product not need to pass because it will use primary key and insert in orderwise. and next insert the values.NOW used for set dynamic date
                $result_query = mysqli_query($con,$insert_product);
                if($result_query){
                    echo "<script> alert('Successfully Insert the Product')</script>";
                }
                //insert query end 
            } 
            //checking empty condition end 
 
        }
        
        ?>
        <!-- php code for insert product end -->

    </div>

</body>

</html>