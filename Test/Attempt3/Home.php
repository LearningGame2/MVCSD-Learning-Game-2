<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link src="Home.css;" rel="stylesheet;">
  <title>
    Login Sucessful
  </title>
</head>

<body style="background-color:black;">
  <div>
    <h1 style="text-align:center; color:white;">
      <span style="float:left; font-family:Copperplate">
        MVCSD
      </span>
      <span style="float:right; font-family:Copperplate">
        <a href="#">Home</a>
        &nbsp;
        <a href="#">Log In</a>
        &nbsp;
        <a href="#">About</a>
        &nbsp;
        <a href="#">Contact</a>
        &nbsp;
        <a href="#">Info</a>
        &nbsp;
      </span>
    </h1>
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
