<?php
//fetch.php


session_start();
$connect = mysqli_connect("localhost", "root", "", "cr11_mate_bugar_travelmatic");
$output = '';
$i = 0;
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM place
  WHERE name LIKE '".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM place
  ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{

 while($row = mysqli_fetch_array($result))
 {
  echo  "
                     <div class='col-lg-3 col-md-4 col-sm-6 my-4 cardBook'>
                   <div class='card  border-0 cardMain' style='width: 18rem ;'>
                   <img src=".$row['image']."class='card-img-top'>
                   <div class='card-body text-center'>
                    <h3 class='card-title'>" .$row['name']."</h3>
                    
                          

                       
                      <a><button type='button' class='btn' data-toggle='modal' data-target='#exampleModal2".$i."'>
                          More info
                        </button></a><br><hr>
                        <a href='updatePlace.php?id=" .$row['placeId']."'><button type='button'>Edit</button></a>
                           <a href='deletePlace.php?id=" .$row['placeId']."'><button type='button'>Delete</button></a>
                           <hr>
                  </div>
                </div>
                </div>



<!-- Button trigger modal -->


<!-- Modal -->
<div class='modal  fade' id='exampleModal2".$i."'tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>About this place</h5>
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
                    
                          <p>".$row['address' ]."</p><hr>
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
 