<?php

include("../config.php");

if(isset($_POST['login'])){
  $email=$_POST['loginEmail'];
  $password=md5($_POST['loginPassword']);


  $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
  $query=mysqli_query($con, $sql);

  if(mysqli_num_rows($query) == 1){
    header("Location: ../../main.php");
  }else{
    echo("Login failed!");
  }
}


?>
