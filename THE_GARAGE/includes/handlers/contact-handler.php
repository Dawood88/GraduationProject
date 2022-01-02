<?php 


if(isset($_POST["submitcontactform"]))
{
  $name = trim(stripslashes($_POST['Name']));
   $email = trim(stripslashes($_POST['Email']));
   $subject = trim(stripslashes($_POST['Subject']));
   $contact_message = trim(stripslashes($_POST['Message']));


   $makecontact=mysqli_query($conn,"INSERT INTO `customer_support`(`msg_id`, `name`, `email`, `subject`, `Message`) VALUES (null,'$name','$email','$subject','$contact_message')")or die(mysqli_error($conn));


   echo "<script>
   $(document).ready(function() {
    var divhtml = $('.login-main-wrapper').html()
    $('#wholediv').replaceWith(divhtml)
    });
   </script>";

}

?>