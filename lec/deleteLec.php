<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$link = mysqli_connect($host,$user,$password,$db);
     
$id = $_GET['id'];

$q ="DELETE FROM `lecture_lab` WHERE ID_lec_lab ='$id'";
mysqli_query($link ,$q);
header('location:Lec.php');
?>