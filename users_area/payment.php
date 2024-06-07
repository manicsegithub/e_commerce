<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap CSS Link start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap CSS Link end-->

</head>

<style> 
.payment_img{
    width: 90%;
    margin: auto;
    display: block;
}
</style>

<body>

<!-- php code user id start -->
<?php 
    $user_ip = getIPAddress();
    $get_user = "select * from `user_table` where user_ip = '$user_ip' ";
    $result = mysqli_query($con,$get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];

    ?>
    <!-- php code user id end -->

    <!-- payment start -->
    <div class="container">
        <h2 class="text-center text-info"> Payment Options </h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.google.com/search?q=googlepay&rlz=1C1CHBF_enIN1095IN1095&oq=googlepay&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIJCAEQABgKGIAEMgkIAhAAGAoYgAQyCQgDEAAYChiABDIJCAQQABgKGIAEMgkIBRAAGAoYgAQyCQgGEAAYChiABDIJCAcQABgKGIAEMgkICBAAGAoYgAQyCQgJEAAYChiABNIBCDQ1ODlqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8" 
            target="_blank"><img src="../img/UPI.png" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
    <!-- payment end -->

    
</body>
</html>