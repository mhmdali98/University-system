<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$link = mysqli_connect($host,$user,$password,$db);
     
$id = $_GET['id'];

$q ="DELETE FROM `department` WHERE ID_dep ='$id'";
mysqli_query($link ,$q);
header('location:Deb.php');
?>