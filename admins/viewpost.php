<?php
session_start();
// session start
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:../studentlogin.php");
  exit;
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .post {
                margin: 9%;
                margin-left: 27%;
                margin-right: 23%;
                text-align: center;
                padding: 4%;
                border: solid;
                border-radius: 43px;
                font-size: 21px;
            }
        </style>
    </head>
    <body>
        <?php 
            require "nav.php";
            $title = $_GET['title']; 
            require "../dbconnect.php";
        
            $sql = "select * from `buyers` where title='$title'";
            $result = mysqli_query($conn,$sql) or die(mysqli_error($sql));
            $data = mysqli_fetch_array($result);
    
            echo
            '<div class="post">
                <div class="head">
                    <b> <h1>'.$data['title'].'</h1></b>
                </div>
                <div class="location">
                    '.$data['location'].'
                    <br>'.$data['date'].'
                </div>
                <br>
                <div class="middle">
                    <b>Requirement :</b>   <br>'.$data['requirement'].' <br>
                    <b>Industry Requirement :</b>  <br>'.$data['industryrequirement'].'<br>
                    <b>Connect Professional :</b>   <br>'.$data['connectprofessional'].'<br>
                </div>
                <br>
                <a href="dashboard.php"><button type="button" class="btn btn-primary"><----back</button></a>
            </div>';
        ?>
       <div class="footer" style="position:center;">
           <center> <h2> <strong style="color: red;"> < </strong> <strong style="color: blue;"> > </strong> </h2> </center>  
            <center><h3><strong>GDSC MCET</strong></h3></center>
        </div>
    </body>
</html>