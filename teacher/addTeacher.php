<?php

session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "unvdb";

$con = mysqli_connect($host,$user,$password,$db);

if (isset($_POST['fname'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $password = md5($password);
    $password = sha1($password);
    $title = $_POST['title'];
    $class = $_POST['class'];
    $dep_id = $_POST['dep_id'];
    $unv_id = $_POST['unv_id'];

    $sql = "INSERT INTO `staff`(`stf_first_name`, `stf_last_name`, `stf_email`, `stf_user_name`, `stf_password`,`stf_scientific_title`, `stf_functional_class`, `dep_id`, `unv_id`) VALUES ('$fname','$lname','$email','$userName','$passwoed','$title','$class',$dep_id,$unv_id)";




    if (!mysqli_query($con,$sql))
    {

        echo 'Not added';

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
      <a class="nav-link " id="icol" href="Teacher.php">Teachers</a>
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
            <form action="addTeacher.php" method="POST">
            
 <div class="form-group">
    <label>First Name:</label>
    <input type="text" class="form-control" name="fname"   placeholder="Enter First name" required>
  </div>
  <div class="form-group">
    <label>Last Name:</label>
    <input type="text" class="form-control" name="lname"   placeholder="Enter Last name" required>
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
    <label>Title:</label>
    <input type="text" class="form-control" name="title"   placeholder="Enter title" required>
  </div>

  <div class="form-group">
    <label>Class:</label>
    <input type="number" class="form-control" name="class"   placeholder="Enter class number" required>
  </div>

  <label>Deparment:</label>
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
               <label> College:</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">College</label>
                </div>
                <select class="custom-select" name="unv_id" id="inputGroupSelect01" required>
                    <option selected>Choose...</option>
                    <?php
                        $sql3 = "select * from university";
                        $result3 = mysqli_query($con, $sql3);
                        foreach ($result3 as $initial){?>
                         <option value="<?php echo $initial['ID_unv']?>"><?php echo $initial['unv_name']?></option>
                            <?php

                        }
                    ?>
                </select>
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