<?php
session_start();
// session start
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: login.php");
    exit;
};
$showalert = false;
$showerror = false;
$date1 = date("d-m-Y");
if($_SERVER['REQUEST_METHOD']=="POST"){
    require "../dbconnect.php";
  try {
    // $conn = new PDO("mysql:host=34.100.218.188;dbname=internship", "username", "password");
    $conn = new PDO($dsn, $user, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $title = $_POST['title'];
    $comment = $_POST['comment'];
    $industry = $_POST['industry'];
    $professional = $_POST['professional'];
    $location = $_POST['location'];
    $name= $_SESSION['username'];
    if($title != "" && $comment != "" && $industry != "" && $professional != "" && $location != "") {
      $stmt = $conn->prepare("INSERT INTO admins VALUES (null, :title, :comment, :industry, :professional, :location, :date1, :name, 1)");
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':comment', $comment);
      $stmt->bindParam(':industry', $industry);
      $stmt->bindParam(':professional', $professional);
      $stmt->bindParam(':location', $location);
      $stmt->bindParam(':date1', $date1);
      $stmt->bindParam(':name', $name);
      $stmt->execute();
      $showalert = true;
    }
    else {
      $showerror = true;
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta aria-current="date"  charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="admin.css" rel="stylesheet">
    <title>Admin page</title>
</head>
    
<body onload="swal">
  <?php
      if($showalert){
        echo '<script>
                swal("Good job!", "Your requirement are now posted", "success");
            </script>';
      }
  ?>
  <?php
      if($showerror){
        echo '<b><script>
           swal("OOPS!", "please fill all the information.", "warning");
              </script></b>';
      }
  ?> 
  
  <?php include "nav.php";  ?> 
<style>
body{color: #000;overflow-x: hidden;height: 100%;
background-image: url(her.jpeg);background-repeat: no-repeat;background-size: cover}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 10px 12px 0 rgb(117 108 108)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color:#fff  !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style> 
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
        <form action="post_requirement_form.php" method="post">
            <h3 style="color:#fff;"><strong> Placement Form </strong> </h3>
            <div class="card">
                <form class="form-card" onsubmit="event.preventDefault()">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Title<span class="text-danger"> *</span></label> <input name ="title" type="varchar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Industry Tag<span class="text-danger"> *</span></label><input name="industry" type="varchar" class="form-control" id="exampleInputPassword1"></div>
                    </div>
                     <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3"> Enter The Requirements<span class="text-danger"> *</span></label> <input type="varchar" id="exampleInputPassword1" name="comment" placeholder="" onblur="validate(6)"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3"> How do you like to connect with Professionals?<span class="text-danger"> *</span></label><input name="professional" type="varchar" class="form-control" id="exampleInputPassword1"></div>
                    </div>

                    <div class="row justify-content-between text-left">
                    <center>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Locations<span class="text-danger"> *</span></label><input name="location" type="varchar" class="form-control" id="exampleInputPassword1"></div>
                        </center>
                    </div>
                    
                    <div class="row justify-content-end">
                    <center>
                        <div <center><button id="submit" type="submit" class="btn btn-warning">Post Placement Now</button></center> </div>
                    </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
                <div >
                 <center><img src="download.png" alt="GDSC-MCET " width=" 250 "> </center>
                </div>
</div>

</body>
</html>