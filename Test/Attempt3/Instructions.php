<!DOCTYPE html>
<html lang="en">
    <title>Getting Started</title>

    <style>
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
      border: 2px solid white;
    }
    .button1 {
      margin: 0;
      position:absolute;
      top:100px;
      right:-100px;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button1:hover {
      background-color: green;
    }
    .thing{
        position:relative;
        margin-top:100px;
        font-family: "Gill Sans", sans-serif;
    }
    .lvls{
        position:relative;
        margin-top:25px;
        font-family: "Trebuchet MS", sans-serif;
    }
    .how-to-play{
        position:relative;
        font-family:"Trebuchet MS", sans-serif;
    }


    </style>

    <button type="submit" onclick="phoneHome()" class="button button1">Take me back home!</button>
   
    <h1 class="thing">
        You're gonna wanna read this...
    </h1>

    <div class="lvls">
        <body>
            The levels of the game are pretty self-explanatory: you've all taken multiple-choice questions before!<br>
            This is all math that you know, and we're asking you to apply it.  In between levels, you'll play 4 games:<br>
            Packabunchas, HexGL, Astronaut, and Duck Hunt, which are described below and have instructions.<br>
            All of them, except Packabunchas, will add a multiplier to your score that depends on how well you do in the game: <br>
            for HexGL, the time you finish under 5 minutes, for Astronaut, the number of ships you jump, and for Duck Hunt,<br>
            how many points you score in the game divided by 500.  However, you don't get to play these games if you don't<br>
            work hard!  You have to score well enough on each level before a game in order to play it.  We'll let you<br>
            find out how well...now go flex those mathematical muscles!
        </body>
    </div>
    <br><br>
    <h2>Instructions</h2>
    <div class="how-to-play">
        <body>
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
        </body>
    </div>

    <script>
        function phoneHome(){
            window.location.href="Home.php";
        }
    </script>


</html>