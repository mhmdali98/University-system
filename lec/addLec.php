<?php

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$con = mysqli_connect($host,$user,$password,$db);

if (isset($_POST['nameLec'])){

    $nameLec = $_POST['nameLec'];
    $supNameLec = $_POST['supNameLec'];
    $IdStf = $_POST['IdStf'];
    $corseLec = $_POST['corseLec'];
    $id_dep = $_POST['id_Dep'];
    $stageLec = $_POST['stageLec'];

    $sqlTname = "SELECT * FROM `staff` WHERE `ID_stf` = '".$IdStf."'";
    $result3 = mysqli_query($con,$sqlTname);    
    foreach ($result3 as $initial3){
        $nameF= $initial3['stf_first_name']; 
        $nameL= $initial3['stf_last_name'];
        $nameStf= $nameF. ' ' .$nameL;
       }  

            

    $sql = "INSERT INTO `lecture_lab`(`lec_lab_name`, `lec_lab_sub_name`, `Id_stf` , `name_stf` , `lec_lab_corse` , `id_dep`, `stageLec`) VALUES('$nameLec','$supNameLec',$IdStf,'$nameStf',$corseLec, $id_dep, $stageLec)";




    if (!mysqli_query($con,$sql))
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
               <!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style3.css" type="text/css" >

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>
<body>

<?php
if ($_SESSION['email']==true) {


    ?>


    <div>
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
      <a class="nav-link " id="icol" href="../student/Student.php">Students</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " id="icol" href="lec.php">Lectures</a>
      </li>
      
    </ul>
  </div>
  <button type="button" class="btn btn-outline-primary "> <a id="icol" href="../logOut.php">Logout</a></button>
 
</nav>

        <div class="butadd" >
            <form action="addLec.php" method="POST">
<div class="form-group">
    <label>Lecture Name:</label>
    <input type="text" class="form-control" name="nameLec" placeholder="Enter Lecture name" required>
  </div>

  <div class="form-group">
    <label>Lecture sup Name:</label>
    <input type="text" class="form-control" name="supNameLec" placeholder="Enter Lecture sup name" required>
  </div>

  <label>Teacher Name</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Teacher Name</label>
                </div>
                <select class="custom-select" name="IdStf" id="inputGroupSelect01" required>
                    <option selected>Choose...</option>
                    <?php
                        $sql2 = "select * from staff";
                        $result2 = mysqli_query($con, $sql2);
                        foreach ($result2 as $initial){?>
                         <option value="<?php echo $initial['ID_stf']; ?>"><?php  echo $initial['stf_first_name'].' '.$initial['stf_last_name'];?></option>
                            <?php

                        }
                    ?>
                </select>
                </div>

                <label>Department</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Department</label>
                </div>
                <select class="custom-select" name="id_Dep" id="inputGroupSelect01" required>
                    <option selected>Choose...</option>
                    <?php
                        $sql4 = "select * from department";
                        $result4 = mysqli_query($con, $sql4);
                        foreach ($result4 as $initial4){?>
                         <option value="<?php echo $initial4['ID_dep']; ?>"><?php  echo $initial4['dep_name']; ?></option>
                            <?php

                        }
                    ?>
                </select>
                </div>
<div class="form-group">
    <label>Corse:</label>
    <input type="number" class="form-control" name="corseLec" placeholder="Enter Lecture corse" required>
  </div>

  <div class="form-group">
    <label>Stage:</label>
    <input type="number" class="form-control" name="stageLec" placeholder="Enter Lecture corse" required>
  </div>

  <button type="submit" value="submit" class="btn btn-secondary">save</button>
            </form>
        </div>
    </div>
<?php }  else {
    header("location: loginAdmin.php");
}?>


</body>
</html>