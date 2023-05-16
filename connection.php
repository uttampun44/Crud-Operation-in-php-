<?php

$host = "localhost";
$username = 'root';
$password = '';
$database = 'crud';

$connection = mysqli_connect($host, $username, $password, $database);

 if($connection){
      // echo "Connection Successfull";
  }else{
     echo "Connection not successfull";
  }

  error_reporting(E_ERROR | E_PARSE);
