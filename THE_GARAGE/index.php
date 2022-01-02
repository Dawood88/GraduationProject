<?php  include("navbar.php");
include("includes/handlers/search-handler.php");
//print_r($_SESSION);
include("includes/config.php");


$rent1searchQuery=mysqli_query($conn,"SELECT   * FROM cars
  WHERE booking_status !='booked'ORDER BY RAND() LIMIT 3 ");
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
   //print_r($images);
?>
<style>

  <?php include("assets/css/index.css"); ?>
  
</style>
<div class="signout"> Sign Out </div>

<div class="full-container">

<div class="search-container" style=" /* The image used */
    background-image: url('assets/images/project images/index-background.jpg');
  
    height: 100%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

    <form action="index.php" method="POST" class="search-box">
  <h1 style="color:darkblack;margin-left:20px;">Search for The Best Rental Cars   in Jordan </h1>
    <div class="car-name" >
    <label> CAR MODEL  </label>
  <input type="text" name="carname" id="" required>
  </div><!-- end car name-->

  <div class="car-type">
  <label for="cars">CAR TYPE :</label>

<select name="cars" id="types">
  <option value="Sedan">Sedan</option>
  <option value="SUV">SUV</option>
  <option value="Hybrid">Hybrid</option>
  <option value="Hatchback">Hatchback</option>
  <option value="Micro">Micro</option>
</select>


  </div><!--end car type-->



  <div class="pickup-date">
  <label> PickUp Date : </label>
  <input type="date" class="pickupdate" name="pickupdate" required>
  </div><!--end pickupdate-->


  <input type="submit" name="searchButton" value="Search " class="search" >

  

    </form><!-- end search-box-->


</div><!-- end search container-->

</div><!-- end full container-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">01</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Welcome To <span class="text-primary">THE GARAGE </span></h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <img class="w-75 mb-4" src="img/about.png" alt="">
                    <p> THE GARAGE  is a company that rents automobiles for short periods of time to the public, generally ranging from a few days to a few weeks.

The Garage  primarily serve people who require a temporary vehicle, for example, those who do not own their own car, travelers who are out of town, or owners of damaged or destroyed vehicles who are awaiting repair or insurance compensation. 

Alongside the basic rental of a vehicle, THE GARAGE  typically also offer extra products such as insurance, global positioning system (GPS) navigation systems, entertainment systems, mobile phones, portable WiFi and child safety seats. </p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-headset text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">24/7 Car Rental Support</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-secondary p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-car text-secondary"></i>
                        </div>
                        <h4 class="text-light text-uppercase m-0">Car Reservation Anytime</h4>
                    </div>
                </div>
                <div class="col-lg-4 mb-2">
                    <div class="d-flex align-items-center bg-light p-4 mb-4" style="height: 150px;">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary ml-n4 mr-4" style="width: 100px; height: 100px;">
                            <i class="fa fa-2x fa-map-marker-alt text-secondary"></i>
                        </div>
                        <h4 class="text-uppercase m-0">Lots Of Pickup Locations</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">02</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Our Services</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-taxi text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">01</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Rental</h4>
                        <p class="m-0">Looking for car rentals in Jordan?Select from a range of car options and local specials.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item active d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-money-check-alt text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">02</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Delivery </h4>
                        <p class="m-0">Choose the car you want to rent and we will deliver that car to your pickuplocation .</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-car text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">03</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Technical Support</h4>
                        <p class="m-0">Feel Free to contact any of our offices if you have any question or in need of  any technical help
                           </p>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- Services End -->
    <!-- Rent A Car Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">03</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Best Deals </h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="<?php echo $images[0]?>" alt="">
                        <h4 class="text-uppercase mb-4"><?php echo $images[2]." ".$images[3]?></h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span>2016</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span>AUTO</span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span>25K</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" id="btn-rent1" href="<?php echo "rentcar-page1.php?carid=".$images[4];?>"
                        carprice=<?php echo $images[1]?>>$<?php echo $images[1]?>/Day</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item active mb-4">
                        <img class="img-fluid mb-4" src="<?php echo $images[5]?>" alt="">
                        <h4 class="text-uppercase mb-4"><?php echo $images[7]." ".$images[8]?></h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span>2019</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span>AUTO</span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span>30K</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" id="btn-rent2" href="<?php echo "rentcar-page1.php?carid=".$images[9];?>"
                        carprice=<?php echo $images[6]?>>$<?php echo $images[6]?>/Day</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="<?php echo $images[10]?>" alt="">
                        <h4 class="text-uppercase mb-4"><?php echo $images[12]." ".$images[13]?></h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span>2018</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span>AUTO</span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span>50K</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3"  id="btn-rent3" href="<?php echo "rentcar-page1.php?carid=".$images[14];?>"
                        carprice=<?php echo $images[11]?>>$<?php echo $images[11]?>/Day</a>
                    </div>
                </div>
              
              
               
            </div>
        </div>
    </div>
    <!-- Rent A Car End -->


       <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>Jordan University , Jordan </p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+06 5355 000</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>the-garage@company.co</p>

            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="signin.php"><i class="fa fa-angle-right text-white mr-2"></i>Sign In </a>
                   
                    <a class="text-body mb-2" href="register.php"><i class="fa fa-angle-right text-white mr-2"></i>New Member Registration</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Contact Us  </a>
                    <a class="text-body mb-2" href="https://ar.nissan.com.jo/"><i class="fa fa-angle-right text-white mr-2"></i>Nissan</a>
                    <a class="text-body" href="https://www.toyota.com/"><i class="fa fa-angle-right text-white mr-2"></i>TOYOTA</a>
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
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">THE GARAGE </a>. All Rights Reserved.</p>
     
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
<script>
</script>

<script src="assets/js/index.js"></script>