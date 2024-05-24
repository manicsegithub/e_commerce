<?php
/*
$con=mysqli_connect('localhost','root','','shop','3307');
if($con){
    echo "connection successfully";
}else{
    die(mysqli_error($con));
}
*/


$con=mysqli_connect('localhost','root','','shop','3307');
if(!$con){ //if it not connect mean it will be show,for removing the connection successfull statement.
    die(mysqli_error($con));
}
    



?>