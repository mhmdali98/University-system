<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$con = mysqli_connect($host,$user,$password,$db);
$id= $_GET['id'];

if (isset($_POST['fname'])){
    $idd=$id;
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = md5($_POST['password']);
    $password = sha1($password);
    $age = $_POST['age'];
    $address = $_POST['address'];
    $stage = $_POST['stage'];
    $statuss = 1;
    $corse = $_POST['corse'];
    $dep_id = $_POST['dep_id'];

    $sql2 = "UPDATE `student` SET `ID_stu`=$idd,`stu_first_name`='$fname',`stu_last_name`='$lname',`stu_email`='$email',`stu_user_name`='$userName',`stu_password`='$password',`stu_age`='$age',`stu_address`='$address',`stu_stage`=$stage,`stu_status`=$statuss,`corse`=$corse,`dep_id`=$dep_id WHERE 'ID_stu'=$idd";

if (!mysqli_query($con,$sql2))
{

    echo 'Not UpDate';

}
else{

    echo '<script>alert(" UpDate Successfully")</script>' ;
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
            <form method="POST">
<div class="form-group">
    <label>First Name:</label>
    <input type="text" class="form-control" name="fname"   placeholder="Enter First name" required>
</div>

<div class="form-group">
    <label>Last Name:</label>
    <input type="text" class="form-control" name="lname"   placeholder="Enter lname name" required>
  </div>

  <div class="form-group">
    <label>Email:</label>
    <input type="email" class="form-control" name="email"   placeholder="Enter email" required>
  </div>
 
  <div class="form-group">
    <label>userName:</label>
    <input type="text" class="form-control" name="userName"   placeholder="Enter userName" required>
  </div>

  <div class="form-group">
    <label>password:</label>
    <input type="password" class="form-control" name="password"   placeholder="Enter password" required>
  </div> 
 
  <div class="form-group">
    <label>age:</label>
    <input type="date" class="form-control" name="age"  required>
  </div>

  <div class="form-group">
    <label>address:</label>
    <input type="text" class="form-control" name="address"  required>
  </div>

  <div class="form-group">
    <label>stage:</label>
    <input type="number" class="form-control" name="stage"  required>
  </div> 

  <div class="form-group">
    <label>corse:</label>
    <input type="number" class="form-control" name="corse"  required>
  </div> 
 
               <label> Deparment:</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Deparment</label>
                </div>
                <select class="custom-select" name="dep_id" id="inputGroupSelect01" required>
                    <option selected>Choose...</option>
                    <?php
                        $sql2 = "select * from department";
                        $result2 = mysqli_query($con, $sql2);
                        foreach ($result2 as $initial){?>
                         <option value="<?php echo $initial['ID_dep']?>"><?php echo $initial['dep_name']?></option>
                            <?php
                        }
                    ?>
                </select>
                </div>
               
                <button type="submit" value="submit" class="btn btn-secondary">UpDate</button>
            </form>
        </div>
    </div>
<?php }  else {
    header("location: loginAdmin.php");
}?>

</body>
</html>