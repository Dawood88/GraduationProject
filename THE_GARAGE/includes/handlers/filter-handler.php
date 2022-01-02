<?php 
if(isset($_POST['filterButton']))
{
  //print_r( $_POST);
  if(!isset($_POST['type'])) {
    echo "<script>
  $('document').ready(function(){
  $('.error').css('display','block');
  });
  </script>";
  return ;
  }
  else{
  $carmodel=$_POST["carname"];
  
  $cartypes=urlencode(serialize($_POST["type"]));
  
  $price_range=$_POST["price-range"];
  //print_r( $cartype);
  
  $url="search.php?carmodel=".$carmodel."&filter_cartypes=".$cartypes."&price_range=".$price_range;
  echo("<script>location.href = '$url' </script>");

  }



}

else{
  //echo "NOT FOUND;";
}
?>


<?php
if(isset($_GET["carmodel"] ) && isset($_GET["filter_cartypes"] ) && isset($_GET["price_range"] ) )
{
  $carmodel=$_GET["carmodel"];
  //print_r($_GET["filter_cartypes"]);
  //if($_GET["filter_cartypes"]==null)array_push($_GET["filter_cartypes"],"Sidan");
  //print_r($_GET["filter_cartypes"]);
  $filtered_cartypes=unserialize(urldecode($_GET["filter_cartypes"]));
  $price_range=explode(",",$_GET["price_range"]);
  //print_r($price_range);
  $price_range_start=$price_range[0];
  $price_range_end=$price_range[1];
  
  //print_r($filtered_cartypes);

  //we will make 2 queries 
  //the first one for cars which have name nissan 
  $all_cars=array();
  $cars_by_name=array();
  $cars_by_types=array();

  //get all the cars by model 
  /*echo "SELECT * FROM cars
  WHERE brand LIKE '%$carmodel%'
     OR car_description LIKE '%$carmodel%' 
     OR car_model LIKE '%$carmodel%'
    ";*/
  $searchQuery=mysqli_query($conn,"SELECT * FROM cars
  WHERE brand LIKE '%$carmodel%' 
     OR car_model LIKE '%$carmodel%'
    ");
  if(mysqli_num_rows($searchQuery)!=0)
  { 
    $results = mysqli_fetch_all($searchQuery, MYSQLI_ASSOC);
    //print_r($results);
    array_push($cars_by_name,$results);
  }
  //print_r($cars_by_name);

  //print_r($cartype);
    //the seconds one if for each car that have atype included in the cartypes array   
  foreach($filtered_cartypes as $car){
  //echo $car;
    //check the cartype and the price 
    $searchQuery2=mysqli_query($conn,"SELECT * FROM cars
      WHERE car_type LIKE '%$car%'
      AND  price_per_day BETWEEN '$price_range_start' and '$price_range_end'");

  if(mysqli_num_rows($searchQuery2)!=0)
  { 
  $results2 = mysqli_fetch_all($searchQuery2, MYSQLI_ASSOC);
  //print_r($results);
  array_push($cars_by_types,$results2);
  }
  
  
}

//print_r($cars_by_name);
//print_r($cars_by_types);
$all_cars=array_merge($cars_by_name,$cars_by_types);
//print_r($all_cars);
$all_cars_nice= call_user_func_array('array_merge', $all_cars);
$all_cars_nice=array_unique($all_cars_nice, SORT_REGULAR);


//print_r($all_cars_nice);

//filter the cars by date 
$filtered_cars=array();
$date=strtotime(date("Y-m-d"));
//filter by date
foreach($all_cars_nice as $carone)
{   
  //print_r($carone);
  //exclude cars that are booked 
 $pickupcardate=  strtotime($carone["booking_period_start"]);
  $dropoffcardate= strtotime($carone["booking_period_end"]) ;
  
  if (($date >= $pickupcardate) && ($date <= $dropoffcardate)|| $carone["booking_status"]=="booked"){
    echo"";}
    else{
   array_push($filtered_cars,$carone);  }
}




}
?>
