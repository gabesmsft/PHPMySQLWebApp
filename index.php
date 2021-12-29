<?php
$mysqli = mysqli_init();
if (!$mysqli) {
  die("mysqli_init failed");
}

/* MySQL server */
$host = getenv('AZURE_MYSQL_HOST') ?: 'localhost';

/* MySQL database name */
$dbname = getenv('AZURE_MYSQL_DBNAME') ?: 'localdb';

/* MySQL username */
$username = getenv('AZURE_MYSQL_USERNAME') ?: null;

/* MySQL password */
$password = getenv('AZURE_MYSQL_PASSWORD') ?: null;

/* MySQL server port number */
$port = getenv('AZURE_MYSQL_PORT') ?: 3306;

/* MySQL server SSL option*/
$flag =getenv('AZURE_MYSQL_FLAG') ?: null;


if (!$mysqli -> real_connect($host, $username, $password, $dbname, $port, null, constant($flag))) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

echo 'Success... ' . $mysqli->host_info . "\n";

$mysqli->close();

?>