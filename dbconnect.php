<?php

$SERVER = "34.100.218.188";
$username = "placementhub";
$password = "1234";
$database = "internship";
$conn = mysqli_connect($SERVER, $username, $password, $database);
if (!$conn) {
    mysqli_error($conn);
}
// echo "connect successfull";



?>