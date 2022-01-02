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
  
  

}
?> 