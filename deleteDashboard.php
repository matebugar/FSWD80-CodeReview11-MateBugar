<?php 


require_once 'dbconnect.php';

if (isset($_GET['id'])) {
   $userId = $_GET['id'];

   $sql = "SELECT * FROM users WHERE userId = {$userId}" ;
   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

   $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete User</title>
   <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
  <style type="text/css">
    p {
      text-align: center;
      margin-top: 40px;
      font-family: 'Indie Flower', cursive;
      font-size: 26px;
    }

  a {
     margin-left: 340px;
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

<p>Do you really want to delete this user?</p>
<form action ="actions/a_deleteDashboard.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data['userId'] ?>" />
   <a><button type="submit">Yes, delete it!</button></a>
   <a href="mainDashboard.php"><button type="button">No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>