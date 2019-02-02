<?php

function login($em, $pw){
  $email = $em;
  $password = md5($pw);
  
  $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
  $query=mysqli_query($con, $sql);

  if(mysqli_num_rows($query) == 1){
    $_SESSION['userLoggedIn'] = $email;
    return true;
    //header("Location: main.php");
  }else{
    $loginError = Constants::$loginFailed;
    return false;
    //echo "<script type='text/javascript'>alert('$loginError');</script>";
  }

}
?>