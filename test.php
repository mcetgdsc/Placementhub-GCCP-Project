<?php

$username = 'placementhub';
$password = '1234';
$db_name = 'test';
$cloud_sql_connection_name = getenv("CLOUD_SQL_CONNECTION_NAME");
$socket_dir = getenv('DB_SOCKET_DIR')?: '/cloudsql';

$dsn = sprintf(
    'mysql:dbname=%s;unix_socket=%s/%s',
    $db_name,
    $socket_dir,
    $cloud_sql_connection_name
);

$pdo=new PDO($dsn,$username,$password);

$stmt = $pdo->query("select mem_id,mem_names from team_mem");
$stmt -> execute();
$result = $stmt->fetchAll();

echo "<h3>The Cloud Team members : </h3>";
foreach ($result as $row ) {
    echo "<br />";
    echo "<h2>{$row['mem_id']} ) {$row['mem_names']}</h2>";
}
?>
