<?php

include './components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

// ----------------------------------------------------------------------
$pass='';
$cpass='';
$name='';
$email='';

if(isset($_POST['submit'])){

   // Validate name
    if(preg_match("/^([a-zA-Z' ]+)$/",$_POST['name'])){  
        $name= $_POST['name'];
        $name = htmlspecialchars($name, ENT_QUOTES);
       }else{
           $message[]= "Name must contain only alphabets and space";
       }

   // Validate email
   if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = $_POST['email'];
      $email = htmlspecialchars($email, ENT_QUOTES);
   }
   else{
      $message[] = "Please Enter Your Valid Email Address";
   }
   // Validate password
  if(preg_match('^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^',$_POST['pass']))
  {
   $pass = sha1($_POST['pass']);
     $pass =htmlspecialchars($pass, ENT_QUOTES);
 
  }
  else 
  {
   $message[]='Invalid Password';
  }
  
  $cpass = sha1($_POST['cpass']);
  $cpass = htmlspecialchars($cpass, ENT_QUOTES);


     if($name!='' && $email!='' && $pass!='' && $cpass!='')
     {
      $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_user->execute([$email]);
      $row = $select_user->fetch(PDO::FETCH_ASSOC);
   
      if($select_user->rowCount() > 0){
         $message[] = 'email already exists!';
      }else{

         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'registered successfully, login now please!';
      }
   }

         if( $pass != $cpass){
            $message[] = 'confirm password not matched!';
         }
         else{
            $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
            $insert_user->execute([$name, $email, $cpass]);
            $message[] = 'registered successfully, login now please!';
            header('location: user_login.php');

         }
      }
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
       body{      
            background-image: url("./project\ images/Untitled__4_-removebg-preview.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: left ;
            background-position-x: -70em;
         }

   </style>

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container" style="padding-bottom: 7em; padding-top: 7em;">

   <form action="" method="post" auto_complete="off">
      <h3>register now</h3>
      <input type="text" name="name" id="name" required placeholder="enter your username" class="box" onchange="checkname()">
      <p id="fnerror" style="color: red; float:left; font-size:12px;"></p>
      <input type="email" name="email" id="email" required placeholder="enter your email" class="box" onchange="checkemail()">
      <p id="mlerror" style="color: red; float:left; font-size:12px;"></p>
      <input type="password" name="pass" id="pass" required placeholder="enter your password" class="box" onchange="checkpass()">
      <p id="passerr" style="color: red; float:left; font-size:12px;"></p>
      <input type="password" name="cpass" id="cpass" required placeholder="confirm your password" class="box" onchange="recheckpass()">
      <p id="repasserr" style="color: red; float:left; font-size:12px;"></p>
      <input type="submit" value="register now" class="btn btn_login_now" name="submit">
      <div><pre> </pre></div>
      <a href="user_login.php" class="btn-first-time">already have an account?Login</a>
   </form>

</section>



<?php include 'components/footer.php'; ?>

<!-- <script src="js/script.js"></script> -->
<!-- <script src="js/register.js"></script> -->

</body>
</html>