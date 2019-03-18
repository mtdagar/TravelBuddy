<?php

if(isset($_POST['storeRoute']) && isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn']) {
  $email = $_SESSION['userLoggedIn'];

  if(!isset($_POST['sloc']) || empty($_POST['sloc'])) {
    echo "Starting location is required";
  }
  else if(!isset($_POST['endloc']) || empty($_POST['endloc'])) {
    echo "Ending location is required";
  }

  if($account->registerLocation($_POST['sloc'], $_POST['endloc'], $_POST['routes'], $email)) {
    echo true;
  }
  else {
    echo false;
  }

  die();
}
 ?>
