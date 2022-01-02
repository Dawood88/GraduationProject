<?php 
$conn=mysqli_connect("localhost","root","","the garage",3309);
if(isset($_POST['order_id']))
{
$orderid= $_POST["order_id"];

$updatecardates=mysqli_query($conn,"UPDATE `orders` SET `done`=1 WHERE order_id='$orderid'")or die(mysqli_error($conn));
}
  ?>