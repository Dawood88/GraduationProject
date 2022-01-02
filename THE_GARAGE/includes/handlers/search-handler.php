<?php
//print_r( $_POST);
if(isset($_POST['searchButton']))
{
  //echo "YES";
  print_r($_POST);
  $carmodel=$_POST["carname"];
  $car_type=$_POST["cars"];
  $pickupdate=$_POST["pickupdate"];
  $url="search.php?carmodel=".$carmodel."&cartype=".$car_type."&pickupdate=".$pickupdate;
  //header('Location: ../../search.php?carmodel='.$carmodel.'&cartype='.$car_type.'&pickupdate='.$pickupdate);
  echo("<script>location.href = '$url' </script>");
}
else{
  //echo "NO";
}
?>
