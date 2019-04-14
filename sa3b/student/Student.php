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
    <a class="nav-link " id="icol" href="../welcomeAdmin.php">Profile</a>
    </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../college/college.php">Colleges</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../Deb/Deb.php">Departments</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../teacher/Teacher.php">Teachers</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="Student.php">Students</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="../lec/lec.php">Lectures</a>
      </li>
      
    </ul>
  </div>
  <button type="button" class="btn btn-outline-primary "> <a id="icol" href="../logOut.php">Logout</a></button>
 
</nav>

<div class="butadd">
    <a href="addStudent.php"><button type="button" class="btn btn-outline-secondary">Add Student</button></a>  
</div>


<?php

if (isset($_SESSION['email']) == true) {
    $email = $_SESSION['email'];

    $sql = "select * from student";

    $result = mysqli_query($link, $sql);

    $rowcount = mysqli_num_rows($result);

    ?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="4%">#</th>
      <th scope="col" >First Name</th>
      <th scope="col" >Last Name</th>
      <th scope="col" >Email</th>
      <th scope="col" >userName</th>
      <th scope="col" >password</th>
      <th scope="col" >age</th>
      <th scope="col" >address</th>
      <th scope="col" >stage</th>
      <th scope="col" >corse</th>
      <th scope="col" >Action</th>
    </tr>
  </thead>

        <?php
        if ($result) {

            $i = 0;
            foreach ($result as $sdata) {
                $i++;

                ?>
<tbody>
    <tr>
    <td><?php echo $i;?></td>
                    <td><?php echo $sdata['stu_first_name']?></td>
                    <td><?php echo $sdata['stu_last_name']?></td>
                    <td><?php echo $sdata['stu_email']?></td>
                    <td><?php echo $sdata['stu_user_name']?></td>
                    <td><?php echo $sdata['stu_password']?></td>
                    <td><?php echo $sdata['stu_age']?></td>
                    <td><?php echo $sdata['stu_address']?></td>
                    <td><?php echo $sdata['stu_stage']?></td>
                    <td><?php echo $sdata['corse']?></td>
                    <td>
                    
                        <a  href="editStudent.php?id=<?php echo $sdata['ID_stu'];?>">Edit</a>&nbsp&nbsp|&nbsp&nbsp
                        <a  href="deleteStudent.php?id=<?php echo $sdata['ID_stu'];?>">Delete</a>
                    
                        
                    </td>
    </tr>
   
  </tbody>

            <?php } }else{?>

            <tr><td colspan="5"><h2>No data found</h2></td></tr>
        <?php } ?>
    </table>
    <?php


}else{
    header("location: loginAdmin.php");
}

?>
</body>
</html>
