<!DOCTYPE html>
<html lang = "en">

<head>
    <link rel = "stylesheet">
    <title>
        About us
    </title>
    <link rel="icon" type="image/x-icon" href="../LGAttempt3/LG2Images/KenyonLogo.ico">
</head>

<style>
    body{
      margin:100px;
      background-color: #4158D0;
      background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
      font-family: "Lucida Console", "Courier New", monospace;
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
        font-family: "Gill Sans", sans-serif;
    }
    .games{
        margin-left: -35px;
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

    <div style="text-align:center;">
        <button type="submit" onclick="returnHome()" class="button button1">Return Home!</button>
    </div>

    <div class="container" style="position:relative; top:100px;">
    <div>
        <h1 class="heading">Some background info on this project:</h1>
    </div>

    <div style="margin-left:30px; font-size:22px; position:relative;">
      <p>
        This website was produced by 3 students of Kenyon College: Connor Dailey, Mason Fishell, and Sam Rabieh, for the class Software
        and Systems Design with Professor James Skon.  It is a collaboration with Wiggin St. Elementary School, created for the learning
        and enjoyment of Ms. Brenneman's fifth grade class.  Most Tuesdays of February — March 2022, we came in and discussed programming,
        what's important in good game design, and what questions we should actually put in the game.
      <p>
    </div>

    <div style="margin-left:30px; font-size:22px; position:relative;">
      <p>
        However, this would not have been possible coding entirely on our own from the ground up.  We did a lot of hard work putting together
        the different parts of our project — and believe us, there are a lot of parts to it — and we wrote the code for the actual website all
        by ourselves, but we implemented the structure of the quiz and the minigames from open-source code we found elsewhere online.  We
        found the code for a quiz game and started working with it just to learn a few things, and both we and the students really liked it
        so we stuck with that design.  A few weeks before the end of the semester, we finally got our MySQL database to connect with the
        website to allow users to log in and get randomized questions through the phpMyAdmin interface.  Then it was time to decide how we
        could make it better and more fun to use.  We don't have much experience working with graphics, so we didn't want to waste time trying
        to build a game ourselves from scratch, especially if it might not be that good in the end.  We implemented 4 games to keep it fun in
        between the levels of the quiz, and we think we succeeded.  Enjoy!
      </p>
    </div>
  </div>

  <br><br>

  <div class="container" style="position:relative; top:100px;">
    <h1 style="position:relative;">Credits:</h1>
    <div style="margin-left:30px; position:relative; font-size:22px;">
        <ul class="games">
            <li>Packabunchas, a colorful puzzle game by Mattia Fortunati
            <li>Astronaut in Trouble, a simple pixel side-scroller by Douglas Lopes
            <li>HexGL, a futuristic HTML5 racing game by BKCore / Thibault Despoulain
            <li>Duck Hunt, a classic Nintendo game remade for the web browser experience by Matt Surabian
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
