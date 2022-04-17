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
          background-color: #4CAF50;
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
        .center {
          margin: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;">Logged in!</h1>
    <h2 style="text-align:center;">Press button to play </h2>
    <button type ="submit" onclick = "goToGame()" class="button;center">Play</button>
    <button type ="submit" onclick = "logOut()" class="button">Log out</button>
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
