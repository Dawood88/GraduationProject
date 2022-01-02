<?php  include("navbar.php");
include("includes/config.php");

include("includes/Classes/Constants.php");
include("includes/Classes/Account.php");



$account =new Account($conn);

include("includes/handlers/login-handler.php");


// when refresh the pages the inputs dont disappear
function getinputvalue($name)
{
	if(isset($_POST[$name])) echo $_POST[$name];
}
?>


<?php
/*remeber to remove the 2*/
if(isset($_SESSION['userLoggedIn']))
echo "<div class='loggedinwow' >logged in</div>";
else echo "HELLO WORLD";

?>

<link rel="stylesheet" href="assets/css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</link>



    <!-- The Sign In Process
    1_ we link the login handler
    2_ when we click on the login button the login-handler.php will start to work ( it will get the input feilds values) and send them to login fucntion in Account.php
    login function in Account.php will make  check if the username and password are in the db by sql query if they exists the user will be directed to home page , if not it will show the errors .
    NOTE: Contants class and getErrors function in Account.php for showing errors (if found )

    -->

    <script>
var div=document.querySelector(".loggedinwow");
if(div!=null)
window.location.href="index.php";
	</script>?

  <br><br>



	<!-- <div class="signin-full"> -->

		<form class="login" id="loginForm" action="signin.php" method="POST">
			<br>
			<h2>Login to your account</h2>
			<p>


				<label for="loginUsername" class="loginlabel ">Email </label>

				<input id="loginUsername" name="loginEmail" type="email" placeholder="shimatta" autofocus required
	    		value="<?php getinputvalue("loginEmail");?>">
        		<i class="fa fa-user"></i>

			</p>
			<p>
				<label for="loginPassword" class="loginlabel">Password</label>
				<input id="loginPassword" name="loginPassword" type="password" class="passwordlogin" required placeholder="Your Password " style=" border-radius: 30px;"
				value="<?php getinputvalue("loginPassword");?>">
    		<i class="fa fa-key"></i>

			</p>
			<?php echo $account->getErrors(Constants::$loginFailed);
			?>

			<div class="hasAccountText">
				<a>
					<h4> Don't have an account yet ? Sign up here </h4>
				</a>
			</div>


			<button type="submit" name="loginButton" class="loginButton">LOG IN</button>

			<a href="office-login.php">
       		<h4 style="font-size: 1.5rem;margin-left:30px;
    		color: #2196f3;cursor:pointer;margin-top:40px;text-decoration:underline;
    		">  ** Log In As An Office  </h4>
			</a>	
		</form>

		


	<!-- </div>end singin-full -->

  </div>
