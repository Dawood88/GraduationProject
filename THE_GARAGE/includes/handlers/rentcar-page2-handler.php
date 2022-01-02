<?php 

if(isset($_POST["fillpersonalinfo"]))
{
  print_r($_POST);

  $phonenumber=$_POST["pn"];

  if (!preg_match('/^07[789][0-9]{7}$/',$phonenumber)) {
    echo "<script>
  $( document ).ready(function() {
    $('#phone-text').css('display', 'block')  });</script>";
  } else {
    $url="rentcar-page3.php?carid=".$_POST["carid"]."&officeno=".$_POST["officeid"]."&pickupdate=".$_POST["pickupdate"]."&dropoffdate=".$_POST["dropoffdate"]."&username=".$_POST["fullname"]."&useremail=".$_POST["fullemail"]."&phonenumber=".$_POST["pn"]."&address=".
    $_POST["address"];
    echo ("<script>location.href='$url'</script>");
  } 
}


?>