<?php
// ----------

$dsn = "mysql:dbname=internship;host=34.100.218.188;port=PORT";
$user = "placementhub";
$password = "1234";

try {
    $conn = new PDO($dsn, $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected to Google Cloud SQL successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>