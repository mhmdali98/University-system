<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$link = mysqli_connect($host,$user,$password,$db);
     
$id = $_GET['id'];

$q ="DELETE FROM `university` WHERE ID_unv ='$id'";
mysqli_query($link ,$q);
header('location:college.php');
?>