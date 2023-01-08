<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="post.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <title>Requirement post</title>
    
    </head>
    <body >
        <?php require "nav.php" ; ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Student Login</title>
    <style>
      body{
        overflow-x: hidden;
      }
      h1{
        overflow: hidden;
      }
.bod{
background-image: url(heer.jpeg); 
background-repeat: no-repeat; 
background-size: cover;
background-color: grey;
color: aliceblue;

}
    </style>
</head>
<body class="bod">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<!----MAIN-->

<h1 class="display-5 text-primary-emphasis" style="position: relative; left: 28rem;" > <strong> <b>About our Placement Cell <b\></strong> </h1>
<p class="fs-5 px-5 mx-5">
   <b> MCET has a dedicated Training & Placement Cell with committed Team Members who will make positive and profond impact on the way education is imparted in the country.
    <br>
    The goal of the  T & P cell is to develop  students into integrated personalities with a blend of academics and to showcase their talent and  skills
   </b></p><hr>
<h2 class="display-5 text-primary-emphasis" style="text-align: center;"><strong> Ongoing Placements </strong> </h2>
</body>
</html>
        
        <div class="post"
data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
            <?php  
            require "../dbconnect.php";
            $sql = "select * from `admins` where status=1";
            $result= mysqli_query($conn ,$sql) or die(mysqli_error($sql));
            while($data = mysqli_fetch_array($result)){
                $n = $data['buyername'];
                echo'  <div class="box"
data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
                        <div class="head"
data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500"><h3>'.$data['title'].'</h3></div>
                        <div class="content">
                            <div class="location">location :'.$data['location'].'</div>
                            <div class="view">
                                <a  href="getoutput.php?name='.$data['title'].'">
                              <button  class="btn text-light">
                                <b>View </b> </button></a>
                            </div>
                        </div>
                    </div>
                    ';
            }
            ?>
        </div>
<div >
<center><img src="download.png" alt="GDSC-MCET" width=" 250 "> </center>
            </div>

    </body>
</html>
