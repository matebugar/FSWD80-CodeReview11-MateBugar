<?php 

require_once 'dbconnect.php';

if (isset($_GET['id'])) {
   $userId = $_GET['id']; #that is a variable (userId) call it whatever you want

   $sql = "SELECT * FROM users WHERE userId = {$userId}" ;
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">

<style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 40% ;
           font-family: 'Indie Flower', cursive;
           font-size: 18px;
       }

       table tr th  {
           padding-top: 20px;
       }

       table tr td {
        width: 340px;
       }

       button {
          margin-top: 20px;
          border-radius: 5px;
       }

       button:hover {
          color: white;
          background-color: black;
       }

       table input  {
          border-radius: 4px;
          box-shadow: 3px 2px darkgrey;
          width: 300px;
       }

   </style>
</head>
<body >

   <?php include_once "navbar.php" ?>

<fieldset>
   <legend>Update media</legend>

   <form action="actions/a_updateDashboard.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
        <input type="hidden" name="userId" value="<?= $userId; ?>">
           <tr>
               <th>Name</th>
               <td><input type="text"  name="userName" placeholder ="Name" value="<?php echo $data['userName'] ?>"  /></td>
           </tr>    
           <tr>
               <th>E-mail</th>
               <td><input type= "text" name="userEmail"  placeholder="E-mail address" value ="<?php echo $data['userEmail'] ?>" /></td >
           </tr>
           <tr>
               <th>Role</th>
               <td><input type ="text" name= "role" placeholder= "Role" value= "<?php echo $data['role'] ?>" /></td>
           </tr>
           <tr>
               <td><button  type= "submit">Save Changes</button ></td>
               <td><a  href= "mainDashboard.php"><button  type="button" >Back</button ></a ></td >
           </tr>
       </table>
   </form >

</fieldset >

</body >
</html >

<?php
}
?>