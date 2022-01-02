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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
<style>
  
  <?php include("assets/css/office-orders.css"); ?>
  
</style>

<div class="full-container">
  <div id='office_name' style="display:none">
    <?php echo $officeresults[0]["office_name"];?>
  </div>
  <div class='card  mb-4 pb-3 ' id="cardwow" style="">
            <div class='card-header'>
            <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="card-title" style="inline-block">Order Delete</h3>
        </div>
        <div class="col-sm-6">
          <div class="input-group input-group-sm" style="inline-block">
            <input type="text" class="form-control" style="opacity:0">
            <div class="input-group-append" >
              <button class="btn btn-primary"  id="header-close" type="button"><i class="fas fa-times"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
            </div>
            <div class='card-body'>
                <h4 class='card-title'>Are you sure you want to delete this order ?
                  (Order # <span id="odno">40</span>) </h4>
                <p class='card-text'>* Once the order is deletedd, it can never be restored </p>
                
                <button  id="close" class=' ml-4 btn btn-secondary float-right' >Close</button>
                <button  order-id="" buttontype="del" class='btn btn-danger float-right' >Delete </button>
            </div>
        </div>
    <h1> Orders </h1>
  <table class="table ">
            <thead class="thead-dark"> 
                <tr>
                    
                    <th> Order Id </th>
                    <th>Car Photo</th>
                    <th>Car Name</th>
                    <th>Reservation Date </th>
                    <th>Delivered To </th>
                    <th>Email </th>
                    <th>Phone </th>
                    <th>Delivery Address </th>
                    <th>Payment Info </th>
                    <th>Total Amount </th>
                    <th> Done  </th>
                    
                </tr>
            </thead>
            <tbody>
            
           

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
    
  if($order["done"]==0){
    //echo $order["done"]=="1";
    echo " <tr>
   
    <td>".$order["order_id"]."</td>
    <td><img src='$car_img_src33' width='100px' height='100px'></td>
    <td>".$carbrand." ". $carname."</td>
    <td>From ".$order["pickupdate"]." TO ".$order["dropoffdate"]."</td>
    <td>".$order["username"]."</td>
    <td>".$order["useremail"]."</td>
    <td>".$order["phonenumber"]."</td>
    <td>".$order["delivery_address"]."</td>
    <td>".$order["payment_method"]."</td>
    <td style='color:red'>".$order["totalamount"]." دينار</td>
    <td> <button  id='mark-complete' order-id=".$order["order_id"]." class='btn btn-outline-primary'> Mark As Done </button> </td>
    </tr>";
   
  }
    else{
      echo " <tr class=' text-muted' style='background-color:#fff'>
   
    <td>".$order["order_id"]."</td>
    <td><img src='$car_img_src33' width='100px' height='100px'></td>
    <td style=' text-decoration: line-through;'>".$carbrand." ". $carname."</td>
    <td>From ".$order["pickupdate"]." TO ".$order["dropoffdate"]."</td>
    <td style=' text-decoration: line-through;'>".$order["username"]."</td>
    <td>".$order["useremail"]."</td>
    <td>".$order["phonenumber"]."</td>
    <td>".$order["delivery_address"]."</td>
    <td>".$order["payment_method"]."</td>
    <td style='color:red;text-decoration: line-through;'>".$order["totalamount"]." دينار</td>
    <td> YES <button  button-type='mark-delete' class=' ml-5 btn btn-outline-danger ' order-id=".$order["order_id"]."> <i class='fas fa-trash'></i> </button>
</td>
    </tr>";
    }
    
  $i=$i+1;
  }
  if(empty($rent1results)) echo " 

  <li class='list-group-item  mb-3 mt-3 '> 
  <h3 style='color:darkblue' >No Orders Found  </h3></li>
  <script> 
  $('.table').css('display','none') </script>";
  ?>
  
  
     
  </tbody>
        </table>
</div><!-- end full-container-->
<script src="assets/js/office-orders.js"></script>