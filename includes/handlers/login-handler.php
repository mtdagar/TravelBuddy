<?php
require_once("includes/config.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

if(isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];

  $sql="SELECT * FROM users WHERE email='$email'";
  $query=mysqli_query($con, $sql);

  if(mysqli_num_rows($query)>0){

      while($row=mysqli_fetch_array($query)){
          if(password_verify($password, $row['password'])){
            $_SESSION['email'] = $email;
            header("Location:main.php");
          }
          else{
            header("Location:login.php");
          }
      }
  }
}
?>
