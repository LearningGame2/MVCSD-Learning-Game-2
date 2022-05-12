<!DOCTYPE html>
<html lang="en">

<title>Instructions</title>

<style>
    body{
      margin:100px;
      background-color: #4158D0;
      background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
    }
    img {
      border: 5px solid white;
    }
    .button {
      text-align: center;
      background-color:#0093E9;
      border: 2px solid white;
      border-radius:12px;
      color: white;
      padding: 15px 32px;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      font-family: "Lucida Console", "Courier New", monospace;
      font-size: 24px;
      font-weight: bold;
      height:100px;
      width:400px;
      transition-duration: 0.4s;
    }
    .button1 {
      margin: 0;
      position:absolute;
      top:100px;
      -ms-transform:translate(-50%, -50%);
      transform:translate(-50%, -50%);
    }
    .button1:hover {
      background-color:#2ECC71;
    }
    .heading{
        position:relative;
        margin-top:100px;
        font-family: "Lucida Console", "Courier New", monospace;
    }
    .container {
      border: 2px solid white;
      border-radius:12px;
      padding: 15px 32px;
      background-color:#0093E9;
      background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
    }
</style>

<body>

    <div style="text-align:center; top:100px;">
        <button type="submit" onclick="returnHome()" class="button button1">Return Home!</button>
    </div>

  <div class="container">
    <div style="position:relative;">
        <h1 class="heading">
            You're gonna want to read this...
        </h1>
    </div>

    <div style="margin-left:30px; position:relative; font-size:22px; font-family: 'Lucida Console', 'Courier New', monospace;">
        <p>
            The levels of the game are pretty self-explanatory: you've all taken multiple-choice questions before!
            This is all math that you know, and we're asking you to apply it.  In between levels, you'll play 4 games:
            Packabunchas, HexGL, Astronaut, and Duck Hunt, which are described below and have instructions.
            All of them, except Packabunchas, will add a multiplier to your score that depends on how well you do in the game:
            for HexGL, the time you finish under 5 minutes, for Astronaut, the number of ships you jump, and for Duck Hunt,
            how many points you score in the game divided by 500.  However, you don't get to play these games if you don't
            work hard!  You have to score well enough on each level before a game in order to play it.  We'll let you
            find out how well...now go flex those mathematical muscles!
        </p>
    </div>
  </div>

  <h1 style="position:relative; top:20px; font-family: 'Lucida Console', 'Courier New', monospace;">Instructions:</h1>
    <div style="margin-left:30px; position:relative; top:20px; font-size:22px; font-family: 'Lucida Console', 'Courier New', monospace;">
    <div class="container">
        <h3> Packabunchas: fit the shapes into the box! </h3>
        <div style="text-align:center; top:200px;">
            <img src="./LG2Images/Packabunchas.jpg" width="331" height="609">
        </div>
        <ul>
            <li>Double click on a shape to rotate (make sure you click hard on your Chromebooks!)
            <li>Click and drag shapes into the box so that they cover all the empty squares and don't go outside of the box
            <li>Tips: start with sections that only certain pieces could fill, if a piece doesn't work in an orientation,<br>
            take them out and try each one by one, and keep at it!  They all have at least one solution.
            <li>You receive a 3x multiplier for getting to this game — if you did well enough on rounding to reach it
        </ul>
      </div>
        <br>
    <div class="container">
        <h3> Astronaut: You have one objective — survive in the vacuum of space. </h3>
        <div style="text-align:center; top:200px;">
            <img src="./LG2Images/AstronautInTrouble.jpg" width="659" height="408">
        </div>
        <ul>
            <li>Press space to jump, and not too early!
            <li>Don't fall between the ships
        </ul>
    </div>
        <br>
    <div class="container">
        <h3> HexGL: keep your spaceship on track and don't crash... </h3>
        <div style="text-align:center; top:200px;">
            <img src="./LG2Images/HexGL.jpg" width="719" height="409">
        </div>
        <ul>
            <li>Press up arrow key to increase engine power
            <li>Use side arrow keys to navigate the course
            <li>You only have a limited amount of health and you can't get it back, so be cautious rather than speedy!<br>
                Otherwise, you won't get a score multiplier
        </ul>
    </div>
        <br>
  <div class="container">
        <h3> Duck Hunt: This one's a classic.  You know the drill. </h3>
        <div style="text-align:center; top:200px;">
            <img src="./LG2Images/DuckHunt.jpg" width="720" height="449">
        </div>
        <ul>
            <li>Click to shoot the ducks
            <li>Don't waste your ammo
            <li>See if you can hit two with one shot!
        </ul>
  </div>

  </div>

    <br><br>
</body>

<script>
    function returnHome(){
        window.location.href="Home.php";
    }
</script>

</html>
