<?php

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$con = mysqli_connect($host,$user,$password,$db);
?>
<?php


if (isset($_POST['nameCollege'])){

    $nameCollege = $_POST['nameCollege'];
    $supNameCollege = $_POST['supNameCollege'];

    $sql = "INSERT INTO university( unv_name , unv_sub_name) VALUES ('$nameCollege','$supNameCollege')";




    if (!mysqli_query($con,$sql))
    {

        echo 'Not inserted.';

    }
    else{

        echo '<script>alert("Current Course Inserted Successfully")</script>' ;
    }


}


?>



<!DOCTYPE html>
<html>
<head>
               <!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style3.css" type="text/css" >

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

</head>
<body>

<?php
if ($_SESSION['email']==true) {

    ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light navCol">
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav">
      
    <li class="nav-item">
    <a class="nav-link " id="icol" href="../welcomeAdmin.php">Profile</a>
    </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="college.php">Colleges</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../Deb/Deb.php">Departments</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../teacher/Teacher.php">Teachers</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../student/Student.php">Students</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../lec/lec.php">Lectures</a>
      </li>
      
    </ul>
  </div>
  <button type="button" class="btn btn-outline-primary "> <a id="icol" href="../logOut.php">Logout</a></button>
</nav>

    <div class="butadd">
        
    <form action="addCollege.php" method="POST">
  <div class="form-group">
    <label>Name College:</label>
    <input type="text" class="form-control" name="nameCollege"   placeholder="Enter name" required>
  </div>
  <div class="form-group">
    <label>Sup_Name:</label>
    <input type="text" class="form-control" name="supNameCollege" placeholder="Enter sup name" required>
  </div>
  <button type="submit" value="submit" class="btn btn-secondary">save</button>
</form>
        
    </div>
<?php }  else {
    header("location: loginAdmin.php");
}?>


</body>
</html>