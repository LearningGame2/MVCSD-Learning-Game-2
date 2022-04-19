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
      $user = $myusername

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
