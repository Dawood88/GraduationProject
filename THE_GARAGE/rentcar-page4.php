<?php

include("navbar.php");
include("includes/config.php");




if(isset($_GET["finished"]))
{ 
  echo "";
}
else{
  //echo "<script>window.location.href='rentcar-page3.php'</script>";
}
?>

<style>

  <?php include("assets/css/rentcar-page4.css"); ?>
  
</style>


<div class="wrapperAlert">

  <div class="contentAlert">

    <div class="topHalf">

      <p><svg viewBox="0 0 512 512" width="100" title="check-circle">
        <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" />
        </svg></p>
      <h1>Congratulations</h1>

     <ul class="bg-bubbles">
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
       <li class="li"></li>
     </ul>
    </div>

    <div class="bottomHalf" style="background-color:#fff">

      <em><h3 style="color:black;margin-top:20px;font-family:Arial;">Well Done!, You  have Completed The Renting Process Successfully, We will Conract You Soon  </h3></em>

      <button id="alertMO" style="margin-top:20px">You Will be directed to Home Page after <span class="time"> 5 </span> Seconds</button>

    </div>

  </div>        

</div>

<script src="assets/js/rentcar-page4.js"></script>