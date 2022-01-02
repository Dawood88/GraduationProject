<?php 
$conn=mysqli_connect("localhost","root","","the garage",3309);
if(isset($_POST['credit_info']))
{

  //print_r($_POST["info_array"]);
  $office_no=$_POST["info_array"][0];
 $carid=$_POST["info_array"][1] ;
$pickupdate=date('Y-m-d', strtotime($_POST["info_array"][2]));
 $dropoffdate=date('Y-m-d', strtotime($_POST["info_array"][3]));
 
 $username=$_POST["info_array"][4];
 $useremail=$_POST["info_array"][5];
 $phonenumber=$_POST["info_array"][6];
 $address=$_POST["info_array"][7];
 $total_price=$_POST["info_array"][8];
  $payment_method_info=$_POST["credit_info"];


  $makeorderQuery=mysqli_query($conn,"INSERT INTO `orders`(`order_id`, `car_id`, `office_id`, `totalamount`, `pickupdate`, `dropoffdate`, `payment_method`, `username`, `useremail`, `phonenumber`, `delivery_address`) VALUES (null,'$carid','$office_no','$total_price','$pickupdate','$dropoffdate','$payment_method_info','$username','$useremail','$phonenumber','$address')")or die(mysqli_error($conn));

  $updatecardates=mysqli_query($conn,"UPDATE `cars` SET `booking_status`='booked',`booking_period_start`='$pickupdate',`booking_period_end`='$dropoffdate' WHERE car_id='$carid'")or die(mysqli_error($conn));


  
  

}
else{
  echo "NO";
}

?>