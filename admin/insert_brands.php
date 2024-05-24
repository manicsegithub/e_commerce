<?php
include('../includes/connect.php');

// post method user to type and submit to save 
if (isset($_POST['Insert_Brands'])) {//this line name value will add in the post methond.<input type="submit" class="bg-info border-0 p-2 my-3" name="Insert_Brands" value="Insert_Brands"> 

    $brand_title = $_POST['brand_title']; //name = brand_title will be display in the place where the stored we define

    //select from the database
    $select_query = "select * from `brands` where brand_title ='$brand_title'"; //this condition will check the same element are present in the table
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select); //check entrie rows 
    if ($number > 0) {
        echo "<script>alert('This brand is Already present inside the database')</script>";
    } else {

        $insert_query = "insert into `brands` (brand_title) values ('$brand_title')"; //this name will be display in phpmyadmin 
        $result = mysqli_query($con,$insert_query); //contain two parameters one is con and another is insert_query
        if ($result) {
            echo "<script>alert('brand has been inserted successfully')</script>";
        }
    }
}
?>


<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2"> <!-- mb means margin bottom-->
    <!-- search start -->
    <div class="input-group w-90 mb-2 me-auto">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt">
            </i>
        </span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Brands"
            aria-describedby="basic-addon1">
    </div>
    <!-- search end -->

    <!-- button start -->
    <div class="input-group w-10 mb-2 me-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="Insert_Brands" value="Insert_Brands"> 
            <!-- <button class="bg-info p-2 my-3 border-0"> Insert Brands </button> -->
    </div>
    <!-- button end -->

</form>