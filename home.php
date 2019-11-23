<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"]) && !isset($_SESSION["superadmin"])){
  header("Location: index.php");
}

if(isset($_SESSION["admin"])){
  header("Location: adminpanel.php");
}

if(isset($_SESSION["superadmin"])){
  header("Location: mainDashboard.php");
}




// if session is not set this will redirect to login page
// select logged-in users details
$sql = "SELECT * FROM users WHERE userId=".$_SESSION['user'];
echo $sql;
$res=mysqli_query($conn, $sql);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style2.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
</head>
<body >

  <?php include_once "navbarUser.php" ?>




 <div class="fluid-container">

              <div class="jumbotron">
  <h1 class="display-4 mt-4">Dear User</h1>
  <p class="leadJumbo">Discover the Viennese restaurant scene</p>
</div>
        
       
                <div class="row mb-2">


            <?php
           $sql = "SELECT * FROM restaurant WHERE active = 0";
           $result = $conn->query($sql);
 if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "
                     <div class='col-lg-3 col-md-6 col-sm-6 my-4 cardBook'>
                   <div class='card  border-0 cardMain' style='width: 18rem;'>
                   <img src=".$row['image']."class='card-img-top'>
                   <div class='card-body text-center'>
                    <h3 class='card-title'>" .$row['name']."</h3>
                    
                          <p>".$row['type' ]."</p>

                       
                      <a><button type='button' class='btn' data-toggle='modal' data-target='#exampleModal".$i."'>
                          More info
                        </button></a>
                  </div>
                </div>
                </div>



<!-- Button trigger modal -->


<!-- Modal -->
<div class='modal  fade' id='exampleModal".$i."'tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>About this restaurant</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
       <div class='col-lg-3 col-md-4 col-sm-6 my-4 cardBook'>
                   <div class='card  border-0 cardMain' style='width: 18rem;'>
                   <img src=".$row['image']."class='card-img-top'>
                   <div class='card-body text-center'>
                    <h3 class='card-title'>" .$row['name']."</h3>
                    
                          <p>".$row['type' ]."</p><hr>
                          <p>" .$row['address']."</p><hr>
                       <p>" .$row['city']." " .$row['zip_code']."</p>
                       <p>" .$row['descript']."</p>
                       
                       
                  </div>
                </div>
                </div>
      </div>
    </div>
  </div>
</div>

    




                   " ;
                   $i++;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>
</div>


</body>
</html>
<?php ob_end_flush(); ?>