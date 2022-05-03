<?php

  $conn = mysqli_connect("localhost","fishell1","S219352","Game2");
  session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

      $sql = "SELECT * FROM UserDatabase WHERE Username = '$myusername' and Passcode = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
        $GovernmentName = $row['GovernmentName'];
        $DatabaseUsername =$row['Username'];
         setcookie("GovernmentName", $GovernmentName, time() + (3600)); 
         setcookie("Username", $DatabaseUsername, time() + (3600)); 
        
         $error = "Login Sucessful";
         header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Home.php");
      }else {
         $error = "Your login name or password is invalid.";

      }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset = "UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="LoginStyle.css">
</head>

<body>
  <div class ="container" style = "position:relative; top:-10px;">
    <h1 style="text-align:center; color:white; font-family:Garamond; font-size:350%; position:relative; top:-10px;">
      Welcome Back!
    </h1>
    <h4 style="text-align:center; color:white; font-family:Garamond; font-size:150%; position:relative; top:-10px;">
      To stay connected with us, please sign in.
    </h4>
    <form action = "" method = "post" class="login_form" autocomplete="off" name="form">
      <label style="color:white; font-family:Garamond"> Username: </label><input type = "text" name = "username" class = "box"/><br /><br />
      <label style="color:white; font-family:Garamond"> Password: </label><input type = "password" name = "password" class = "box" /><br/><br />
      <button type = "submit" value = " Submit ">Submit</button>
    </form>
    <form class = "login_form">
      <button type = "submit" id = "welcome-back-button" onclick = "login()">Log in as <span id = "welcome-back-text"></span></button>
   </form>
    <div style = "font-size:30px; color:red; margin-top:10px; text-align:center; position:relative; left:0%">
      <?php echo $error; ?>
    </div>
  </div>
</body>
<script>

  let GovernmentName = getCookie("GovernmentName");
  let Username = getCookie("Username");
  console.log(GovernmentName);
  console.log(Username);
  console.log("test")
  let resetBtn=document.getElementById("welcome-back-button");
  if(GovernmentName != "" && Username != ""){
   document.getElementById("welcome-back-text").innerHTML = GovernmentName;
   resetBtn.hidden = false;

  }
  else if(GovernmentName== "" || Username == ""){
    resetBtn.disabled="disabled";
    resetBtn.hidden = true;
    console.log("disabled")
  }

  function login(){
    if(GovernmentName != null && Username != null){
    setCookie("GovernmentName",GovernmentName, 1);
    setCookie("Username",Username, 1);
    window.location.href = "Home.php"
    }
  }
   

  function setCookie(cname, cvalue, exhours) {
  const d = new Date();
  d.setTime(d.getTime() + (exhours*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
         return "";
  }
</script>
</html>
