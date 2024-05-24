
<!-- php code for dynamic value start -->

<?php 
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];
    //echo $edit_category;

    //call the data from database start

    $get_categories="select * from `categories` where category_id=$edit_category";
    $result=mysqli_query($con,$get_categories);
    $row=mysqli_fetch_assoc($result);
    $category_title=$row['category_title'];
    //echo $category_title;

    //call the data from database end 
}

if(isset($_POST['edit_category_update'])){
    $category_title_update=$_POST['category_title'];

    $update_query="update `categories` set  category_title='$category_title_update' where category_id=$edit_category";
    $result_category=mysqli_query($con,$update_query);
    if($result_category){
        echo "<script>alert('Category is been  updated  successfully')</script>";
        echo "<script>window.open('./admin.php?view_categories','_self')</script>";
    }
}
?>

<!-- php code for dynamic value end -->

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="POST" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" 
            required="required" value='<?php echo $category_title;?>'>         
        </div>
        <input type="submit" value="Update Category" class="btn btn-info px-3 mb-3" name="edit_category_update">
    </form>
</div>