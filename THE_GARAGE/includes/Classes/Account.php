<?php

class Account{
  private $errorArray;
  private $conn;




  public function __construct($con)
  { 
    //we are passing the $conn var which is the db declaration and we give its value to $con which is aprivate value in this class
    $this->conn=$con;
    $this->errorArray=array();
  }
  
  public function login($un, $pw)
  { 
    //echo "SELECT * FROM USERS WHERE username='$un' and password='$pw2' ";
    //echo $un;
    //echo $pw;
    $loginQuery=mysqli_query($this->conn,"SELECT firstname,lastname FROM USERS WHERE email='$un' and password='$pw' ");

    if(mysqli_num_rows($loginQuery)!=0)
    { 
      $results = mysqli_fetch_all($loginQuery, MYSQLI_ASSOC);
      return  $results[0]["firstname"]." ".$results[0]["lastname"];
      
    }
    else{
      array_push($this->errorArray,Constants::$loginFailed);
      return false;}

  
}

 //if the error exists we return a span with an error in it 
 public function getErrors($error)
 { 
   
    if(!in_array($error,$this->errorArray))
    {
      $error="";
    }
    
    return "<span  class='errorMessage'  >$error </span>";
 }
}
?> 