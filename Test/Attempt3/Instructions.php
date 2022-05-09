<!DOCTYPE html>
<html lang="en">

<title>Instructions</title>

<style>
    body{
      margin:100px;
    }
    .button {
      text-align: center;
      background-color: #197DDD;
      border: none;
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
      background-color:green;
    }
    .heading{
        position:relative;
        margin-top:100px;
        font-family: "Gill Sans", sans-serif;
    }
</style>

<body>

    <div style="text-align:center;">
        <button type="submit" onclick="returnHome()" class="button button1">Return Home!</button>
    </div>

    <div style="position:relative; top:100px;">
        <h1 class="heading">
            You're gonna want to read this...
        </h1>
    </div>

    <div style="margin-left:30px; position:relative; top:100px;">
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

    <br><br>

    <h2 style="position:relative; top:100px;">Instructions:</h2>
    <div style="margin-left:30px; position:relative; top:100px;">
        Packabunchas: fit the shapes into the box!
        <ul>
            <li>Double click on a shape to rotate (make sure you click hard on your Chromebooks!)
            <li>Click and drag shapes into the box so that they cover all the empty squares and don't go outside of the box
            <li>Tips: start with sections that only certain pieces could fill, if a piece doesn't work in an orientation,<br>
            take them out and try each one by one, and keep at it!  They all have at least one solution.
            <li>You receive a 3x multiplier for getting to this game — if you did well enough on rounding to reach it
        </ul>
        <br>
        HexGL: keep your spaceship on track and don't crash...
        <ul>
            <li>Press up arrow key to increase engine power
            <li>Use side arrow keys to navigate the course
            <li>You only have a limited amount of health and you can't get it back, so be cautious rather than speedy!<br>
                Otherwise, you won't get a score multiplier
        </ul>
        <br>
        Astronaut: You have one objective — survive in the vacuum of space.
        <ul>
            <li>Press space to jump, and not too early!
            <li>Don't fall between the ships
        </ul>
        <br>
        Duck Hunt: This one's a classic.  You know the drill.
        <ul>
            <li>Click to shoot the ducks
            <li>Don't waste your anmo
            <li>See if you can hit two with one shot!
        </ul>
    </div>

    <br><br>
</body>

<script>
    function returnHome(){
        window.location.href="Home.php";
    }
</script>

</html>
