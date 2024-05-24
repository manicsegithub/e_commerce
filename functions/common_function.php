<?php
// include connection start
//   include('./includes/connect.php'); //this function will connect to user_registration.php so i am command this line.
// include connection end


//copy the product(display) fn from index.php and paste here start
//Getting products
function getproducts()
{
    global $con;

    //condition to check  isset or not start 
    if (!isset($_GET['category'])) { //only display the particular img
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand() limit 0,3"; //order by rand means product will dynamically change and limit 0,3 means home page will display only 3 images.
            $result_query = mysqli_query($con, $select_query);
            //$row = mysqli_fetch_assoc($result_query);
//echo $row['product_title'];//this name is call from product table
            while ($row = mysqli_fetch_assoc($result_query)) { //this will check the enterie data in database 
                $product_id = $row['product_id']; //variable = row[column in database name]
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                //$product_image2 = $row['product_image2'];
                //$product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                //this below link was used to dynamic display start
                echo "<div class='col-md-4 mb-2'> <!-- mb for margin bottom gap -->
  <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart </a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
      </div>
  </div>
</div>";
                //this below link was used to dynamic display end 
            }
        }
    }//condition to check isset or not end
}
//copy the product(display) fn from index.php and paste here end

//getting all products start 
function get_all_products(){
    global $con;

    //condition to check  isset or not start 
    if (!isset($_GET['category'])) { //only display the particular img
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand()"; //order by rand means product will dynamically change and limit 0,3 means home page will display only 3 images.
            $result_query = mysqli_query($con, $select_query);
            //$row = mysqli_fetch_assoc($result_query);
//echo $row['product_title'];//this name is call from product table
            while ($row = mysqli_fetch_assoc($result_query)) { //this will check the enterie data in database 
                $product_id = $row['product_id']; //variable = row[column in database name]
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                //$product_image2 = $row['product_image2'];
                //$product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                //this below link was used to dynamic display start
                echo "<div class='col-md-4 mb-2'> <!-- mb for margin bottom gap -->
  <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart </a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
      </div>
  </div>

</div>";
                //this below link was used to dynamic display end 
            }
        }
    }//condition to check isset or not end
}
//getting all products end

//getting unique category start 

function get_unique_products()
{
    global $con;

    //condition to check  isset or not start 
    if(isset($_GET['category'])) { //only display the particular img
        $category_id = $_GET['category'];//get method is used to call the fn 

            //$select_query = "select * from `products` order by rand() LIMIT 0,9"; //order by rand means product will dynamically change and limit 0,3 means home page will display only 3 images.
            $select_query = "select * from `products` WHERE category_id='$category_id'";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);//it will check the number of rows
            if($num_of_rows==0){
                echo "<h2 class='text-center'> No stocks for this category </h2>";
            }

            //$row = mysqli_fetch_assoc($result_query);
//echo $row['product_title'];//this name is call from product table
            while ($row = mysqli_fetch_assoc($result_query)) { //this will check the enterie data in database 
                $product_id = $row['product_id']; //variable = row[column in database name]
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                //$product_image2 = $row['product_image2'];
                //$product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                //this below link was used to dynamic display start
                echo "<div class='col-md-4 mb-2'> <!-- mb for margin bottom gap -->
  <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart </a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
      </div>
  </div>
</div>";
                
            }//this below link was used to dynamic display end 
        
    }//condition to check isset or not end
}//copy the product(display) fn from index.php and paste here end


//getting unique categoty end 




//getting unique brand start 

function get_unique_brand()
{
    global $con;

    //condition to check  isset or not start 
    if(isset($_GET['brand'])) { //only display the particular img
        $brand_id = $_GET['brand'];//get method is used to call the fn 

            //$select_query = "select * from `products` order by rand() LIMIT 0,9"; //order by rand means product will dynamically change and limit 0,3 means home page will display only 3 images.
            $select_query = "select * from `products` WHERE brand_id='$brand_id'";
            $result_query = mysqli_query($con, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);//it will check the number of rows
            if($num_of_rows==0){
                echo "<h2 class='text-center'> This brand is not avilable for Service </h2>";
            }

            //$row = mysqli_fetch_assoc($result_query);
//echo $row['product_title'];//this name is call from product table
            while ($row = mysqli_fetch_assoc($result_query)) { //this will check the enterie data in database 
                $product_id = $row['product_id']; //variable = row[column in database name]
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                //$product_image2 = $row['product_image2'];
                //$product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                //this below link was used to dynamic display start
                echo "<div class='col-md-4 mb-2'> <!-- mb for margin bottom gap -->
  <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart </a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
      </div>
  </div>
</div>";
                
            }//this below link was used to dynamic display end 
        
    }//condition to check isset or not end
}//copy the product(display) fn from index.php and paste here end


//getting unique brand end 



        //copy the brands(display) fn from index.php start here
        function getbrands()
        {
            global $con;
            $select_brands = "select * from `brands` order by rand() limit 0,5";
            $result_brands = mysqli_query($con, $select_brands);
            // $row_data=mysqli_fetch_assoc($result_brands);
// echo $row_data['brand_title']; //this loop will be overloaded so we use while loop for that.
//echo $row_data['brand_id']; 

            while ($row_data = mysqli_fetch_assoc($result_brands)) {
                $brand_title = $row_data['brand_title']; //row means next next line will be display
                $brand_id = $row_data['brand_id'];
                echo "<li class='nav-item'>
    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a> 
    </li>"; //href will diplay the brand id in bottom level.
            }
        }

        //copy the brands(display) fn from index.php end here

        //copy the categories(display) fn from index.php start 
        function getcategories()
        {
            global $con;
            $select_categories = "select * from `categories` order by rand() limit 0,5";
            $result_categories = mysqli_query($con, $select_categories);
            // $row_data=mysqli_fetch_assoc($result_brands);
            // echo $row_data['brand_title']; //this loop will be overloaded so we use while loop for that.
            //echo $row_data['brand_id']; 

            while ($row_data = mysqli_fetch_assoc($result_categories)) {
                $category_title = $row_data['category_title']; //row means next next line will be display and its is a column name 
                $category_id = $row_data['category_id'];
                echo "<li class='nav-item'>
                            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a> 
                          </li>"; //href will diplay the brand id in bottom level.
            }
         
}

//copy the categories(display) fn from index.php end 

//search product start 
function search_product(){
    global $con;

    // //condition to check  isset or not start 
    // if (!isset($_GET['category'])) { //only display the particular img
    //     if (!isset($_GET['brand'])) { //the above 2 if line is not need for this search fn
            //$select_query = "select * from `products` order by rand() limit 0,3"; //order by rand means product will dynamically change and limit 0,3 means home page will display only 3 images.
            
            if(isset($_GET['search_data_product'])){
                $search_data_values = $_GET['search_data'];
            $search_query = "select * from `products` where product_keywords like '%$search_data_values%'"; //the product_keywords is copy from php table and $search_data_values is used for store the values and % is used for any were the product present means find and display it.
            $result_query = mysqli_query($con, $search_query);
            $num_of_rows = mysqli_num_rows($result_query);//it will check the number of rows
            if($num_of_rows==0){
                echo "<h2 class='text-center'>No Result Match.No Product is Found on this Category</h2>";
            }
            //$row = mysqli_fetch_assoc($result_query);
//echo $row['product_title'];//this name is call from product table
            while ($row = mysqli_fetch_assoc($result_query)) { //this will check the enterie data in database 
                $product_id = $row['product_id']; //variable = row[column in database name]
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                //$product_image2 = $row['product_image2'];
                //$product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                //this below link was used to dynamic display start
                echo "<div class='col-md-4 mb-2'> <!-- mb for margin bottom gap -->
  <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart </a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a>
      </div>
  </div>
</div>";
                //this below link was used to dynamic display end 
            }
        }
    }

//     }//condition to check isset or not end
// }//the above 2 if line is not need for this search fn

//searh product end 


//veiw details function start
function veiw_details(){
    global $con;

    //condition to check  isset or not start 
    if(isset($_GET['product_id'])) {//the product_id will check
    if (!isset($_GET['category'])) { //only display the particular img
        if (!isset($_GET['brand'])) {
            $product_id = $_GET['product_id'];
            $select_query = "select * from `products` where product_id=$product_id"; //product_id img will display
            $result_query = mysqli_query($con, $select_query);
            //$row = mysqli_fetch_assoc($result_query);
//echo $row['product_title'];//this name is call from product table
            while ($row = mysqli_fetch_assoc($result_query)) { //this will check the enterie data in database 
                $product_id = $row['product_id']; //variable = row[column in database name]
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                //$product_keywords = $row['product_keywords'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_image1'];
                $product_image2 = $row['product_image2'];
                $product_image3 = $row['product_image3'];
                $product_price = $row['product_price'];
                //this below link was used to dynamic display start <!-- mb for margin bottom gap -->
                echo "<div class='col-md-4 mb-2'> 
  <div class='card'>
      <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price/-</p>
          <a href='index.php?add_to_cart=$product_id ' class='btn btn-info'>Add To Cart </a>
          <!-- <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Veiw More </a> -->
          <a href='index.php' class='btn btn-secondary'>Go Home</a>
      </div>
  </div>
</div>


<div class='col-md-8'> 
<!-- related images -->
<div class='row'>
    <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>Related Product</h4>
    </div>
        <div class='col-md-6'>
        <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
        </div>
        <div class='col-md-6'>
        <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
        </div>
    
</div>    
</div> ";
                //this below link was used to dynamic display end 
            }
        }
    }//condition to check isset or not end
}
}

//view details function end

//get ip address fn start

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//get ip address fn end 

//cart function start

function cart(){
    if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);//it will check the number of rows
            if($num_of_rows>0){
                echo "<script>alert('This items is already Present inside the Cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }else{
                $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
                $result_query = mysqli_query($con, $insert_query);
                echo "<script>alert('Item is added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
}
}

//cart function end 


//function to get the cart item number start 

function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);//it will check the number of rows   
                }else{
                    global $con;
                    $get_ip_add = getIPAddress();
                    $select_query = "select * from `cart_details` where ip_address='$get_ip_add'";
                    $result_query = mysqli_query($con, $select_query);
                    $count_cart_items = mysqli_num_rows($result_query);//it will check the number of rows
                }
                echo $count_cart_items;
    }


//function to get the cart item number end

//Total price function start 
function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total_price= 0;
    $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query = mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result_query)){
        $product_id = $row['product_id'];
        $select_products = "select * from `products` where product_id = '$product_id'";
        $result_products = mysqli_query($con,$select_products);  

        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['product_price']); //mysql price will store here [200,300]
            $product_values = array_sum($product_price); //500
            $total_price += $product_values; //500
        }
    }
    echo $total_price;
}
//Total price function end 

// Get user order details start
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-4 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders </h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                            echo "<h3 class='text-center text-success mt-4 mb-2'>You have Zero pending orders </h3>
                            <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                    }   
                }
            }
        }
    }
}
// Get user order details end 
?>