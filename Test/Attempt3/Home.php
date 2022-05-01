
<?php

session_start();
setcookie("Checkpoint", 0);

if(!isset($_COOKIE['Username'])){
  header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Login1.php");
} //Comment out to make less annoying




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
  mysqli_close($conn);
  return json_encode($scores);
}

// function getName() {
//   $conn = connect();
//   $currentUser = $_SESSION['login'];
//   $sql = "SELECT DISTINCT GovernmentName FROM UserDatabase WHERE Username = '$currentUser'";
//   $result = mysqli_query($conn,$sql);
//   return $result;
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    Learning Game 2
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
      width:250px;
      transition-duration: 0.4s;
      border: 2px solid white;
    }
    .button1 {
      margin: 0;
      position: absolute;
      top: 30%;
      left: 40%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button2 {
      margin: 0;
      position: absolute;
      top: 30%;
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
      border: 2px solid white;
      border-collapse: collapse;
      margin-top:auto;
      margin-left:auto;
      width:40%;
      text-align:center;
      font-size:23px;
      font-family: "Lucida Console", "Courier New", monospace;
    }
    .center {
      margin-left: auto;
      margin-right: auto;
      margin-top:200px
    }
  </style>
</head>

<header class="page-header">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <h1 style="text-align:center; color:white;">
    Welcome,  <?php echo $_COOKIE['Username']?>!
  </h1>
    <span style="float:right">
      <a href="More.php">
        Learn More About Us
      </a>
    </span>
</header>

<body style="background-color:black;">
  <div style = "text-align:center; position:relative; top:30px; font-size:48px; color:white;">
     Press Button to Play
  </div>
  <div>
  <button type ="submit" onclick = "goToGame()" class="button button1">Play</button>
  <button type ="submit" onclick = "logOut()" class="button button2">Log out</button>
  </div>
  <div style = "text-align:center; position:relative; top:185px; font-size:48px; color:white;">
     Leaderboard
  </div>
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
  <div style = "text-align:center; position:relative; top:185px; font-size:48px; color:white;">
     <span id = "IfPreviousScore"> </span>
  </div>
  <div style = "text-align:center; position:relative; top:185px; font-size:48px; color:white;">
     <span id = "IfPreviousStreak"> </span>
  </div>
</div>
</body>

<script>
  console.log(document.cookie)
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

  if(getCookie("cookieScore")!= null){
    document.getElementById("IfPreviousScore").innerHTML = "Your Last Score: " + parseInt(getCookie("cookieScore"));
  }
  if(getCookie("cookieHighStreak")!= null){
    document.getElementById("IfPreviousScore").innerHTML = "Your Last Highest Streak: " + getCookie("cookieHighStreak");
  }


  function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
         return "";
  }

  console.log(testScores);
  function goToGame(){
    window.location.href = "Level1.php"
  }
  function logOut(){
    window.location.href = "Login1.php"
    <?php session_destroy(); ?>
  }

</script>

</html>
