<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: ../buyerslogin.php");
  exit;
};
// get method to take value from url
$id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Response info </title>
        <style>
            .middle h2,h3, h4,h5,h6{
                padding-bottom:10px;
            }
            .title{
                margin:1%;
                padding:1%;
            }
            .post {
                text-align: center;
                margin: 4%;
                margin-top: 1%;
                padding: 10%;
                padding-top: 1%;
                padding-right: 20%;
                padding-left: 19%;
            }
            .head img {
                height: 130px;
                width: 121px;
                margin: 5%;
                margin-left: 32%;
            }   
            .head{
                display: flex;
                flex-direction: row;
            }
            .head2{
                padding: 7%;
            }
        </style>
    </head>
    <body>
        <?php require "nav.php";?>
        <div class="title"><center><h2>profile</h2></center></div> 
            <hr>
            <?php
                $table =$_SESSION['username'].'buyer';
                require "../dbconnect.php";
                $sql = "select * from `$table` where id='$id'";
                $result = mysqli_query($conn,$sql)  or die(mysqli_error($conn));
                $data = mysqli_fetch_array($result);
                echo
                    '<div class="post">
                        <div class="head">
                            <img src="../img/img4.png" alt="image">
                            <div class="head2">
                                <h4>'.$data['buyers'].'</h4>
                                <h5>'.$data['dates'].'</h5>
                            </div>
                        </div>
                        <div class="middle">
                            <h4>Title : '.$data['title'].'</h4>
                            <h5>location : '.$data['locations'].'</h5>
                            <h5>Requirements <br>
                            '.$data['morerequirement'].'</h5>
                            <h4>Budget : '.$data['budget'].'</h4> 
                            <h5>message <br>'.$data['messages'].' </h5>
                        </div>
                        <a href="response.php"><div class="btn btn-primary"><---Back</div></a>
                    </div>';
            ?>
           <div class="footer" style="position:center;">
           <center> <h2> <strong style="color: red;"> < </strong> <strong style="color: blue;"> > </strong> </h2> </center>  
            <center><h3><strong>GDSC MCET</strong></h3></center>
        </div>

    </body>
</html>