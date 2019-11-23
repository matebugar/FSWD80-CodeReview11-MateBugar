<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
  <style type="text/css">
    p {
      text-align: center;
      margin-top: 40px;
      font-family: 'Indie Flower', cursive;
      font-size: 26px;
    }

  a {
     margin-left: 400px;
     background: white;
    }

a button {
  padding-left: 50px;
  padding-right: 50px;
  padding-top: 10px;
  padding-bottom: 10px;
  font-family: 'Indie Flower', cursive;
  font-size: 22px;
  border-radius: 10px;
}

a button:hover {
  color: white;
  background: black;
}

  </style>
</head>
<body>









<?php 

require_once '../dbconnect.php';

if ($_POST) {
   $name = $_POST['name'];
   $address = $_POST['address'];
   $image = $_POST[ 'image'];
   $zip_code = $_POST[ 'zip_code'];
   $city = $_POST[ 'city'];
   $ticket = $_POST[ 'ticket'];
   $dateEvent = $_POST[ 'dateEvent'];
   $timeEvent = $_POST[ 'timeEvent'];

   $id = $_POST['eventId'];

   $sql = "UPDATE event SET name = '$name', address = '$address', image = '$image', zip_code = '$zip_code', city = '$city', 
   ticket = '$ticket', dateEvent = '$dateEvent', timeEvent = '$timeEvent' WHERE eventId = {$id}" ;
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../updateEvent.php?id=" .$id."'><button type='button'>Back</button></a>";
       echo  "<a href='../eventAdmin.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>


</body>
</html>