<?php 

require_once 'dbconnect.php';

if (isset($_GET['id'])) {
   $eventId = $_GET['id'];

   $sql = "SELECT * FROM event WHERE eventId = {$eventId}" ;
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userName' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style2.css">
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

   <form action="actions/a_updateEvent.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
           <tr>
               <th>Name</th>
               <td><input type="text"  name="name" placeholder ="Name" value="<?php echo $data['name'] ?>"  /></td>
           </tr>    
           <tr>
               <th>Address</th>
               <td><input type= "text" name="address"  placeholder="Address" value ="<?php echo $data['address'] ?>" /></td >
           </tr>
           <tr>
               <th>Image</th>
               <td><input type="text"  name="image" placeholder ="Image" value="<?php echo $data['image'] ?>"  /></td>
           </tr>  
           <tr>
               <th>Zip code</th>
               <td><input type="text"  name="zip_code" placeholder ="Zip" value="<?php echo $data['zip_code'] ?>"  /></td>
           </tr>  
            <tr>
               <th>City</th>
               <td><input type="text"  name="city" placeholder ="City" value="<?php echo $data['city'] ?>"  /></td>
           </tr>  
           <tr>
               <th>Ticket</th>
               <td><input type="text"  name="ticket" placeholder ="Ticket price in €" value="<?php echo $data['ticket'] ?>"  /></td>
           </tr>  
           <tr>
               <th>Date</th>
               <td><input type="date"  name="dateEvent" placeholder ="Date" value="<?php echo $data['dateEvent'] ?>"  /></td>
           </tr>  
           <tr>
               <th>Time</th>
               <td><input type="time"  name="timeEvent" placeholder ="Time" value="<?php echo $data['timeEvent'] ?>"  /></td>
           </tr>  

           <tr>
             <input type="hidden" name="eventId" value="<?= $eventId; ?>">
               <td><button  type= "submit">Save Changes</button ></td>
               <td><a  href= "eventAdmin.php"><button  type="button" >Back</button ></a ></td >
           </tr>
       </table>
   </form >

</fieldset >

</body >
</html >

<?php
}
?>