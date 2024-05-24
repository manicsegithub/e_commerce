
<!-- php code for dynamic value start -->

<?php 
if(isset($_GET['edit_brands'])){
    $edit_brands=$_GET['edit_brands'];
    //echo $edit_category;

    //call the data from database start

    $get_brands="select * from `brands` where brand_id=$edit_brands";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
    //echo $category_title;

    //call the data from database end 
}

if(isset($_POST['edit_brand_update'])){
    $brand_title_update=$_POST['brand_title'];

    $update_query="update `brands` set  brand_title='$brand_title_update' where brand_id=$edit_brands";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo "<script>alert('Brand is been  updated  successfully')</script>";
        echo "<script>window.open('./admin.php?view_brands','_self')</script>";
    }
}
?>

<!-- php code for dynamic value end -->

<div class="container mt-3">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="POST" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" 
            required="required" value='<?php echo $brand_title;?>'>         
        </div>
        <input type="submit" value="Update Brand" class="btn btn-info px-3 mb-3" name="edit_brand_update">
    </form>
</div>