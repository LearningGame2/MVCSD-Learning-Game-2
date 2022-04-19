<?php

  $conn = mysqli_connect("localhost","fishell1","S219352","Game2");
  session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT StudentID FROM UserDatabase WHERE Username = '$myusername' and Passcode = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         //$_SESSION['login_user'] = $myusername;
         $error = "Login Sucessful";
         header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Game.php");
      }else {
         $error = "Your Login Name or Password is invalid";
 
      }
   }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset = "UTF-8">
    <title> Validated Login Form</title>
    <link rel="stylesheet" href="LoginStyle.css">
</head>

<body>
  <div class ="container" style = "position:relative;top:-10px;">
    <h1 style="text-align:center; color:white; font-family:'Courier New', monospace; font-size:350%; position:relative; top:-10px;">
      Welcome Back!
    </h1>
    <h4 style="text-align:center; color:white; font-family:'Courier New', monospace; font-size:150%; position:relative; top:-10px;">
      To stay connected with us, please sign in.
    </h4>
    <form class="login_form" autocomplete="off" action = "" method="post" name="form" onsubmit= "validated(); return false;">
        <div class ="font" style="font-family:'Courier New', monospace; font-size:125%;">Username</div>
        <input type="text" name = "email">
        <div id = "email_error">Incorrect</div>
        <div class ="font font2" style="font-family:'Courier New', monospace; font-size:125%;">Password</div>
        <input type="password" name = "password">
        <div id = "pass_error">Incorrect</div>
        <button type = "submit" style="font-family:'Courier New', monospace;">Sign In</button>
    </form>
  </div>
</body>

<script src="validate.js"></script>

</html>
