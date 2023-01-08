<?php
// session start from here
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: ../studentlogin.php");
  exit;
};

$date = date('d-m-Y');
$name = $_GET['name'];
$u = $_SESSION['username'];
$tablename = $_SESSION['username'].'buyerconnect';

require "../dbconnect.php";
$sql = "select * from `studentsignup` where username='$name'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$data = mysqli_fetch_array($result);

$user =$data['username'];
$email =$data['email'];
$phoneno =$data['phoneno'];


$table = $u.'buyer';
$sql1 = "select * from `internship`.`$table` where buyers='$name'";
$result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
$record = mysqli_fetch_array($result1);
$title = $record['title'];


$sql = "select * from `$tablename` where student='$user' and title='$title'";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$num  = mysqli_num_rows($result);
if($num == 0){
  $sql1 = "INSERT INTO `$tablename` VALUES('$user','$date',1,'$email','$phoneno','$title')";
  $result = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
  header("location:congo.php");
}
else{
  header("location:response.php");
}

?>