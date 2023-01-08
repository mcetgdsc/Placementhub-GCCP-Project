<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:../studentlogin.php");
  exit;
};
  require "../dbconnect.php";
  $title = $_GET['title'];
  $status = $_GET['status'];
  $table = $_SESSION['username'].'buyer';
  $q = "update `buyers` set status = '$status' where title = '$title'";
  $result = mysqli_query($conn,$q) or die(mysqli_error($conn));
  header("location:dashboard.php");
?>