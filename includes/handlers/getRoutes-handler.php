<?php

include( __DIR__ . "/../classes/Account.php");

if(isset($_POST['getRoutes'])) {
  $email = $_SESSION['userLoggedIn'];
  $account = new Account($con);

  $data = $account->getRoutes($email);

  echo json_encode($data);

  die();
}
 ?>
