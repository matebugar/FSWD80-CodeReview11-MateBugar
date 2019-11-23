<?php
ob_start();
session_start();
require_once 'dbconnect.php';
// if session is not set this will redirect to login page
// select logged-in users details

if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"])&& !isset($_SESSION["superadmin"])){
  header("Location: index.php");
}

if(isset($_SESSION["user"])){
  header("Location: userLanding.php");
}

if(isset($_SESSION["admin"])){
  header("Location: adminpanel.php");
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['superadmin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style2.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
</head>
<body >

   <?php include_once "navbarSuperAdmin.php" ?>
           
   

            <div class="fluid-container">

              <div class="jumbotron">
  <h1 class="display-4 mt-4">Dear SuperAdmin</h1>
  <p class="leadJumbo">You can manage the users and admins in this page.<br>
  Pushing the EDIT and DELETE buttons are triggering the functions.  
  </p>
</div>
        
       
                <div class="row mb-2">
 


            <?php
           $sql = "SELECT * FROM users";
           $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "
                     <div class='col-lg-3 col-md-4 col-sm-6 my-4 cardBook'>
                   <div class='card  border-0 cardMain' style='width: 18rem ;'>
                   <div class='card-body text-center'>
                    <h3 class='card-title'>Name: " .$row['userName']."</h3>
                          <hr>
                          <p>E-mail:<br> ".$row['userEmail' ]."</p>
                          <p>Role: ".$row['role' ]."</p>

                       
                      
                        <a href='editDashboard.php?id=" .$row['userId']."'><button type='button'>Edit</button></a>
                           <a href='deleteDashboard.php?id=" .$row['userId']."'><button type='button'>Delete</button></a>
                           <hr>
                  </div>
                </div>
                </div>

                   " ;
              
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>
</div>
</body>
</html>        