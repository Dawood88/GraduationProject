<?php

include("navbar.php");
include("includes/config.php");


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
}
?>


<style>

  <?php include("assets/css/rentcar-page1.css"); ?>
  
</style>

  

<div class="full-container">
<h1> Confirm Renting Process For   </h1>
<div class="container">
   <img
    src="<?php echo $car_img_src33;?>"
    title=<?php echo $results["brand"]." ".$results["car_model"]?>
    alt="Pancake"
   />
   <div class="container__text">
    <a href="<?php echo $results["car_link"];?>"
    
    
    title="<?php echo $results["car_link"];?>"><?php echo $results["brand"]." ".$results["car_model"]?> </a>
    
    <p>
    <?php echo $results["car_description"];?>
    </p>
      <div class="div" style="display:grid;grid-template-columns:repeat(2,1fr)">
     

      <div class="price">
      <h2 style="color:darkblue">Price </h2>
      <h4 style="color:#ff5349"><?php echo $results["price_per_day"];?> $/day</h4>
      </div>
     
     <div class="office" >
      <h2 style="color:darkblue">Office </h2>
      <div style="display:flex;margin-top:20px">
      <img  id="office_img" src="<?php echo $officeresult2["office_src"]?>" alt="" >
      <h4 class="office_name" style="display:flex"><?php echo $officeresult2["office_name"]." For Renting Cars";?></h4>
      </div>
    
     </div>
    </div>
    <button class="btn" car-id=<?php echo $carid;?> 
    office-no=<?php echo $office_no;?>>Rent Now <i class="fa fa-arrow-right"></i></button>
   </div>
  </div>


</div><!-- end dates-container-->
</div>



<script src="assets/js/rentcar-page1.js"></script>
<link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
   integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
   crossorigin="anonymous"
  />
