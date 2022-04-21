
<?php

session_start();

// if(!isset($_SESSION['login'])){
//   header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Login1.php");
// } //Comment out to make less annoying


function connect() {
  $conn = mysqli_connect("localhost","fishell1","S219352","Game2");

  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
  }
  return $conn;
}//Connection Function



function leaderboardRequest(){
  $scores = array();

  $conn = connect();
  $sql = "SELECT * FROM Leaderboard";
  $result = mysqli_query($conn,$sql);
  for ($x = 0; $x < 10; $x++) {
    $scores[$x] = mysqli_fetch_assoc($result);
  }
  usort($scores, function($a, $b) {
    return $a['Highscore'] <=> $b['Highscore'];
  });
  return json_encode($scores);
}


?>

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
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      font-size: 24px;
      height:100px;
      width:200px;
      transition-duration: 0.4s;
      border: 2px solid white;
    }
    .button1 {
      margin: 0;
      position: absolute;
      top: 35%;
      left: 40%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button2 {
      margin: 0;
      position: absolute;
      top: 35%;
      left: 60%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button1:hover {
      background-color: green;
    }
    .button2:hover {
      background-color: red;
    }
    header.page-header {
    display: flex;
    height: 50px;
    min-width: 120px;
    align-items: center;
    color: black;
    }
    table, th, td {
      border: 1px solid white;
      border-collapse: collapse;
      margin-top:auto;
      margin-left:auto;
      width:40%;
      text-align:center;
      font-size:20;
      font-family: "Times New Roman", Times, serif;
    }
    .center {
      margin-left: auto;
      margin-right: auto;
      margin-top:250px
    }
  </style>
</head>

<header class="page-header">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <h1 style="text-align:center; color:white;">
    Welcome <?php echo $_SESSION['login']?>!
  </h1>
</header>

<body style="background-color:black;">
  <div style = "text-align:center; position:relative; top:50px; font-size:48px; color:white;">
     Press Button to Play
  </div>

  <button type ="submit" onclick = "goToGame()" class="button button1">Play</button>
  <button type ="submit" onclick = "logOut()" class="button button2">Log out</button>
  <div>
  <table style = "color:white;" class="center">
  <tr>
    <th>Player</th>
    <th>Score</th>
  </tr>
  <tr>
    <td><span id="player1"></span></td>
    <td><span id="score1"></span></td>
  </tr>
  <tr>
    <td><span id="player2"></span></td>
    <td><span id="score2"></span></td>
  </tr>
  <tr>
    <td><span id="player3"></span></td>
    <td><span id="score3"></span></td>
  </tr>
  <tr>
    <td><span id="player4"></span></td>
    <td><span id="score4"></span></td>
  </tr>
  <tr>
    <td><span id="player5"></span></td>
    <td><span id="score5"></span></td>
  </tr>
  <tr>
    <td><span id="player6"></span></td>
    <td><span id="score6"></span></td>
  </tr>
  <tr>
    <td><span id="player7"></span></td>
    <td><span id="score7"></span></td>
  </tr>
  <tr>
    <td><span id="player8"></span></td>
    <td><span id="score8"></span></td>
  </tr>
  <tr>
    <td><span id="player9"></span></td>
    <td><span id="score9"></span></td>
  </tr>
  <tr>
    <td><span id="player10"></span></td>
    <td><span id="score10"></span></td>
  </tr>
</table>
</div>
</body>

<script>
  var testScores = JSON.parse('<?php echo leaderboardRequest();?>');

  document.getElementById("player1").innerHTML = testScores[9].Username;
  document.getElementById("score1").innerHTML = testScores[9].Highscore;

  document.getElementById("player2").innerHTML = testScores[8].Username;
  document.getElementById("score2").innerHTML = testScores[8].Highscore;

  document.getElementById("player3").innerHTML = testScores[7].Username;
  document.getElementById("score3").innerHTML = testScores[7].Highscore;

  document.getElementById("player4").innerHTML = testScores[6].Username;
  document.getElementById("score4").innerHTML = testScores[6].Highscore;

  document.getElementById("player5").innerHTML = testScores[5].Username;
  document.getElementById("score5").innerHTML = testScores[5].Highscore;

  document.getElementById("player6").innerHTML = testScores[4].Username;
  document.getElementById("score6").innerHTML = testScores[4].Highscore;

  document.getElementById("player7").innerHTML = testScores[3].Username;
  document.getElementById("score7").innerHTML = testScores[3].Highscore;

  document.getElementById("player8").innerHTML = testScores[2].Username;
  document.getElementById("score8").innerHTML = testScores[2].Highscore;

  document.getElementById("player9").innerHTML = testScores[1].Username;
  document.getElementById("score9").innerHTML = testScores[1].Highscore;

  document.getElementById("player10").innerHTML = testScores[0].Username;
  document.getElementById("score10").innerHTML = testScores[0].Highscore;

  console.log(testScores);
  function goToGame(){
    window.location.href = "Game.php"
  }
  function logOut(){
    window.location.href = "Login1.php"
    <?php session_destroy(); ?>
  }

</script>

</html>
