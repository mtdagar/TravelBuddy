 <?php
require_once("conn.php");

if(isset($_POST['submit'])){
$fname=$_POST['fname'];
$lname =$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);


if($fname=="" || $lname=="" || $email=="" || $password==""){
  $_SESSION[error][msg] = "ALL FIELDS ARE REQUIRED";
    header("Location:register.php");
  }
  else{
    $sql=$conn->prepare("INSERT INTO users(fname, lname, email, password) VALUES (:fname, :lname, :email, :password)");
    $sql->bindParam('fname', $fname);
    $sql->bindParam('lname', $lname);
    $sql->bindParam('email', $email);
    $sql->bindParam('password', $hash);
    $sql->execute();
    header("Location:index.php");
  }
}
?>
