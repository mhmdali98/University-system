<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'unvdb';

$con = new mysqli($dbhost,$dbuser,$dbpass,$db);

if ($con->connect_error) {
    die('<script>alert("Connection failed");</script>'. $conn->connect_error);
}
?>