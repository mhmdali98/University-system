<?php

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$link = mysqli_connect($host,$user,$password,$db);
$id1 = $_GET['id'];


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


<?php


$email =  $_SESSION['email'];
$password = $_SESSION['password'];
if ($_SESSION['email'] == true){

    $sql = "SELECT * FROM `lecture_lab` WHERE ID_lec_lab=$id1" ;
    $result = mysqli_query($link,$sql);
    foreach ($result as $initial){
        $stage= $initial['stageLec']; 
        $id_dep= $initial['id_dep'];
        $corse= $initial['lec_lab_corse'];
       }
    


    $sql2 = "SELECT * FROM `student` WHERE stu_stage=$stage AND dep_id=$id_dep AND corse=$corse";
    $result2 = mysqli_query($link,$sql2);
    
?>

<br><br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="4%">#</th>
      <th scope="col" >Student First Name</th>
      <th scope="col" >Student Last Name</th>
      <th scope="col" >Email</th>
      <th scope="col" >Degree</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>

       <?php
       if ($result2) {
       
           $i = 0;
           $Deg = 0;
           foreach ($result2 as $sdata) {
               $i++;
               $idStu = $sdata['ID_stu'];
               $cor = $sdata['corse'];

               $sqlDeg = "SELECT * FROM `degrees` WHERE `stu_id`= $idStu AND `lec_lab_id`=$id1 And `corse`= $cor";
               $resultD = mysqli_query($link,$sqlDeg);    
               foreach ($resultD as $initialD){
                 if($idStu = $idStu){
                    $Deg= $initialD['deg_number']; 
                 }
                  } 

               ?>
<tbody>
    <tr>
    <td><?php echo $i;?></td>
                    <td><?php echo $sdata['stu_first_name']?></td>
                    <td><?php echo $sdata['stu_last_name']?></td>
                    <td><?php echo $sdata['stu_email']?></td>
                    <td><?php echo $Deg?></td>
                    <td>
                      <?php
                      if($Deg==0){
                      ?>
                    <a  href="insertDegree.php?id1=<?php echo $sdata['ID_stu'];?>&id2=<?php echo $id1;?>">insert</a>
                      <?php }
                      else{
                      ?>
                       <a  href="upDateDegree.php?id1=<?php echo $sdata['ID_stu'];?>&id2=<?php echo $id1;?>">Edit</a>
                      <?php } ?>
                      <?php $Deg = 0 ?>
                      </td>
    </tr>
   
  </tbody>

           <?php } }else{?>

           <tr><td colspan="5"><h2>No data found</h2></td></tr>
       <?php } ?>
   </table>

<?php
}
else{
    header("location: loginTeacher.php");
}

?>

</body>

</html>