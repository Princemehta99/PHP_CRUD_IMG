<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'crud_img'; // ✅ Use your actual database name

$con = new mysqli($host, $user, $pass, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
