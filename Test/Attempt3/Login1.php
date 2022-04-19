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
         header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Home.php");
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
    <form action = "" method = "post" class="login_form" autocomplete="off" name="form">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
   <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
  </div>
</body>
</html>