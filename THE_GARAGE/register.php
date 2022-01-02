<?php 

include("navbar.php");
include("includes/config.php");
include("includes/handlers/register-handler.php");

function getinputvalue($name)
{
	if(isset($_POST[$name])) echo $_POST[$name];
}
?>

<style> 
<?php include("assets/css/register.css"); ?>
</style>


<?php 
if(isset($_SESSION['userLoggedIn']))
echo "<div class='loggedinwow' >logged in</div>";
else echo "HELLO WORLD";

?>

<div class="form-container">

<form action="register.php" method="POST" class="register-form"  autocomplete="false" 
enctype="multipart/form-data"  id="registerform">


<div class="full-container">
<div class="right-section">
<!-- first name-->
<div class="firstandlastname">
<label for="firstname" style="color:darkblue;font-size:20px"> <b>First Name</b></label>
<input type="text" name="firstname" id="firstname" class="firstname" placeholder="ex.. Homer" required
value="<?php getinputvalue("firstname");?>">

<!--last name-->
<label for="lastname" style="margin-left:10px;color:darkblue;font-size:20px">Last Name</label>
<input type="text" name="lastname" id="lastname" class="lastname"  placeholder="ex.. Simpson"   required 
value="<?php getinputvalue("lastname");?>">
</div> <!-- end firstandlastname--> 


<!-- Email --> 
<div class="email-div" >
<label for="email"> <b> Email </b></label>
<input type="email" class="email" required placeholder="Enter Your Email " name="email"
autocomplete="chrome-off" id="email"
value="<?php getinputvalue("email");?>">
<h5 class="email-msg"> 
  


</h5>
</div><!-- end class email -->

<!--Password-->
<div class="password-div">
<label for="psw"><b>Password</b></label>
 <input type="password" placeholder="Enter Password" name="psw" id="psw" required class="password" 
 value="<?php getinputvalue("psw");?>">
 <h5 class="password-msg">  </h5>
 </div><!-- end class password -->

 <!-- repeat Password-->
 <div class="repeat-password-div">
<label for="psw-repeat"><b>Repeat Password</b></label>
<input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required 
value="<?php getinputvalue("psw-repeat");?>">
<h3 class="repeated-msg"></h3>
</div><!-- end repeat-password-->


<!-- Gender -->
<div class="gender">
<label for="gender"> **  Select your Gender </label>
<!-- MALE -->
<input type='radio' id='male'  name='radio' value="male"
checked="checked">

<label for='male'>Male</label>

<!-- Female -->
<input type='radio' id='female' name='radio' value="female"
>

 <label for='female'>Female</label>
 </div><!-- end class gender-->


 <!-- phone number-->
 <div style="display:none" class="phoneno">
 <label> Enter your phone number </label>
 <button class="phone-no" >
  <img src="assets/images/project images/jordan-icon.png" alt="">
  <h3> +962 </h3>
  </button>
  <input type="tel" pattern="[07][0-9]{8}">
 
  </div>

  </div><!-- end right-section-->

  <div class="left-section">


  <!--Address-->
  <div style="display:block">
    <label for="address" style="color:darkblue;font-size:20px"><b> Address : </b> </label>
    <br>
    <textarea name="address" id="address"  rows="3"  style="box-sizing:border-box;width:100%" required><?php getinputvalue("address");?></textarea>
    
  </div>


  <!-- ID photos -->
  <div class="element" style="margin-top:10px">
    <h2 style="color:darkblue;font-size:25px;" class="upload-msg"><b> Please Upload a Screenshot Of your  Licence  ID </b> </h2>
   
   



    <div class="element-images">

    <!-- first part of id-->
    <img  style="border:1px solid black ;" width="100%" height="150px" id="output" />
   
    

    <!-- second part of id -->
    <img style="border:1px solid black ;" width="100%" height="150px" id="output2"/>

    <!-- Upload Button 1 -->
    <div class="upload-image1" style="display:flex">
    <button class="upload-img1"> <i class="fa fa-upload" aria-hidden="true"></i>
      Choose  Photo </button>
      <h5 class="ui1" style="margin-right:10px"></h5>
    <input id="img_src1" type="file" name="image1" accept="image/*"
    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0]);  "
     style="display:none" >
    </div><!-- end Upload Button 1-->

    
<!-- Upload Button 2 -->
  <div class="upload-image2" style="display:flex">
    <button class="upload-img2"> <i class="fa fa-upload" aria-hidden="true"></i>
      Choose  Photo </button>
      <h5 class="ui2"></h5>
    <input id="img_src2" type="file" name="image2" accept="image/*"
    onchange="document.getElementById('output2').src = window.URL.createObjectURL(this.files[0])" style="display:none"  >
    </div><!-- end upload Button2-->


    </div><!-- end element images-->

    </div><!--end element div-->
  </div><!-- end left section-->
  </div><!-- end full container-->

  <input type="submit" style="display:block;" name="registerButton" class="submitbutton">
  
</form><!-- end register form -->


<!--
  <button class="submitbutton"> Register Now </button>
-->

<div id='card' class="animated fadeIn" style="display:none;width:100%;font-size:1.7rem;font-weight:bolder;height:80vh;margin-top:-10px">
      <div id='upper-side'>
        
          <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
          <svg version="1.1" id="checkmark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" xml:space="preserve">
            <path d="M131.583,92.152l-0.026-0.041c-0.713-1.118-2.197-1.447-3.316-0.734l-31.782,20.257l-4.74-12.65
    	c-0.483-1.29-1.882-1.958-3.124-1.493l-0.045,0.017c-1.242,0.465-1.857,1.888-1.374,3.178l5.763,15.382
    	c0.131,0.351,0.334,0.65,0.579,0.898c0.028,0.029,0.06,0.052,0.089,0.08c0.08,0.073,0.159,0.147,0.246,0.209
    	c0.071,0.051,0.147,0.091,0.222,0.133c0.058,0.033,0.115,0.069,0.175,0.097c0.081,0.037,0.165,0.063,0.249,0.091
    	c0.065,0.022,0.128,0.047,0.195,0.063c0.079,0.019,0.159,0.026,0.239,0.037c0.074,0.01,0.147,0.024,0.221,0.027
    	c0.097,0.004,0.194-0.006,0.292-0.014c0.055-0.005,0.109-0.003,0.163-0.012c0.323-0.048,0.641-0.16,0.933-0.346l34.305-21.865
    	C131.967,94.755,132.296,93.271,131.583,92.152z" />
            <circle fill="none" stroke="#ffffff" stroke-width="5" stroke-miterlimit="10" cx="109.486" cy="104.353" r="32.53" />
          </svg>
          <h3 id='status' style="font-size:2rem">
          Success
        </h3>
      </div>
      <div id='lower-side'>
        <p id='message' style="font-size:1.4rem">
          <b>Congratulations, your account has been successfully created.</b>
        </p>
        <a href="search.php?allcars=yes" id="contBtn">Continue</a>
      </div>
    </div>
</div><!-- end form-container-->


<script src="assets/js/register.js"></script>