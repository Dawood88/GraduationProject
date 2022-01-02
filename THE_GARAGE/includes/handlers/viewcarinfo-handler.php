<?php
/*connect to the db */
$conn=mysqli_connect("localhost","root","","the garage",3307);
if(isset($_POST['car_id']))
{
  $carid=$_POST['car_id'];
  print($carid);
  $searchQuery=mysqli_query($conn,"SELECT * FROM cars
  WHERE car_id ='$carid'");
  $Queryresults = mysqli_fetch_all($searchQuery, MYSQLI_ASSOC);
  //print_r($Queryresults);


  //echo "SELECT photo_src FROM cars_photos WHERE car_id='$carid' AND photo_order!=1";
  $getimgQuery=mysqli_query($conn,"SELECT photo_src FROM cars_photos WHERE car_id='$carid' AND photo_order!=1
  ORDER BY photo_order");
  $Queryresults2 = mysqli_fetch_all($getimgQuery, MYSQLI_ASSOC);
  //print_r($Queryresults2[1]["photo_src"]);

  $resultArray=array_merge($Queryresults,$Queryresults2);

  echo $resultArray[0]["car_id"]."\n".
  $resultArray[0]["car_type"]."\n".
  $resultArray[0]["brand"]."\n".
  $resultArray[0]["doors_no"]."\n".
  $resultArray[0]["seats_no"]."\n".
  $resultArray[0]["car_model"]."\n ".
  $resultArray[0]["price_per_day"]."\n".
  $resultArray[0]["GPS"]."\n";

  echo $Queryresults2[0]["photo_src"]."\n".
  $Queryresults2[1]["photo_src"]."\n".
  $Queryresults2[2]["photo_src"]."\n".
  $Queryresults2[3]["photo_src"]."\n".
  $Queryresults2[4]["photo_src"]."\n".
  $resultArray[0]["car_link"]."\n";


  echo $resultArray[0]["car_description"];




}

?>
