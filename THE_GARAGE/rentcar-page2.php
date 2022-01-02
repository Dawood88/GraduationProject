<?php

include("navbar.php");
include("includes/config.php");
include("includes/handlers/rentcar-page2-handler.php");


if(isset($_GET["carid"]))
{ 

  //get the car wanted 
  $carid=$_GET["carid"];
  /*echo "SELECT * FROM cars
  WHERE car_id ='$carid'";*/ 
  $rent1searchQuery=mysqli_query($conn,"SELECT * FROM cars
  WHERE car_id ='$carid'");
  $rent1results = mysqli_fetch_all($rent1searchQuery, MYSQLI_ASSOC);
  $results=$rent1results[0];
  //print_r($results);
  if(isset($_SESSION["userLoggedIn"]) && (isset($_SESSION["userLoggedInEmail"]))  && isset($_GET["officeno"])) 
  { 
    $email=$_SESSION["userLoggedInEmail"];
    /*echo "SELECT * FROM users
    WHERE email ='$email'";*/
    $userquery=mysqli_query($conn,"SELECT * FROM users
    WHERE email ='$email'");
    $userresults = mysqli_fetch_all($userquery, MYSQLI_ASSOC);
    //print_r($userresults);
    $address=$userresults[0]["address"];
    //echo $address;



    //get the office info 
    $office_no=$_GET["officeno"];
  $getofficeinfos=mysqli_query($conn,"SELECT * FROM offices WHERE office_id='$office_no' ");
  $officeresults=mysqli_fetch_all($getofficeinfos, MYSQLI_ASSOC);
  $officeresults4=$officeresults[0];
  }
  else {
    echo "not set";
    echo "<script>window.location.href='signin.php'</script>";}
  //print_r($_SESSION);
}
else {
  echo "not set";
  echo "<script>window.location.href='search.php?allcars=yes'</script>";}
?>


<style>

  <?php include("assets/css/rentcar-page2.css"); ?>
  
</style>

<div class="full-container">

<h5 style="display:none" class='id'> Hello, Your Car Info is 
  <?php print_r($results["car_id"]);?>
</h5>


<form class="full-form" action="rentcar-page2.php" name="rent-form" method="POST">
<h1>Please fill out Your Personal Information </h1>
<div class="full-side">
<div class="right-side">
<div class="fullname">
  <label for="fullname"> Name :  </label>
<input type="text" name="fullname" id="" class="fullname"
value="<?php if(isset($_SESSION["userLoggedIn"])) echo $_SESSION["userLoggedIn"]?>"  required>
<input type="text"   name="carid" style="display:none" value=<?php echo $carid;?>>
<input type="text"   name="officeid" style="display:none" value=<?php echo $office_no;?>>
</div><!-- end fullname-->

<div class="fullemail">
  <label for="fullemail"> Email :  </label>
<input type="text" name="fullemail" id="" class="fullemail"
value="<?php if(isset($_SESSION["userLoggedInEmail"])) echo $_SESSION["userLoggedInEmail"]?>" required>
</div><!-- end fullname-->

<div class="pickupdate">
<label for="pickupdate-input"> PickUp Date </label>
  <input type="date" name="pickupdate" id="" class="pickupdate-input"
  value ="<?php if(isset($_POST["pickupdate"])) echo $_POST["pickupdate"];?>"
  required>
</div><!-- end pickupdate-->


<div class="dropoffdate">
  <label for="dropoffdate-input"> DropOff Date </label>
<input type="date" name="dropoffdate" id="" class="dropoffdate-input" 
value ="<?php if(isset($_POST["dropoffdate"])) echo $_POST["dropoffdate"];?>"  required>
<h4 style="color:darkgreen;margin-top:20px;font-weight:bolder"> * minimum renting days is 3 days </h4>
</div><!-- end dropoffdate-->

<div class="tacbox-father">
<div class="tacbox" >
  <input id="checkbox"  type="checkbox"  name="checkbox" value="checked"  checked="true" 
    />
    
  <label for="checkbox"> I agree to these <a href="#" class="terms-div">Terms and Conditions</a>.</label>
</div><!-- end tackbox--> 
<h5 style="color:red;display:none" id="text">Please Indicate that you  Accept the terms and Conditions </h5>
</div><!-- end tacbox father-->


</div><!--end right side-->


<div class="left-side">
  <label for="address">  Delivery Address : </label>
<textarea name="address" id="" cols="30" rows="9" class="address" required>
  <?php if(isset($_POST["address"])) echo $_POST["address"]; else echo $address;?>
</textarea >
<div class="phone-number" style="display:block">
<label for="phonenumber">Enter your phone number:</label>
<div class="input-group">
  <button disabled style="display:flex;background-color:#fff;outline:0;border:3px solid lightblue;padding:0;width:auto">
  <img style="" src="assets/images/project images/flag1.png" height="40px" width="50px;">
  <h5 style="margin-left:10px;margin-top:10px;margin-right:5px;">+962 </h5>
  </button >
    <input type="number" name="pn" class="form-control" required  maxlength="10"
    value="<?php if(isset($_POST["pn"])) echo$_POST["pn"];?>" >
   
  </div><!-- end input-group-->
  <h5 style="color:red;display:none" id="phone-text">Phone number should start with 07{7,8,9} and should have 10 digits  </h5>
</div><!-- end phone-number-->



</div><!--end left side-->


</div><!-- end full side-->

<div class="bottom-side">

  <input type="submit"  name="fillpersonalinfo" value="Submit" class="btn-grad"> 
</div>


</div><!-- end full-form-->


<div class="terms-and-conditons" style="display:none">
  <div class="first-row-terms" style="display:flex">
  <h1>Terms And Conditions </h1>
  <i class="fa fa-times" aria-hidden="true" id="x" ></i>
  </div><!-- end terms-first-rw-->
  <hr>
  <h4 style="color:#000080;font-weight:bolder">This Car Rental Agreement is entered into between <u> <?php echo $_SESSION["userLoggedIn"];?> (“Owner”) </u> and <u><?php echo $officeresults4["office_name"]." For Renting Cars";?> (“Renter”)</u> (collectively the “Parties”) and outlines the respective rights and obligations of the Parties relating to the rental of a car.</h4>


  <div class="terms-of-use">
  <h1 >1. Rental term : </h1>
  <p>The term of this Car Rental Agreement runs from the date and hour of vehicle pickup as indicated just above the signature line at the bottom of this agreement until the return of the vehicle to Owner, and completion of all terms of this agreement by both Parties,The Parties may shorten or extend the estimate term of rental by mutual consent. </p>

  <h1>2. Scope of use </h1>
<p>Renter will use the Rented Vehicle only for personal or routine business use, and operate the Rented Vehicle only on properly maintained roads and parking lots. Renter will comply with all applicable laws relating to holding licensure to operate the vehicle, and pertaining to operation of motor vehicles. Renter will not sublease the Rental Vehicle or use it as a vehicle for hire. Renter will not take the vehicle location limit.</p>


<h1>3. Mileage</h1>
<p>Mileage of the Rental Vehicle is mileage at the time of commencement of this Car Rental Agreement. Mileage on the vehicle will be limited [ Mileage.Limitations]. Any mileage on the vehicle in excess of this limitation will be subject to an excess mileage surcharge of [Excess.Mileage.Fee] per mile.
</p>


<h1> 4. Security deposit</h1>
<p>Renter will be required to provide a security deposit to Owner in the amount of [ Security.Deposit] dollars (“Security Deposit”) to be used in the event of loss or damage to the Rental Vehicle during the term of this agreement. Owner may, in lieu of collection of a security deposit, place a hold on a credit card in the same amount. In the event of damage to the Rental Vehicle, Owner will apply this Security Deposit to defray the costs of necessary repairs or replacement.If the cost for repair or replacement of damage to the Rental Vehicle exceeds the amount of the Security Deposit, Renter will be responsible for payment to the Owner of the balance of this cost.</p>

<h1>5. Insurance</h1>
<p>Renter must provide to Owner with proof of insurance that would cover damage to the Rental Vehicle at the time this Car Rental Agreement is signed, as well as personal injury to the Renter, passengers in the Rented Vehicle, and other persons or property. If the Rental Vehicle is damaged or destroyed while it is in the possession of Renter, Renter agrees to pay any required insurance deductible and also assign all rights to collect insurance proceeds to Owner.</p>

<h1>6. Indemnification</h1>
<p>Renter agrees to indemnify, defend, and hold harmless the Owner for any loss, damage, or legal actions against Owner as a result of Renter’s operation or use of the Rented Vehicle during the term of this Car Rental Agreement. This includes any attorney fees necessarily incurred for these purposes. Renter will also pay for any parking tickets, moving violations, or other citations received while in possession of the Rented Vehicle.</p>

<h1>7. Representations and warranties</h1>
<p>Owner represents and warrants that to Owner’s knowledge, the Rental Vehicle is in good condition and is safe for ordinary operation of the vehicle.
Renter represents and warrants that Renter is legally entitled to operate a motor vehicle under the laws of this jurisdiction and will not operate it in violation of any laws, or in any negligent or illegal manner.
Renter has been given an opportunity to examine the Rental Vehicle in advance of taking possession of it, and upon such inspection, is not aware of any damage existing on the vehicle other than that notated by separate Existing Damage document.</p>

<h1>8. Jurisdiction and venue</h1>
<p></p>
In the event of any dispute over this agreement, this Car Rental Agreement will be interpreted by the laws of [ Hashemite Kingdom of Jordan ], and any lawsuit or arbitration must be brought in the corresponding region of [ Hashemite Kingdom of Jordan]. If any portion of this agreement is found to be unenforceable by a court of competent jurisdiction, the remainder of the agreement would still have full force and effect.

  </div><!-- end terms of use-->


  <div class="btn-terms">Agree And Continue </div>

</div>

<script src="assets/js/rentcar-page2.js"></script>
<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
   integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
   crossorigin="anonymous"
  />

 
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>