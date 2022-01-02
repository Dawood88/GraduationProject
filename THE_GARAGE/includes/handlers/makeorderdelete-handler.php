<?php 
$conn=mysqli_connect("localhost","root","","the garage",3309);
if(isset($_POST['order_id']))
{
$orderid= $_POST["order_id"];



$searchQuery=mysqli_query($conn,"SELECT * from `orders` WHERE order_id='$orderid'");
  $Queryresults = mysqli_fetch_all($searchQuery, MYSQLI_ASSOC);
  $getcarid=$Queryresults[0]["car_id"];
 
 $updatecardates=mysqli_query($conn,"UPDATE `cars` SET `booking_status`='not booked',`booking_period_start`=null,`booking_period_end`=null WHERE car_id='$getcarid'")or die(mysqli_error($conn));
 
$updatecardates=mysqli_query($conn,"DELETE from `orders` WHERE order_id='$orderid'")or die(mysqli_error($conn));


}
  ?>