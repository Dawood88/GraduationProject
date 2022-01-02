
<?php 
//var_dump($_POST);
//var_dump($_FILES["image1"]);
if(isset($_POST['registerButton']) && isset($_FILES))
{
  //var_dump($_FILES);
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $gender=$_POST['radio'];

//validate password
$password=validate_password($_POST['psw'])==true?$_POST['psw']:false;

$password2=validate_reppsw($_POST['psw-repeat'],$_POST['psw']);
  
//encrypt password 
if($password2==true) $final_password=md5($_POST['psw']);




//check if email is already used
//echo "SELECT email from users where email='$email' "; 
$query=mysqli_query($conn,"SELECT email from users where email='$email' ");

if(mysqli_num_rows($query)>0) {
  echo "<script>
 $( document ).ready(function() {
 $('.email-msg').text('Email Already in use ').css('color', 'red')  });</script>";
 $final_email="";
 
}

else $final_email=$_POST['email'];

if($_FILES["image1"]["name"]=="" ||  $_FILES["image1"]["name"]=="" )
echo "<script>
    $( document ).ready(function() {
    $('.upload-msg').css('color', 'red') })
    </script>";
       // sort the images
      else{

        //image 1
        $fileName = basename($_FILES["image1"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $image = $_FILES['image1']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        
        
        //image2 
        $fileName2 = basename($_FILES["image2"]["name"]); 
      $fileType2 = pathinfo($fileName2, PATHINFO_EXTENSION);
        $image2 = $_FILES['image2']['tmp_name'];
        $imgContent2 = addslashes(file_get_contents($image2));

      }
    

      //set gender 
      if(isset($_POST["radio"]))
      { 
        echo $_POST["radio"];
        if($_POST["radio"]=="male")
        echo "<script>
        $( document ).ready(function() {
          $('#male').attr('checked', 'true') })
        </script>";
        else
        echo "<script>
        $( document ).ready(function() {
          $('#female').attr('checked', 'true') })
        </script>";

      }


    

    //print all the inputs 

      //echo $firstname;
      //echo $lastname;
      //echo $final_email;
      //echo $final_password;
      //echo $address;
      //echo $imgContent;
      //echo $imgContent2;
      


    //insert into db

    
if($final_email!='' && isset($imgContent) && isset($imgContent2) )
{

  
//echo "INSERT INTO users (id,firstname,lastname,email,password,address,id_image1,id_imag2)values(null,'$firstname','$lastname','$final_email','$final_password','$address','$imgContent','$imgContent2' );";

$sql="INSERT INTO users (id,firstname,lastname,email,password,address,id_image1,id_image2,gender)values(null,'$firstname','$lastname','$final_email','$final_password','$address','$imgContent','$imgContent2', '$gender' );";
$conn->query($sql)or die(mysqli_error($conn));


//session the registration info 

$_SESSION['userLoggedIn']=$firstname." ".$lastname;
$_SESSION['userLoggedInEmail']=$final_email;
//echo $_SESSION["userLoggedIn"];
//load the successful registration  model 
echo "<script>
$( document ).ready(function() {
  $('#card').css('display','block');
  $('.form-container').css('background-color','transparent')
  $('.form-container').css('height','70%')
  $('.form-container').css('width','60%')
  jQuery('.register-form').replaceWith(jQuery('#card'));
})</script>";
}



//check if the query is successful 
  }
  
 


  


else {
  //echo "WOW ";
}


function validate_password($password)
{
  if(strlen($password)<8)
 { 
   echo "<script>
   
   $( document ).ready(function() {
    $('.password-msg').text('Password should contain Minimum eight characters').css('color', 'red')
  });</script>";
   return false;
}
else if (!preg_match('/((?![A-Za-z]{8}|[0-9]{8})[0-9A-Za-z]{8})/',$password))
{
 echo "<script>
 $( document ).ready(function() {
 $('.password-msg').text('Password should contain at least one letter and one number').css('color', 'darkblue')  });</script>";
 return false;
}
else 
{
  /*echo "<script>
  $( document ).ready(function() {
  $('.password-msg').text('Passsword is valid ').css('color', 'green')});</script>"*/;
  return true;
}
}


function validate_reppsw($repeated,$original)
{ 
  //echo $repeated;
  //echo $original;
  if($repeated!==$original)
  {  echo "<script>
    $( document ).ready(function() {
    $('.repeated-msg').text('Passwords doesnt match').css('color', 'red') })
    </script>";
  }
  else {
    echo "<script>
    $( document ).ready(function() {
      $('.repeated-msg').empty();
    })
    </script>";
    return true;
  }
}

?>