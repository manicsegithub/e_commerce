<?php
include('../includes/connect.php');

// post method user to type and submit to save 
if (isset($_POST['Insert_Categories'])) {
    $category_title = $_POST['cat_title']; //name = cat_tile will be display in the place where the stored we define

    //select from the database
    $select_query = "select * from `categories` where category_title ='$category_title'"; //this condition will check the same element are present in the table
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select); //check entrie rows 
    if ($number > 0) {
        echo "<script>alert('This Category is Already present inside the database')</script>";
    } else {

        $insert_query = "insert into `categories` (category_title) values ('$category_title')"; //this name will be display in phpmyadmin 
        $result = mysqli_query($con,$insert_query); //contain two parameters one is con and another is insert_query
        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2"> <!-- mb means margin bottom-->
    <!-- search start -->
    <div class="input-group w-90 mb-2 me-auto">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt">
            </i>
        </span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories"
            aria-describedby="basic-addon1">
    </div>
    <!-- search end -->

    <!-- button start -->
    <div class="input-group w-10 mb-2 me-auto">
        <input type="submit" class=" bg-info p-2 border-0 my-3 " name="Insert_Categories" value="Insert_Categories">
        <!-- <button class="bg-info p-2 my-3 border-0"> Insert Categories </button> -->
    </div>
    <!-- button end -->

</form>