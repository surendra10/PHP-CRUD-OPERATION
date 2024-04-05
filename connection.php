<?php
  
  $servername = "localhost";
  $username   = "root";
  $password   =  "";
  $dbname     = "crud_form";

  $conn =  mysqli_connect($servername,$username,$password,$dbname);

  if($conn){
   // echo "Connection Successfully";
  }else{
    echo "Connection Failed".mysqli_connect_error();
  }


?>