<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    Login Sucessful
  </title>

  <style>
    .button {
      text-align: center;
      background-color: #197DDD;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    .button1 {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 40%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button2 {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 60%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    header.page-header {
    display: flex;
    height: 50px;
    min-width: 120px;
    align-items: center;
    color: black;
    }
  </style>
</head>

<header class="page-header">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <h1 style="text-align:center; color:white;">
    MVCSD
  </h1>
</header>

<body style="background-color:black;">
  <div style = "text-align:center; position:relative; top:500px; color:white;">
     This div has relative positioning.
  </div>
  <h2 style="text-align:center; color:white;">Press button to play </h2>

  <button type ="submit" onclick = "goToGame()" class="button button1">Play</button>
  <button type ="submit" onclick = "logOut()" class="button button2">Log out</button>
</body>

<script>
  function goToGame(){
    window.location.href = "Game.php"
  }
  function logOut(){
    window.location.href = "Login1.html"
  }
</script>

</html>
