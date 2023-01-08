<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit;
}

$showalert = true;
$showerror = true;

if($_SERVER['REQUEST_METHOD']=="POST"){
    try {
      require "../dbconnect.php";
    // $conn = new PDO("dbname=internship", "placementhub", "1234");
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

      $stmt = $conn->prepare("SELECT * FROM studentsignup WHERE username = :username AND cpassword = :cpassword");
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':cpassword', $cpassword);
      $stmt->execute();

      $num = $stmt->rowCount();
      if($num == 0){
        if($password == $cpassword && $username != "") {
          $password = password_hash($password, PASSWORD_DEFAULT);
          $stmt = $conn->prepare("INSERT INTO studentsignup (username, password, cpassword) VALUES (:username, :password, :cpassword)");
        //   $stmt = $conn->prepare("INSERT INTO studentsignup VALUES (:username, :password, :cpassword)");

          $stmt->bindParam(':username', $username);
          $stmt->bindParam(':password', $password);
          $stmt->bindParam(':cpassword', $cpassword);
          $stmt->execute();

          $table = $username . 'studentsignup';
          $stmt = $conn->prepare("CREATE TABLE $table (username VARCHAR(255), password VARCHAR(255), cpassword VARCHAR(255))");
          $stmt->execute();
        }
        else {
          $showalert = true;
        }
      }
      else {
        $showerror = true;
      }
    }
    else {
      echo "error";
    }
  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
}
else {

}
?>


<?php include "nav.php";  ?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Student Registration </title>
     
</head>
<style>
body{color: #000;overflow-x: hidden;height: 100%;
background-image: url(her.jpeg);background-repeat: no-repeat;background-size: cover}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 10px 12px 0 rgb(117 108 108)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color:#fff  !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <section class="h-100 ">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                   <img src="doc.jpeg" 
                alt="login form" width="650px" height="497.59px" style="border-radius: 1rem 0 0 1rem;"  />
                                </div>
                                <div class="col-xl-6">
                                    <div class="card-body p-md-5 text-black">
                                      <div class="middle">
                                       <div class="table1">
                                         <form action="student.php" method="post">


                                              <!-- form  -->

                                         <h3 class="mb-5 text-uppercase">Student registration form</h3><div class="row">
                                            <div class="col-md-6 mb-4">
                                            </div>
                                            <div class="mb-3">
                                                 <label for="exampl1" class="form-label">Username</label>
                                                  <input placeholder="username" name="username" type="username" class="form-control" id="exampl1">
                                                </div>
                                                <div class="mb-3">
                                                     <label for="exam1" class="form-label">Password</label>
                                                     <input placeholder="password" name="password" type="password" class="form-control" id="exam1">
                                                </div>
                                                    <div class="mb-3">
                                                        <label for="exa1" class="form-label">confirm Password</label>
                                                        <input placeholder="cpassword"name="cpassword" type="cpassword" class="form-control" id="exa1">
                                                    </div>
                                                    <div >
                 <center><img src="download.png " alt="GDSC-MCET " width=" 250 "> </center>
            </div>
                                                 </div>
                                                     <center><button id="submit" name="submit" type="submit" class="btn btn-warning">submit</button></center>
                                                     </form>
                                                    </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>