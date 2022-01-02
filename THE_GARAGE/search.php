<?php  include("navbar.php");
include("includes/config.php");
include("includes/handlers/filter-handler.php");
include("includes/handlers/search-handler.php");
include("includes/handlers/viewcarinfo-handler.php");

function getinputvalue($name)
{
	if(isset($_GET[$name])) echo $_GET[$name];
}
if(isset($_GET["carmodel"] ) && isset($_GET["cartype"] ) && isset($_GET["pickupdate"] ) )
{ 

  $carmodel=$_GET["carmodel"];
  $cartype=$_GET["cartype"];
  $pickupdate=$_GET["pickupdate"];
  //echo $cartype;
  $date=strtotime(date("Y-m-d"));
  
  //echo $cartype;
  /*echo "SELECT * FROM cars
  WHERE brand LIKE '%$carmodel%'
     OR car_type LIKE '%$cartype%'
     OR car_model LIKE '%$carmodel%'
    ";*/
  $searchQuery=mysqli_query($conn,"SELECT * FROM cars
  WHERE brand LIKE '%$carmodel%'
     OR car_type LIKE '%$cartype%'
     OR car_model LIKE '%$carmodel%'
    ");

if(mysqli_num_rows($searchQuery)!=0)
{ 
  $results = mysqli_fetch_all($searchQuery, MYSQLI_ASSOC);
  //print_r($results);
  $selected=array();
  foreach($results as $car)
{ 
  //exclude cars that are booked 
 $pickupcardate=  strtotime($car["booking_period_start"]);
  $dropoffcardate= strtotime($car["booking_period_end"]) ;
  //echo $date."<br>";
  //print_r( $pickupcardate)."<br>";
  //print_r( $dropoffcardate)."<br>";
  //echo strtolower($car["car_type"])."<BR>";
  //echo strtolower($cartype);
  //print((strtolower($car["car_type"])==strtolower($cartype)));
  if (($date >= $pickupcardate) && ($date <= $dropoffcardate)
  || $car["booking_status"]=="booked"){
    echo "";
}else{
   array_push($selected,$car);  
}
  

}
  
}
//print_r($selected);
}
else{
  if(isset($_GET["allcars"]) )
  {

    $searchQuery=mysqli_query($conn,"SELECT * FROM cars");
    if(mysqli_num_rows($searchQuery)!=0)
  { 
    $results = mysqli_fetch_all($searchQuery, MYSQLI_ASSOC);
    //print_r($results);
    $date=strtotime(date("Y-m-d"));
      $selected=array();
        foreach($results as $car)
        {
            $pickupcardate=  strtotime($car["booking_period_start"]);
            $dropoffcardate= strtotime($car["booking_period_end"]) ;
            if (($date >= $pickupcardate) && ($date <= $dropoffcardate)||  $car["booking_status"]=="booked"){  echo"";}
            else{ array_push($selected,$car);}
        }
  } 

  }
  if(!isset($filtered_cars) && !isset($_GET["allcars"]))
  echo "<script>window.location.href='index.php';</script>";

}

?>
<style>

  <?php include("assets/css/search.css"); ?>
  <?php include("assets/css/slider.css"); ?>
  <?php include("assets/css/image-slider.css"); ?>
</style>


<div class="full-container">


<div class="search-filter">

<form action="search.php" method="POST" class="search-box">
  <h4 style="color:darkblack;margin-left:20px;">Rent The Best <em style="color:red"><?php 
  if(isset($_GET["carmodel"]))echo $_GET["carmodel"]; ?></em> Cars In Jordan  </h4>
    <div class="car-name" >
    <label> CAR MODEL  </label>
  <input type="text" name="carname" id="" required
  value="<?php getinputvalue("carmodel");?>">
  </div><!-- end car name-->


 

  <div class="car-type">
    <label> <b style="font-size:1.3rem;font-weight:bolder">Car Type :  </b> </label>
  <div class="first-row-filter">
  <h1 class='error' style="color:red;font-size:20px;display:none"> - Please Select one or more car type </h1>
  <input class="form-check-input" type="checkbox" value="Sedan" id="flexCheckChecked" name="type[]" 
  >
  <label class="form-check-label"  for="flexCheckChecked">Sedan</label>

  <input class="form-check-input" type="checkbox" value="SUV" id="flexCheckChecked"  name="type[]"
  >
  <label class="form-check-label" for="flexCheckChecked">SUV</label>


  <input class="form-check-input" type="checkbox" value="Hybrid" id="flexCheckChecked" name="type[]">
  <label class="form-check-label" for="flexCheckChecked">Hybrid</label>

  <input class="form-check-input" type="checkbox" value="Hatchback" id="flexCheckChecked" name="type[]">
  <label class="form-check-label" for="flexCheckChecked">Hatchback</label>

  <input class="form-check-input" type="checkbox" value="Micro" id="flexCheckChecked" name="type[]">
  <label class="form-check-label" for="flexCheckChecked">Micro</label>
  
  </div>


  </div><!--end car type-->



  <div class="pickup-date" style="display:none">
  <label><b>PickUp Date :</b>  </label>
  <input type="date" class="pickupdate" name="pickupdate" >
  </div><!--end pickupdate-->
  <hr>
  <div class="price-range">
  
  <b style="font-size: 1.5rem;
    color: darkblue;
    font-weight: bolder;
   
    margin-left:20px;"> Price Range  </b>

<input type="text"   id="sampleSlider" class="slider" name="price-range" />

  </div>


  <input type="submit" name="filterButton" value="Filter Results  " class="search" >

  

    </form><!-- end search-box-->

</div><!--end search-filter-->

<div class="middle-part">
<h1>Cars For Rent </h1>
<hr>
<div class="search-results">

<?php
//print_r($selected);

if(isset($filtered_cars))$selected=$filtered_cars;
//print_r($selected);
if(!empty($selected))
{
 
foreach ($selected as $car) {
  
  $car_id;
  $car_id=$car['car_id'];
  //echo $car_id;
  //echo "SELECT photo_src FROM cars_photos WHERE car_id='$car_id' AND photo_order=1";
  $getimgQuery=mysqli_query($conn,"SELECT photo_src FROM cars_photos WHERE car_id='$car_id' AND photo_order=1");
  //$conn->query($getimgQuery)or die(mysqli_error($conn));
  $photo_src= mysqli_fetch_all($getimgQuery, MYSQLI_ASSOC);
  //print_r($photo_src);
  $car_img_src=$photo_src[0]["photo_src"];
  
  //echo $car_img_src;
  
  
  echo "<div class='search-item' car-id=' ".$car['car_id']."'>
  <div class='first-row'>
  <div class='car-name'>". $car['brand']." ".$car['car_model']."</div><div class='car-price'>".$car['price_per_day']." $ /day </div></div>
  <br><hr><img class='car-image' src=".$car_img_src.
  "><button class='view-details'>View Details </button></div>";
}}
else
echo "<h1 style='color:red' > No results found for  $carmodel $cartype.</h1>";

?>
</div><!--end search-results-->
</div><!--end middel-part-->

<?php $rent1searchQuery=mysqli_query($conn,"SELECT * FROM cars
  WHERE booking_status !='booked' LIMIT 3");
   $rent1results = mysqli_fetch_all($rent1searchQuery, MYSQLI_ASSOC);
   $images=array();
   foreach($rent1results as $car)
   {
     $carid=$car["car_id"];
    $getimgQuery4=mysqli_query($conn,"SELECT photo_src FROM cars_photos WHERE car_id='$carid' AND photo_order=1 " );
    //$conn->query($getimgQuery)or die(mysqli_error($conn));
    $photo_src23= mysqli_fetch_all($getimgQuery4, MYSQLI_ASSOC);
    //print_r($photo_src23);
    $car_img_src33=$photo_src23[0]["photo_src"];
    array_push($images,$car_img_src33);
    array_push($images,$car["price_per_day"]);
    array_push($images,$car["brand"]);
    array_push($images,$car["car_model"]);
    array_push($images,$carid);
    
    
   }
   //print_r($images);?>
<div class="hot-deals" style="">

<h1>Hot Deals </h1>
<hr>
<div class="d-flex bd-highlight" id="deal" carid=<?php echo $images[4];?>>
  <div class="p-2 flex-fill bd-highlight"><img width="150px" height="100px" src="<?php echo $images[0];?> "> </div>
  <div class="p-2 flex-fill bd-highlight" id="deal-name"> <?php echo $images[2]." ".$images[3];?></div>
  <div class="p-2 flex-fill bd-highlight" id="deal-price"> $<?php echo $images[1]?>/Day
  <button class='view-deal-details'>View Details </button>
</div>
</div>

<div class="d-flex bd-highlight" id="deal" carid=<?php echo $images[9];?>>
  <div class="p-2 flex-fill bd-highlight"><img width="200px" height="100px" src="<?php echo $images[5];?> "> </div>
  <div class="p-2 flex-fill bd-highlight" id="deal-name"> <?php echo $images[7]." ".$images[8];?></div>
  <div class="p-2 flex-fill bd-highlight" id="deal-price"> $<?php echo $images[6]?>/Day
  <button class='view-deal-details'>View Details</button></div>
</div>

<div class="d-flex bd-highlight" id="deal" carid=<?php echo $images[14]?>>
  <div class="p-2 flex-fill bd-highlight"><img width="200px" height="100px" src="<?php echo $images[10];?> "> </div>
  <div class="p-2 flex-fill bd-highlight" id="deal-name"> <?php echo $images[12]." ".$images[13];?></div>
  <div class="p-2 flex-fill bd-highlight" id="deal-price"> $<?php echo $images[11]?>/Day
  <button class='view-deal-details'>View Details</button>    </div>
 
</div>


</div><!--end hot-deals-->
</div><!-- end full-container-->


<script src="assets/js/search.js"></script>
<script src="assets/js/slider.js"></script>


<?php
if(isset($_GET["cartype"]))
{
  $cb="input[type=checkbox][value=".$_GET['cartype']."]";
  echo "<script>
$('document').ready(function(){
  $('$cb').prop('checked','true');
});
</script>";

}

if(isset($_GET["filter_cartypes"]))
{ 
  $cartypes=unserialize(urldecode($_GET["filter_cartypes"]));
  foreach($cartypes as $cartype)
  {
    $cb="input[type=checkbox][value=".$cartype."]";
    echo "<script>
  $('document').ready(function(){
  $('$cb').prop('checked','true');
  });
  </script>";
  }
  
  

}




?>




<div class="car-info" style="display:none">
  <div class="first-row-car" style="display:flex;position:relative">
  <a title="Car Site" class="car-name-info" style="align-items:flex-start;"></a>

  <h1 style="" class="price-wow" id="pricey">28 $ /day
  <i class="fa fa-times" style="cursor:pointer;margin-left:20px;color:black ;font-size:36px"
  id="close"></i>
</h1>
  <br>
  </div><!-- end first-row-car-->
  <div class="images-and-fautures"  >

  

  
  <div class="mySlides ">
    <img src="" class="image2" style="width:300px; height:300px">
  </div>

  
  <div class="mySlides ">
    <img src="" class="image3" style="width:300px;height:300px">
  </div>

  <div class="mySlides">
  
    <img src="" class="image4" style="width:300px;height:300px"> 
  </div>

  <div class="mySlides">
    <img src="" class="image5" style="width:200px;height:300px;"> 
  </div>


  <div class="mySlides">
    <img src="" class="image6" style="width:200px;height:300px;"> 
  </div>


 
  <a class="prev" id="us" >&#10094;</a>
  <a class="next" id="we" >&#10095;</a>



    
   <div class="just" >
   <h1>Car Specifications : </h1>
  <div class="feautures-info">
  
    <div class="feature-div">
      <b><h5 class="doors-no" style="margin-top:10px;margin-left:10px;color:blue;font-size:20px;">6 Seats </h5></b>
      <img  style="margin-left:30px;" src="https://img.icons8.com/fluency/48/000000/car-door.png"/>
  </div><!-- end feature-div-->

 
  <div class="feature-div">
      <b><h5 class="seats-no" style="margin-top:10px;margin-left:20px;color:blue;font-size:20px;">6 Seats </h5></b>
  <img  style="margin-left:60px;" src="https://img.icons8.com/emoji/48/000000/seat.png"/>
  </div><!-- end feature-div-->

  
  
 


  <div class="feature-div">
      <b><h5 class="no" style="margin-top:10px;margin-left:10px;color:blue;font-size:20px;">Automatic </h5></b>
  <img  style="margin-left:10px;" src="assets/images/project images/automatic.png" width="60px"  height="40px" />
  </div><!-- end feature-div-->

  <div class="feature-div">
      <b><h5 class="no" style="margin-top:2px;margin-left:20px;color:blue;font-size:20px;">Air Conditioner </h5></b>
  <img  style="margin-left:10px;" src="https://img.icons8.com/external-itim2101-lineal-color-itim2101/64/000000/external-air-conditioner-household-equipment-itim2101-lineal-color-itim2101.png"/>
  </div><!-- end feature-div-->

  <div class="feature-div" id="gps" style="display:none">
      <b><h5  style="margin-top:10px;margin-left:20px;color:blue;font-size:20px;">GPS  </h5></b>
      <img style="margin-left:110px;margin-top:-50px" src="https://img.icons8.com/external-konkapp-outline-color-konkapp/64/000000/external-gps-electronic-devices-konkapp-outline-color-konkapp.png"/>
  </div><!-- end feature-div-->


  </div><!-- end feautures-info div-->
  </div><!-- end just-->
  </div><!--end images-->
 
    <hr>
  <div class="description-info" style="margin-top:10px;">

  </div>
  <button class="btn-grad">Book Now </button>
  
</div><!-- end car-info-->


    <!-- Footer Start -->
    <div class="container-fluid  py-5 px-sm-3 px-md-5" id="footer" style="position:relative;margin-top: 150px;background-color:#0070ff">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Jordan University , Jordan </p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+06 5355 000</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>the-garage@company.co</p>

            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-white mb-4"> Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="signin.php"><i class="fa fa-angle-right text-white mr-2"></i> Sign In </a>
                   
                    <a class="text-white mb-2" href="register.php"><i class="fa fa-angle-right text-white mr-2"></i> New Member Registration</a>
                    <a class="text-white mb-2" href="contact.php"><i class="fa fa-angle-right text-white mr-2"></i> Contact Us  </a>
                    <a class="text-white mb-2" href="https://ar.nissan.com.jo/"><i class="fa fa-angle-right text-white mr-2"></i>   Nissan</a>
                    <a class="text-white" href="https://www.toyota.com/"><i class="fa fa-angle-right text-white mr-2"></i> TOYOTA</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
                <div class="row mx-n1">
                    <div class="col-4 px-1 mb-2">
                        <img class="w-100" src="img/gallery-1.jpg" alt="">
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <img class="w-100" src="img/gallery-2.jpg" alt="">
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <img class="w-100" src="img/gallery-3.jpg" alt="">
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <img class="w-100" src="img/gallery-4.jpg" alt="">
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <img class="w-100" src="img/gallery-5.jpg" alt="">
                    </div>
                    <div class="col-4 px-1 mb-2">
                        <img class="w-100" src="img/gallery-6.jpg" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid bg-light py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">THE GARAGE </a>. All Rights Reserved.</p>
     
    </div>
    <!-- Footer End -->

    