<?php

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$link = mysqli_connect($host,$user,$password,$db);
$id1=$_GET['id1'];
$id2=$_GET['id2'];

if (isset($_POST['degree'])){

    $deg=$_POST['degree'];
      
    $sqlTname = "SELECT * FROM `student` WHERE `ID_stu` = '".$id1."'";
    $result3 = mysqli_query($link,$sqlTname);    
    foreach ($result3 as $initial3){
        $corse= $initial3['corse']; 
       } 


    // $sql = "INSERT INTO `degrees`(`stu_id`, `lec_lab_id`, `deg_number`, `corse`) VALUES($id1,$id2,$deg,$corse) ";
    $sql = "UPDATE `degrees` SET `deg_number`=$deg WHERE `stu_id` = $id1 AND `lec_lab_id` = $id2 ";

    if (!mysqli_query($link,$sql) )
    {

        echo 'Not added.';

    }
    else{
        echo '<script>alert(" added Successfully")</script>' ;
    }


}



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
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
    <a class="nav-link " id="icol" href="../welcomeTeacher.php">Profile</a>
    </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="lecT.php">My lectures</a>
      </li>
    </ul>
    
  </div>
  <button type="button" class="btn btn-outline-primary "> <a id="icol" href="../logOut.php">Logout</a></button>
</nav>

<div class="butadd">
    <form method="POST">
    <div class="form-group">
    <label> The Degree:</label>
    <input type="number" class="form-control" name="degree" placeholder="Enter degree" required>
  </div>

    <button type="submit" value="save" class="btn btn-secondary">save</button>
    <a  href="degrees.php?id=<?php echo $id2;?>">Back</a>
            </form>
</div>
    <?php

  

}
else{
    header("location: loginTeacher.php");
}



?>
</body>

</html>