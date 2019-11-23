<?php echo '
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="nav text-white text-decoration-none pr-3" href="adminpanel.php"> Restaurants</a> 
  <a class="nav text-white text-decoration-none pr-3" href="placeAdmin.php"> Places</a>
  <a class="nav text-white text-decoration-none" href="eventAdmin.php"> Events</a> 
   
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
       <li class="nav-item">
         <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"> Welcome '.$userRow["userName"]. '</a>  
      </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_text" id="search_text">
    </form>
    <form class="form-inline my-2 my-lg-0 border-0">
      <button class="btn text-white bg-dark my-2 my-sm-0 border-0" type="submit"><a class="text-decoration-none" href="logout.php?logout">Sign Out</a></button>
    </form>
  </div>
</nav>'
?>