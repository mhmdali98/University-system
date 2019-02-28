<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$link = mysqli_connect($host,$user,$password,$db);
     
$id = $_GET['id'];

$q ="DELETE FROM `student` WHERE ID_stu ='$id'";
mysqli_query($link ,$q);
header('location:Student.php');
?>