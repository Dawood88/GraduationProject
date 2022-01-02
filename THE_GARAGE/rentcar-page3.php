<?php

include("navbar.php");
include("includes/config.php");


if(isset($_GET["dropoffdate"]))
{
  $carid=$_GET["carid"];
  /*echo "SELECT * FROM cars
  WHERE car_id ='$carid'";*/ 
  $rent1searchQuery=mysqli_query($conn,"SELECT * FROM cars
  WHERE car_id ='$carid'");
  $rent1results = mysqli_fetch_all($rent1searchQuery, MYSQLI_ASSOC);
  $results=$rent1results[0];
  //print_r($results);



  $getimgQuery4=mysqli_query($conn,"SELECT photo_src FROM cars_photos WHERE car_id='$carid' AND photo_order=1");
  //$conn->query($getimgQuery)or die(mysqli_error($conn));
  $photo_src23= mysqli_fetch_all($getimgQuery4, MYSQLI_ASSOC);
  //print_r($photo_src23);
  $car_img_src33=$photo_src23[0]["photo_src"];
  //echo $car_img_src33;

  $office_no=$rent1results[0]["office_no"];
  $getofficeinfo=mysqli_query($conn,"SELECT * FROM offices WHERE office_id='$office_no' ");
$officeresult=mysqli_fetch_all($getofficeinfo, MYSQLI_ASSOC);
$officeresult2=$officeresult[0];
//print_r( $officeresult2);


}
else{
  echo "<script>window.location.href='rentcar-page2.php'</script>";
}
  
?>

<style>

  <?php include("assets/css/rentcar-page3.css"); ?>
  
</style>

<div class="full-container">
  <div class="full-side">
  <div class="right-side">
	
 <h3 style="display:none" class="mg"> <?php echo $_GET["officeno"];?></h3>
 <h3 style="display:none" class="mg"> <?php echo $_GET["carid"];?></h3>
 <h3 style="display:none" class="mg"> <?php echo $_GET["pickupdate"];?></h3>
 <h3 style="display:none" class="mg"> <?php echo $_GET["dropoffdate"];?></h3>
 <h3 style="display:none" class="mg"> <?php echo $_GET["username"];?></h3>
 <h3 style="display:none" class="mg"> <?php echo $_GET["useremail"];?></h3>
 <h3 style="display:none" class="mg"> <?php echo $_GET["phonenumber"];?></h3>
 <h3 style="display:none" class="mg"> <?php echo $_GET["address"];?></h3>


    <form class="screenPayment">

      <div class="payment">
        <h2 class="payment-headline type-L">Payment method</h2>
        <div class="payment-tab" style="display:flex;position:relative" id="cashpayment">
          <div class="payment-radioGroup" >
            <input id="paypal" name="cardType" type="radio" value="paypal" >
            <label for="paypal">Cash </label>
          </div><!-- end payment-radioGroup-->
          
          <img style="align-items:flex-end;position:absolute;right:10px;top:-10px" src="https://img.icons8.com/color/96/000000/wallet--v1.png"/>
        </div><!-- end payment-tab-->
        <div class="payment-tab payment-tab-isActive" style="margin-bottom:30px;width:auto" id="creditpayment">
        
          <div class="payment-radioGroup" >
            <input checked type="radio" name="cardType" id="creditCart" value="creditCard">
            <label for="creditCart">Add credit card</label>
          </div><!-- end payment-radioGroup-->
          <img class="payment-cardimg" src="//my-assets.netlify.com/codepen/dailyui-002/img_cards.svg">
         
       
          
          <div class="textInputGroup">
            <label for="nameOnCard">Name on card</label>
            <input id="nameOnCard" name="nameOnCard" required type="text">
          </div>
          <div class="textInputGroup">
            <label for="cardNumber">Card number</label>
            <input id="cardNumber" name="cardNumber" placeholder="1234 - 5678 - 9876 - 5432" required type="text">
          </div>
          <div class="textInputGroup textInputGroup-halfWidth">
            <label for="expirationDate">Expiration Date</label>
            <input id="expirationDate" name="expirationDate" placeholder="MM / YY" required type="text">
          </div>
          <div class="textInputGroup textInputGroup-halfWidthRight">
            <label for="cvc">CVC</label>
            <input id="cvc" name="cvc" placeholder="XXX" required type="text">
          </div>
         

  <h3 style="color:red;display:none" id="sms">Plaese Fill the misssing fields </h3>

          </div><!-- end payment-tab payment-tab-isActive-->
        </div><!-- end payment-->
      </form>

      

      
    

    <div class="screenEndofprototype">
      <div class="endMessage"></div>
    </div>

  </div>

  <div class="left-side">
    <h1>Pricing and Billing </h1>
  <div class="first-row" style="display:flex;margin-top:20px;border:2px solid black;padding:20px;position:relative">
  <img src="<?php echo $car_img_src33;?>" alt="" class="car-img" width="150px">
  <div class="car-desc" style="display:block">
  <h2 class="car-name" style="margin-left:20px;"> <?php echo  $results["brand"]." ".  $results["car_model"]?> </h2>
  <h4 style="margin-left:20px;color:red"><?php echo $results["price_per_day"];?> $/day </h4>
  </div><!-- end car-desc-->
  </div><!-- end first-row-->


  <h1 style="margin-top:20px;">Booking Info </h1>
  <hr>
  <div class="payment-info" style="display:block;margin:0 auto ;width:100%;flex: 1;position:relative">
  <div class="rowpricing" style="display:flex;width:100%;">
  <h4 style="align-self:flex-start">Booking Period : </h4>
  <h3 style="align-self:flex-end;margin-left:60px;position:absolute;right:0;font-size:25px" id="resdate"> From <?php echo $_GET["pickupdate"]." To  ". $_GET["dropoffdate"]?></h3>  
  </div><!-- end row-->

  <div class="rowpricing" style="display:flex;width:100%;">
  <h4 style="align-self:flex-start">Days :  </h4>
  <h3 style="align-self:flex-end;color:green;font-weight:bolder;position:absolute;right:20px">  <?php 
  $earlier = new DateTime($_GET["pickupdate"]);
  $later = new DateTime($_GET["dropoffdate"]);
  $abs_diff = $later->diff($earlier)->format("%a");
  echo $abs_diff;
  ?> Days </h3>  
  </div><!-- end row-->


  <div class="rowpricing" style="display:flex;width:100%;">
  <h4 style="align-self:flex-start">SubTotal :   </h4>
  <h3 style="align-self:flex-end;position:absolute;right:20px;color:black;font-weight:bolder">  <?php 
  $total=$abs_diff*$results["price_per_day"];
  echo $abs_diff*$results["price_per_day"];
  ?> $ </h3>  
  </div><!-- end row-->


  <div class="rowpricing" style="display:flex;width:100%;">
  <h4 style="align-self:flex-start">Tax (16%) :   </h4>
  <h3 style="align-self:flex-end;position:absolute;right:20px;color:black;font-weight:bolder">  <?php 
  $tax=$total*(16/100);
 echo $total*(16/100)
   ?> $ </h3>  
  </div><!-- end row-->

  <div class="rowpricing" style="display:flex;width:100%;">
  <h4 style="align-self:flex-start">Delivery  :   </h4>
  <h3 style="align-self:flex-end;position:absolute;right:20px;color:black;font-weight:bolder">  <?php 
 echo 40;
   ?> $ </h3>  
  </div><!-- end row-->


  <div class="rowpricing" style="display:flex;width:100%;border-bottom:2px solid darkblue ">
  <h4 style="align-self:flex-start">Insurance Deposit :   </h4>
  <h3 style="align-self:flex-end;position:absolute;right:20px;color:black;font-weight:bolder">  <?php 
 echo 200;
   ?> $ </h3>  
  </div><!-- end row-->

  <div class="rowpricing" style="display:flex;width:100%;">
  <h4 style="align-self:flex-start">Total Price  :   </h4>
  <h3 style="align-self:flex-end;position:absolute;right:20px;color:red;font-weight:bolder">  <?php 
 echo $total+240+$tax;
   ?> $ </h3>  
   <h3 style="display:none" class="mg"> <?php echo $total+240+$tax?></h3>
  </div><!-- end row-->
  

  <div class="rowpricing" style="display:flex;width:100%;">
    <button class="btn-grad" id="checkoutbtn"> Checkout </button>  
  </div><!-- end row-->
  </div><!-- en payment-info-->


 
  </div><!-- end left-side-->
 
</div>

  </div><!-- end right side-->
</div><!--end full-side-->
</div><!-- end full-container-->


<script src="assets/js/rentcar-page3.js"></script>