<?php
$showerror = false;
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     require "dbconnect.php";
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $sql = "SELECT * from `internship`.`signup` where username ='$username'";
//     $result = mysqli_query($conn, $sql);
//     $num = mysqli_num_rows($result);
//     if ($num == 1) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             if (password_verify($password, $row['password'])) {
//                 $login = true;
//                 session_start();
//                 $_SESSION['loggedin'] = true;
//                 $_SESSION['username'] = $username;
//                 header("location:admins/index.php");
//             } else {

//                 $showerror = true;
//             }
//         }
//     } else {
//         $showerror = true;
//     }
// }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * from `internship`.`signup` where username = ?");
    $stmt->execute([$username]);
    $result = $stmt->fetchAll();
    $num = count($result);
    if ($num == 1) {
        $row = $result[0];
        if (password_verify($password, $row['password'])) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location:admins/index.php");
        } else {
            $showerror = true;
        }
    } else {
        $showerror = true;
    }
}


?>
<?php require "admins/nav.php";

if ($showerror == true) {
    echo '<script>
            alert("please check your credentials");
        </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>INDEX PLACEMENT HUB BY GDSC </title>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(850px circle at 0% 0%, hsl(218, 41%, 35%) 25%, hsl(218, 41%, 30%) 45%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%), radial-gradient(1250px circle at 100% 100%, hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%);
                /* padding-top: 10px; */
                /* padding-bottom: 10px; */
            }

            #radius-shape-1 {
                height: 220px;
                width: 550px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: 10px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>

        <div class="box">
            <div class="table1">
                <form action="adminslogin.php" class="" method="post">
                    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
                        <div class="row gx-lg-5 align-items-center mb-5">
                            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                                <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                                    Welcome to <br />
                                    <span style="color: hsl(218, 81%, 75%)">PlacementHub!</span>
                                </h1>
                                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                                    We are a platform that connects talented students and recent graduates with top
                                    companies looking to hire. Our mission is to help you take the first steps towards
                                    your career by providing access to exciting internship and placement opportunities.
                                </p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                                <div class="card bg-dark text-white">
                                    <div class="card-body px-4 py-5 px-md-5">
                                        <form>
                                            <!-- 2 column grid layout with text inputs for the first and last names -->


                                            <!--USERNAME INPUT-->
                                            <div class="mb-5">
                                                <label for="exampleInputEmail1" class="form-label mb-4">Username</label>
                                                <input type="text" name="username" placeholder="username"
                                                    class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp">
                                            </div>
                                            <!-- PASSWORD INPUT -->

                                            <div class="mb-5">
                                                <label for="exampleInputPassword1"
                                                    class="form-label mb-3">Password</label>
                                                <input type="password" name="password" placeholder="password"
                                                    class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <!--SUBMIT BUTTON -->

                                            <center><button type="submit" class="btn btn-success mb-5">Login</button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer mb-3" style="position:center;">
                        <div>
                            <center><img src="download.png " alt="GDSC-MCET " width=" 250 "> </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>