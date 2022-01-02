<?php


include("includes/config.php");

include("includes/handlers/officelogin-handler.php");


?>
<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>

<style>

  <?php include("assets/css/office-login.css"); ?>
  
</style>
<title>Log In</title>



</head>

<body>



<div class="lg-container">
	<h1>Office Login </h1>
	<form action="office-login.php" id="lg-form" name="lg-form" method="post">

		<div>
			<label for="username">Office Id :</label>
			<input type="text" name="username" id="username" placeholder="Office Id "/>
		</div>

		<div>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" placeholder="password" />
		</div>


    <h1 style="color:red;display:none" id="msg" style="display:none"></h1>
		<div>
			<button type="submit" id="login" class="btn-grad" name="loginButton">Login</button>
		</div>

	</form>
	<div id="message"></div>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>