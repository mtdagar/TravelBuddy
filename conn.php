<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "travelbuddy";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }  catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
