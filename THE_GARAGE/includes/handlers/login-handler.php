<?php

// if the login button is pressed do this 
if(isset($_POST['loginButton']))
{ 

  //print_r($_POST);
  //echo "WOW";
$username=str_replace(" ","",strip_tags($_POST['loginEmail']));
$password=md5($_POST['loginPassword']);


//echo $username;
//echo $password;
$wasSuccessful= $account->login($username,$password);
//echo $wasSuccessful;
//meaning it has afirst and alast name 
if($wasSuccessful!=false)
	{	 


    echo "$('body').append('<div id='helloDiv'>$wasSuccessful </div>');";
		//echo $wasSuccessful;
    $_SESSION['userLoggedIn']=$wasSuccessful;
    $_SESSION['userLoggedInEmail']=$username;
   // echo $_SESSION['userLoggedIn'];
		//header('Location:index.php');

	}
}

else{
  echo "not set";
}

?>

<script src="assets/images/project images/logo.jpg"></script>


<script>
  
  function direct()
  {
    var div =document.querySelector('#helloDiv').innerHTML;
    var divwanted= document.querySelector('.login');
    div=div.toUpperCase();
      if(div!="")
    {
    divwanted.innerHTML="<img src='https://i.pinimg.com/originals/1f/ea/bd/1feabd539dae243aac37cfee3216a50b.gif'  width='100%' height'100%'> <h2 style='margin-top:70px; font-weight:bolder;font-size:2rem;'> Welcome  Back  <span style='text-decoration:underline;color:red'> " + div+"</span></h2>";
    setTimeout( function() { history.go(-2); }, 4000);
    }
    
  }



  document.addEventListener("DOMContentLoaded", direct);
</script>
