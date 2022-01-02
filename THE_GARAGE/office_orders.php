<?php

include("navbar.php");
include("includes/config.php");

include("includes/handlers/officeorders-handler.php");

if(isset($_GET["office_id"]))
{ 
  $officeid=$_GET["office_id"];
  $rent1searchQuery=mysqli_query($conn,"SELECT * FROM orders
  WHERE office_id ='$officeid'");
   $rent1results = mysqli_fetch_all($rent1searchQuery, MYSQLI_ASSOC);
   
   //print_r($rent1results);

   
  $officeQuery=mysqli_query($conn,"SELECT office_name FROM offices
  WHERE office_id ='$officeid'");
   $officeresults = mysqli_fetch_all($officeQuery, MYSQLI_ASSOC);
   
  


  
  
}

else{
  echo "<script>window.location.href='office-login.php'</script>";
}
?>


<style>

  <?php include("assets/css/office-orders.css"); ?>
  
</style>

<div class="full-container">
  <div id='office_name' style="display:none">
    <?php echo $officeresults[0]["office_name"];?>
  </div>
<ul class="list-group">
  <li class="list-group-item active"> Orders </li>

  <?php 
  $i=1;
  foreach($rent1results as $order){
       
    $carid=$order["car_id"];
    //print_r( $order);
    $carQuery=mysqli_query($conn,"SELECT * FROM cars
   WHERE car_id ='$carid'");
   $carresults = mysqli_fetch_all($carQuery, MYSQLI_ASSOC);
   $carbrand=$carresults[0]["brand"];
   $carname=$carresults[0]["car_model"];


   $getimgQuery4=mysqli_query($conn,"SELECT photo_src FROM cars_photos WHERE car_id='$carid' AND photo_order=1");
  //$conn->query($getimgQuery)or die(mysqli_error($conn));
  $photo_src23= mysqli_fetch_all($getimgQuery4, MYSQLI_ASSOC);
  //print_r($photo_src23);
  $car_img_src33=$photo_src23[0]["photo_src"];
  
    //echo $order["done"]=="1";
    echo "<li class='list-group-item' order-id=".$order['order_id'].">
    <span style='display:none' class='co'>".$order["done"]."</span>
    <span style='color:darkblue;font-weight:bolder'>".$i.".</span>
  <img src='$car_img_src33' width='100px' height='100px'><span class='carname' style='font-weight:bolder;font-size:30px'>".$carbrand." ".$carname."</span><span style='margin-left:30px'> From :  ".$order['pickupdate'] ."<span style='margin-left:30px'>TO :".$order['dropoffdate']."<span style='margin-left:30px;color:blue'>  Delivered To : ".$order['username']."</span><div style='margin-left:140px;margin-top:-30px'> <b>Email : </b>".$order['useremail']."<span style='margin-left:20px'><b> Tel :  </b> ".$order['phonenumber']."</span><span style='margin-left:20px'> <b>Delivery Address : </b>".$order['delivery_address']."</span></div><div style='margin-left:140px;margin-top:10px'> <b>Payment Method : </b> ".$order['payment_method']."<div style='margin-left:2px;margin-top:10px;color:red'><b>Total Price  : </b>".$order['totalamount']." $  </div></div></span></span></span><div style='display:flex'><div class='mark-complete'><img src='https://img.icons8.com/emoji/48/000000/check-mark-emoji.png'/>Mark As Complete </div>
  <div  class='mark-delete'><img src='https://img.icons8.com/fluency/48/000000/delete-sign.png'/>Delete This Order </div>
  </div></li>";
  $i=$i+1;
  }
  if(empty($rent1results)) echo " <li class='list-group-item '>No Orders Found </li>";
  ?>
  
  
</ul>
</div><!-- end full-container-->
<script src="assets/js/office-orders.js"></script>