<?php

// if the login button is pressed do this 
if(isset($_POST['loginButton']))
{ 

  //print_r($_POST);
  //echo "WOW";
$username=$_POST['username'];
$password=$_POST['password'];

if($username=="" || $password=="")
echo "<script>
document.addEventListener('DOMContentLoaded', function(event) { 
  $('#msg').text('Please Fill the blank fields ') 
  $('#msg').css('display','block') 
}); </script>";
else{
  $loginQuery=mysqli_query($conn,"SELECT * FROM offices WHERE office_id='$username' and password='$password' ");

    if(mysqli_num_rows($loginQuery)!=0)
    {  
      $_SESSION["officeLoggedInId"]=$username;
      $url="office_orders2.php?office_id=".$username;
      echo "<script>window.location.href='$url'</script>";
    }
    else{
      echo "<script>
      document.addEventListener('DOMContentLoaded', function(event) { 
        $('#msg').text('Wrong id or password s ') 
        $('#msg').css('display','block') 
      }); </script>";
    }

}
}

?>



