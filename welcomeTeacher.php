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

<?php
$email =  $_SESSION['email'];
$password = $_SESSION['password'];
if ($_SESSION['email'] == true){


    $sql = "select * from staff where stf_email = '".$email."' AND stf_password = '".$password."'";

    $result = mysqli_query($link,$sql);

    $rowcount = mysqli_num_rows($result);

    ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navCol">
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
      
    <li class="nav-item">
    <a class="nav-link " id="icol" href="welcomeTeacher.php">Profile</a>
    </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="LecTeacher/lecT.php">My lectures</a>
      </li>
    </ul>
    
  </div>
  <button type="button" class="btn btn-outline-primary "> <a id="icol" href="logOut.php">Logout</a></button>
</nav>

<center>
<table style="width:30%; color:rgb(88, 88, 88); font-size:1.5rem;">
    <div class="prof">
    <?php

    while($row = mysqli_fetch_array($result)){
        echo  "<tr><th>Name: </th><th>".$row['stf_first_name']." ".$row['stf_last_name']."</th></tr>";
      
        echo  "<tr><th>Email: </th><th>".$row['stf_email']."</th></tr>";
        echo  "<tr><th>userName: </th><th>".$row['stf_user_name']."</th></tr>";
        echo  "<tr><th>Scientific Title: </th><th> ".$row['stf_scientific_title']."</th></tr>";
        echo  "<tr><th>Functional: </th><th> ".$row['stf_functional_class']."</th></tr>";
    }

}
else{
    header("location: loginTeacher.php");
}



?>
</div>
</table>
</center>
</body>

</html>