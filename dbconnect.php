<?php
$SERVER = "34.100.218.188";
$username = 'placementhub';
$password = '1234';
$db_name = 'internship';
$cloud_sql_connection_name = getenv("CLOUD_SQL_CONNECTION_NAME");
$socket_dir = getenv('DB_SOCKET_DIR')?: '/cloudsql';

$dsn = sprintf(
'mysql:dbname=%s;unix_socket=%s/%s',
$db_name,
$socket_dir,
$cloud_sql_connection_name
);
$conn = mysqli_connect($SERVER, $username, $password, $database);
if (!$conn) {
    mysqli_error($conn);
}
// echo "connect successfull";
?>