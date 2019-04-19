<?php

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$link = mysqli_connect($host,$user,$password,$db);

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
         <!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="css/style3.css" type="text/css" >

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light navCol">
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
      
    <li class="nav-item">
    <a class="nav-link " id="icol" href="welcomeStudent.php">Profile</a>
    </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="seeDegree.php">My Degrees</a>
      </li>
    </ul>
    
  </div>
  <button type="button" class="btn btn-outline-primary "> <a id="icol" href="logOut.php">Logout</a></button>
</nav>

<div class="lec">
<?php
$email =  $_SESSION['email'];
$password = $_SESSION['password'];
if ($_SESSION['email'] == true){


    $sql = "select * from student where stu_email = '".$email."' AND stu_password = '".$password."'";

    $result = mysqli_query($link,$sql);

    $rowcount = mysqli_num_rows($result);
    while($row = mysqli_fetch_array($result)){
        $idStu= $row['ID_stu'];
        $idstage= $row['stu_stage'];
        $iddep= $row['dep_id'];
        $cors= $row['corse'];

        $sql2 = "select * from lecture_lab where id_dep = '".$iddep."' AND stageLec = '".$idstage."' AND lec_lab_corse = '".$cors."'";

    $result2 = mysqli_query($link,$sql2);

    $rowcount2 = mysqli_num_rows($result2);
    while($row2 = mysqli_fetch_array($result2)){
        $idLec= $row2['ID_lec_lab'];
        echo  $row2['lec_lab_name'].' : ';
        
        
    

    $sql3 = "select * from degrees where stu_id = '".$idStu."' AND lec_lab_id = '".$idLec."' AND corse = '".$cors."'";

    $result3 = mysqli_query($link,$sql3);

    $rowcount3 = mysqli_num_rows($result3);
    while($row3 = mysqli_fetch_array($result3)){
        echo  $row3['deg_number']." ";       
    }
    echo "<br />";
  }

}
  
}
else{
    header("location: loginStudent.php");
}


?>
</div>
</body>

</html>