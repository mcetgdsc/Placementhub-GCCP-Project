<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
};
// to get variable name of title to session variable
$_SESSION['title'] = $_GET['name'];
header("location:view.php");
?>

