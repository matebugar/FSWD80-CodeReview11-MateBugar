<?php  
  session_start();

  require_once 'dbconnect.php';

  $sql = "SELECT * FROM restaurant";
  $result = mysqli_query($conn, $sql);

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

        table td a {
          text-decoration: none;
        }
   </style>
</head>
<body>

   <?php include_once "navbar.php" ?>

   



<fieldset>
   <legend>Insert media</legend>

   <form  action="actions/a_createRes.php" method= "post">
       <table cellspacing= "0" cellpadding="0">
           <tr>
               <th>Name</th>
               <td><input  type="text" name="name"  placeholder="Name"/></td>
           </tr>    
           <tr>
               <th>Address</th>
               <td><input  type="text" name="address" placeholder="Address"/></td>
           </tr>
            <tr>
               <th>Type</th>
               <td><input  type="text" name="type" placeholder="Type"/></td>
           </tr>
            <tr>
               <th>Zip code</th>
               <td><input  type="text" name="zip_code" placeholder="Zip code"/></td>
           </tr>
           <tr>
               <th>City</th>
               <td><input type="text"  name="city" placeholder ="City"/></td>
           </tr>
           <tr>
               <th>Descript</th>
               <td><input type="text"  name="descript" placeholder ="Descript"/></td>
           </tr>
           

           <tr>
               <th>Image</th>
               <td><input type="text"  name="image" placeholder ="Image" /></td>
           </tr>
           <tr>
               <td><button type ="submit">Insert media</button></td>
               <td><a href= "adminpanel.php"><button  type="button">Back</button></a></td>
           </tr>
       </table>
   </form>

</fieldset>

</body>
</html>