<?php  include("navbar.php");
include("includes/config.php");
include("includes/handlers/contact-handler.php");
?>

<style>


  <?php include("assets/css/contact.css"); ?>
</style>



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
  



  


  

    <!-- Contact Start -->
    <div class="container-fluid py-5" id="wholediv">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Contact Us</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;" >
                        <form method="POST" action="contact.php">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Your Name" required="required"
                                    name="Name">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4" placeholder="Your Email" required="required"
                                    name="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" placeholder="Subject" required="required"
                                name="Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="5" placeholder="Message" required="required"
                                name="Message"></textarea>
                            </div>
                            <div>
                                <input class="btn btn-primary py-3 px-5" type="submit" name="submitcontactform" value="Send Message"></input>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;">
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Head Office</h5>
                                <p>Jordan University </p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Branch Office</h5>
                                <p>Amman , Gardens </p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-phone text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Supoort Center </h5>
                                <p>0 6 5355 000</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Customer Support</h5>
                                <p class="m-0">rgarage@company.co</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <section class="login-main-wrapper" style="display:none">
      <div class="main-container">
          <div class="login-process">
              <div class="login-main-container">
                  <div class="thankyou-wrapper">
                      <h1><img src="http://montco.happeningmag.com/wp-content/uploads/2014/11/thankyou.png" alt="thanks" /></h1>
                        <p>for contacting us, we will get in touch with you soon... </p>
                        <a href="index.php">Back to home</a>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </section>

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

    <script src="assets/js/contact.js"></script>
</body>

</html>