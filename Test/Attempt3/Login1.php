<?php
include 'UserInfo.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset = "UTF-8">
  <title>Login Form</title>
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
      <label style="color:white;"> Username: </label><input type = "text" name = "username" class = "box"/><br /><br />
      <label style="color:white;"> Password: </label><input type = "password" name = "password" class = "box" /><br/><br />
      <input type = "submit" value = " Submit " syle="text-align:center; color:blue; position:relative; left:50%"/><br />
    </form>

    <div style = "font-size:11px; color:red; margin-top:10px; text-align:center; position:relative; left:50%">
      <?php echo $error; ?>
    </div>
  </div>
</body>

</html>
