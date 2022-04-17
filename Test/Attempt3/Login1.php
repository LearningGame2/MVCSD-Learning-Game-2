<?php
function connect() {
  $conn = mysqli_connect("localhost","fishell1","S219352","Game2");
  
  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
  }
  return $conn;
}//Connection Function   



function userLogInRequest(){
  return 69;

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
    <h1 style="text-align:center; color:white; font-family:Fantasy; font-size:350%; position:relative; top:-10px;">
      Welcome Back!
    </h1>
    <h4 style="text-align:center; color:white; font-family:Fantasy; font-size:150%; position:relative; top:-10px;">
      To stay connected with us, please sign in.
    </h4>
    <form class="login_form" autocomplete="off" action = "" method="post" name="form" onsubmit= "validated(); return false;">
        <div class ="font" style="font-family:Fantasy; font-size:125%;">Username</div>
        <input type="text" name = "email">
        <div id = "email_error">Incorrect</div>
        <div class ="font font2" style="font-family:Fantasy; font-size:125%;">Password</div>
        <input type="password" name = "password">
        <div id = "pass_error">Incorrect</div>
        <button type = "submit">Sign In</button>
    </form>
  </div>
</body>

<script>

var UsersData = '<?php echo userLogInRequest();?>'
console.log(UsersData);

var email = document.forms['form']['email'];
var password = document.forms['form']['password'];

var email_error = document.getElementById('email_error');
var pass_error = document.getElementById('pass_error');

email.addEventListener('textInput', email_verify);
password.addEventListener('textInput', pass_verify); 

function validated(){
    if(email.value.length >8 & password.value.length >5){
        window.location.href = "Home.php";
        return false;
    }
    if(email.value.length < 9){
        email.style.border = "1px solid red";
        email_error.style.display= "block";
        email.focus();
        return false;
    }
    if(password.value.length < 6){
        password.style.border = "1px solid red";
        pass_error.style.display= "block";
        password.focus(); 
        return false;
    }


}
function email_verify(){
    if(email.value.length >=8){
        email.style.border = "1px solid silver";
        email_error.style.display= "none";
        return true;
        
    }
}
function pass_verify(){
    if(password.value.length >5){
        password.style.border = "1px solid silver";
        pass_error.style.display= "none";
        return true;
    }
}


</script>

</html>
