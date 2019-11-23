<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: userLanding.php" ); // redirects to home.php
}
include_once 'dbconnect.php';
// in this MEGA IF STATEMENT you can put all the keys in order to make the page to comunicate the commands. 
 
if ( isset($_POST['btn-signup']) ) {
 $error = false;

 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);
  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);
  // strip_tags — strips HTML and PHP tags from a string
  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);


// Now im creating and extra input for the SIGN UP


  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } elseif(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }




 // password hashing for security
$password = hash('sha256' , $pass);

 // if there's no error, continue to signup
 if( !$error ) {
  
 $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
  unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
  
 }


}
?>
<!DOCTYPE html> 
<html>
<head>
<title>Login & Registration System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
  
      
           <div class="jumbotron jumbotron-fluid registerJumbo">
  <div class="container registerheader">
    <h1 class="display-4">Sign Up</h1>
    <h2>Discover the beautiful country of Austria. Learn more about its famous sights, enjoy yourself at a great concert or eat a tradional austrian dish.</h2>
  </div>
</div>
          
            <?php
   if ( isset($errMSG) ) {
  
   ?> 
           <div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       </div>

<?php 
  }
  ?> 
          
      
          

            <input type ="text"  name="name"  class ="form-control"  placeholder ="Enter Name"  maxlength ="50"   value = "<?php echo $name ?>"  />
      
               <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >
          
    

            <input   type = "email"   name = "email"   class = "form-control"   placeholder = "Enter Your Email"   maxlength = "40"   value = "<?php echo $email ?>"  />
    
               <span   class = "text-danger" > <?php   echo  $emailError; ?> </span >
      
          
      
            
        
            <input   type = "password"   name = "pass"   class = "form-control"   placeholder = "Enter Password"   maxlength = "15" value="<?= $pass ?>" />
            
               <span   class = "text-danger" > <?php   echo  $passError; ?> </span><br>


            
        

          
            <button   type = "submit"   class = "btn btn-block"   name = "btn-signup" >Sign Up</button><br>
            
          
            <a   href = "index.php" >Sign in Here...</a>
    
  
   </form >
</body >
</html >
<?php  ob_end_flush(); ?>