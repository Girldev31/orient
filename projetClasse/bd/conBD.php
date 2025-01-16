<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbName = "siteecommerce";

try {
  $connexion = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
  // set the PDO error mode to exception
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  #echo "Connected successfully";
} catch(PDOException $e) {
  #echo "Connection failed: " . $e->getMessage();
  include 'pages/errorPage.php';
  die();
}
?>