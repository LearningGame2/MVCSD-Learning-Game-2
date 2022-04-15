<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Login Sucessful
    </title>
</head>
<body>
    <h1 style="text-align:center">Logged in!!!</h1>
    <h2>Press button to play </h2>
    <button type ="submit" onclick = "goToGame()">Play</button>
    <button type ="submit" onclick = "logOut()">Log out</button>
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
