<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
};
?>
<?php require "nav.php";?>

<?php
    $date = date('d-m-Y');
    $showerror = false;
    $showalert = false;
    $title = $_SESSION['title'];
    $user = $_SESSION['username'];
    if($_SERVER['REQUEST_METHOD']=="POST"){
        require "../dbconnect.php";
        $category = $_POST['category'];
        $location1 = $_POST['location1'];
        $requirement = $_POST['requirement'];
        $budget = $_POST['budget'];
        $message = $_POST['message'];

        $sql1 = "select * from `admins` where title='$title'";
        $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        $data = mysqli_fetch_array($result1);
        $adminname = $data['adminname'];
       
        $sql3 = "select * from `".$adminname."admin` where title= '$title' and admins='$user'";
        $result3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
        $num = mysqli_num_rows($result3);
      if($num == 0){  
            $sql="insert into `".$adminname."admin` values(null,'$user','$date','$category',' $location1','$requirement'
            ,'$budget','$message','$title',1)";
            $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

            $sql2="insert into `".$_SESSION['username']."student` values('$adminname','$date','$title')";
            $result2= mysqli_query($conn,$sql2) or die(mysqli_error($conn));

            if(!$result){
                mysqli_error($result);
            }
            else{
                $showerror = true;
            }
        }else{
            $showalert = true;
         }   
    }


?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
        <title>post</title>

         <!-- javascript function for pop up function  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            function OnConfirm(msg, myYes) {
                var confirmBox = $(".pop");
                confirmBox.find(".message").text(msg);
                confirmBox.find("#popup-1").unbind().click(function () {
                    confirmBox.hide();
                });
                confirmBox.find(".no").click(myYes);
                confirmBox.show();
            }
        </script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
        <style>
        .pop {
            display:none;
            background-color: #F3F5F6;
            color: #000000;
            border: 1px solid #aaa;
            position: fixed;
            width: 657px;
            height: auto;
            left: 28%;
            top:0%;
            margin-left: -37px;
            padding: 10px 50px 30px;
            box-sizing: border-box;
            text-align: center;
            margin-top:5%;
        }
        .pop .close-btn{
        cursor:pointer;
            position: absolute;
            right: 20px;
            top: 20px;
            width: 30px;
            height: 30px;
            background-color: #222;
            color: #fff;
            font-size: 25px;
            line-height: 30px;
            font-weight: 600;
            text-align: center;
            border-radius: 50%;
        }
        .post {
                margin: 9%;
                margin-left: 27%;
                margin-right: 23%;
                text-align: center;
                padding: 4%;
                border: solid;
                border-radius: 43px;
                font-size: 21px;
color: black;
background-color: #aaa;
            }
            .btn{
                border-radius: 8px;
                width: 116px;




            }
            .head1{
                margin: 2%;
                display: flex;
                justify-content: space-between;
                margin-left: 1%;
                margin-right: 6%;
            }
.bod{
background-image: url(heer.jpeg); 
background-repeat: no-repeat; 
background-size: cover;
}

        </style>
    </head>
    <body onload='swal'  class="bod">
        <?php
            if($showalert){
        echo'<script>
                alert("you already give response");
            </script>';
            }
        
            if($showerror){
                echo'
                <script>
                swal("Good job!", "Your requirement are now posted", "success");
            </script>';
            }
        
        ?>    
       
        <?php 
            require "../dbconnect.php";
            $sql = "select * from `admins` where title='$title'";
            $result = mysqli_query($conn,$sql) or die(mysqli_error($sql));
            $data = mysqli_fetch_array($result);

            echo
            '<div class="post" data-aos="flip-right"  data-aos-duration="3000">
                <div class="head">
                    <b> <h1>'.$data['title'].'</h1></b>
                </div>
                <div class="location">
                    '.$data['location'].'
                </div>
                <br>
                <div class="middle">
                    <b>Requirement :</b>   <br>'.$data['requirement'].' <br>
                    <b>Industry Requirement :</b>  <br>'.$data['industryrequirement'].'<br>
                    <b>Connect Professional :</b>   <br>'.$data['connectprofessional'].'<br>
                </div>
                <br>
                <button type="button"  class="btn btn-success" onclick="OnConfirm();">send offer</button>
                <a href="post.php"><button type="button" class="btn btn-primary"><----back</button></a>
            </div>';
// popup message 
            echo '

                <div class="pop" data-aos="flip-right"  data-aos-duration="3000" >
                    <div id="popup-1"class="close-btn" onclick="togglepopup()">
                            &times;
                    </div>
                    <div class="middle">   
                        <form action="view.php" method="post"  >
                            <h4 style="float:left;float: left;padding-left: 10%;padding-bottom: 1%;">Requirement details</h4>
                                <div class="drop" style="padding-bottom: 2%;padding-left: 1%;" >
                                    <label>Select categories/Industries:
                                        <input list="category" name="category" /></label>
                                        <datalist id="category">
                                            <option value="Web development">
                                            <option value="PHP developer">
                                            <option value="Android Development">
                                            <option value="Data Science">
                                            <option value="Big Data">
                                            <option value="Machine learning">
                                        </datalist>
                                </div>
                                <div class="loc"  style="padding-bottom: 2%; padding-left: 1%;" data-aos="flip-right"  data-aos-duration="3000">
                                    <label>Choose your location:
                                        <input list="location1" name="location1" /></label>
                                        <datalist id="location1">
                                            <option value="Pune">
                                            <option value="Banglore">
                                            <option value="Mumbai">
                                            <option value="New york">
                                            <option value="Tokyo">
                                            <option value="Delhi">
                                        </datalist>
                                </div>
                                <div class="info"  style="padding-bottom: 2%; padding-left: 1%;">
                                    <label for="exampleInputPassword1" class="form-label"> Tell us more about your Requirements here.</label>
                                        <textarea rows="3" cols="30" name="requirement" placeholder="enter your thought">
                                        </textarea>
                                    </div>
                                <div class="inp" >
                                    <lable for="budget">Your Budget</lable>
                                    <input type="int" name="budget" >
                                </div>
                                <div class="message" style="padding-top:2%; padding-bottom:3%;" >
                                    <lable for="message">Your Message</lable>
                                    <input type="text" name="message" >
                                </div>
                                <div class="button">
                                    <input id="send" class="btn btn-success" name="send" type="submit" value="Send Offer">
                                </div>
                            </form>
                        </div>
                </div>
                ';
            ?>
       <div>
                <center><img src="download.png" alt="GDSC-MCET" width=" 250 "> </center>
            </div>

    </body>
</html>

