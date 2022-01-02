<?php
/* helps with the server connection */
ob_start();
//session_start();

$timezone=date_default_timezone_set('Asia/Amman');


/*connect to the db */
$conn=mysqli_connect("localhost","root","","the garage",3307);

/*check if there is any errors */
if(mysqli_connect_errno()){echo "failed to connect".mysqli_connect_errno();}



?>
