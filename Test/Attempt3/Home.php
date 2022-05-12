
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


//PULL INDIVIDUAL STATS
$conn = connect();
setcookie("TEST", 9, time()+(3600));

$Username = $_COOKIE['Username'];
$sql = "SELECT * FROM UserDatabase WHERE Username = '$Username'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$AllTimeScore =$row['Highscore'];
$AllTimeStreak =$row['LongestStreak'];

setcookie("AllTimeScore", $AllTimeScore, time() + (3600));
setcookie("AllTimeStreak", $AllTimeStreak, time() + (3600));

mysqli_close($conn);
//PULL INDIVIDUAL STATS


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






?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    Learning Game 2
  </title>

  <style>
    .container {
      width:100%;
      height:100%
    }
    .button {
      text-align: center;
      background-color:#DAA520;
      border-radius: 12px;
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
      width:250px;
      transition-duration: 0.4s;
      border: 2px solid white;
    }
    .button1 {
      margin: 0;
      position:absolute;
      top: 30%;
      left: 20%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button2 {
      margin: 0;
      position:absolute;
      top: 30%;
      left: 40%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button3 {
      margin: 0;
      position:absolute;
      top: 30%;
      left: 60%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button4 {
      margin: 0;
      position:absolute;
      top: 30%;
      left: 80%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button1:hover {
      background-color:#2ECC71;
    }
    .button2:hover {
      background-color:#2ECC71;
    }
    .button3:hover {
      background-color:#2ECC71;
    }
    .button4:hover {
      background-color:crimson;
    }
    .header {
	     padding:25px;
	     overflow:hidden;
	     height:100%;
       color:white;
       width: 100%;
       font-size: 28px;
       font-weight:bold;
       font-family: "Lucida Console", "Courier New", monospace;
	  }
    .slide-right {
      overflow: hidden;
      animation: 2s slide-right;
      animation-delay: 0s;
    }
    @keyframes slide-right {
      from {
        margin-left: -500px;
      }

      to {
        margin-left: 0%;
      }
    }
    table, th, td {
      border: 2px solid white;
      border-radius:8px;
      border-collapse: collapse;
      margin-top:auto;
      margin-left:auto;
      width:500px;
      text-align:center;
      font-size:23px;
      color:white;
      background-color:rgb(64, 0, 128);
      font-family: "Lucida Console", "Courier New", monospace;
    }
    .alignRight{
      position: absolute;
      top:360px;
      right:10%;
    }
    .alignLeft{
      position: absolute;
      top:360px;
      left:10%;
    }
    .inLine{
      display:inline-block;
    }
  </style>
</head>

<body style="background-color:#0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
  <div class="containter">
  <div class="header slide-right">
    Welcome,  <?php echo $_COOKIE['GovernmentName']?>!
  </div>

  <div style = "text-align:center; position:relative; top:10px; font-weight:bold; font-size:48px; color:white; font-family: 'Lucida Console', 'Courier New', monospace;">
     Press Button to Play
  </div>

  <div>
    <button type ="submit" onclick = "goToGame()" class="button button1">Play</button>
    <button type ="submit" onclick = "instructions()" class="button button2">Instructions<br>— read this!</button>
    <button type ="submit" onclick = "aboutUs()" class="button button3">About Us</button>
    <button type ="submit" onclick = "logOut()" class="button button4">Log out</button>
  </div>


  <div class="inLine" style = "text-align:center; position:absolute; top:300px; left:220px; font-weight:bold; font-size:48px; color:white; font-family: 'Lucida Console', 'Courier New', monospace;">
     <span> Leaderboard </span>
     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     <span> Your Stats </span>
  </div>

  <table class="alignLeft inLine">
    <tr>
      <th>Rank</th>
      <th>Player</th>
      <th>Score</th>
    </tr>
    <tr>
      <td style = "font-size:35px; color:gold;"><span id="newleft1"></span>1<span id="newright1"></span></td>
      <td><span style = "font-size:35px; color:gold;" id="player1"></span></td>
      <td><span style = "font-size:35px; color:gold;" id="score1"></span></td>

    </tr>
    <tr>
      <td style = "font-size:30px; color:silver;"><span id="newleft2"></span>2<span id="newright2"></span></td>
      <td><span style = "font-size:30px; color:silver;" id="player2"></span></td>
      <td><span style = "font-size:30px; color:silver;" id="score2"></span></td>
    </tr>
    <tr>
      <td style = "font-size:25px; color:#CD7F32;"><span id="newleft3"></span>3<span id="newright3"></span></td>
      <td><span style = "font-size:25px; color:#CD7F32;" id="player3"></span></td>
      <td><span style = "font-size:25px; color:#CD7F32;" id="score3"></span></td>
    </tr>
    <tr>
      <td><span id="newleft4"></span>4<span id="newright4"></span></td>
      <td><span id="player4"></span></td>
      <td><span id="score4"></span></td>
    </tr>
    <tr>
      <td><span id="newleft5"></span>5<span id="newright5"></span></td>
      <td><span id="player5"></span></td>
      <td><span id="score5"></span></td>

    </tr>
    <tr>
      <td><span id="newleft6"></span>6<span id="newright6"></span></td>
      <td><span id="player6"></span></td>
      <td><span id="score6"></span></td>

    </tr>
    <tr>
      <td><span id="newleft7"></span>7<span id="newright7"></span></td>
      <td><span id="player7"></span></td>
      <td><span id="score7"></span></td>

    </tr>
    <tr>
      <td><span id="newleft8"></span>8<span id="newright8"></span></td>
      <td><span id="player8"></span></td>
      <td><span id="score8"></span></td>

    </tr>
    <tr>
      <td><span id="newleft9"></span>9<span id="newright9"></span></td>
      <td><span id="player9"></span></td>
      <td><span id="score9"></span></td>

    </tr>
    <tr>
      <td><span id="newleft10"></span>10<span id="newright10"></span></td>
      <td><span id="player10"></span></td>
      <td><span id="score10"></span></td>

    </tr>
  </table>


  <table class="alignRight inLine">

        <tr>
            <td> <span id = "IfPreviousScore"></span> </td>
        </tr>
        <tr>
            <td> <span id = "IfPreviousStreak"></span> </td>
        </tr>

        <tr class="break"><td colspan="2"></td></tr>

        <tr>
            <td>All time highscore: <span id = "AllTimeScore"></span> </td>
        </tr>
        <tr>
            <td>All time longest streak: <span id = "AllTimeStreak"></span> </td>
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

  if(testScores[0].Newest == 1){
  document.getElementById("newright10").innerHTML = "*";
  document.getElementById("newleft10").innerHTML = "*";
  console.log("Tenth entry");
  }
  if(testScores[1].Newest == 1){
  document.getElementById("newright9").innerHTML = "*";
  document.getElementById("newleft9").innerHTML = "*";
  console.log("Ninth entry");
  }
  if(testScores[2].Newest == 1){
  document.getElementById("newright8").innerHTML = "*";
  document.getElementById("newleft8").innerHTML = "*";
  console.log("Eighth entry");
  }
  if(testScores[3].Newest == 1){
  document.getElementById("newright7").innerHTML = "*";
  document.getElementById("newleft7").innerHTML = "*";
  console.log("Seventh entry");
  }
  if(testScores[4].Newest == 1){
  document.getElementById("newright6").innerHTML = "*";
  document.getElementById("newleft6").innerHTML = "*";
  console.log("Sixth entry");
  }
  if(testScores[5].Newest == 1){
  document.getElementById("newright5").innerHTML = "*";
  document.getElementById("newleft5").innerHTML = "*";
  console.log("Fifth entry");
  }
  if(testScores[6].Newest == 1){
  document.getElementById("newright4").innerHTML = "*";
  document.getElementById("newleft4").innerHTML = "*";
  console.log("Fourth entry");
  }
  if(testScores[7].Newest == 1){
  document.getElementById("newright3").innerHTML = "*";
  document.getElementById("newleft3").innerHTML = "*";
  console.log("Third entry");
  }
  if(testScores[8].Newest == 1){
  document.getElementById("newright2").innerHTML = "*";
  document.getElementById("newleft2").innerHTML = "*";
  console.log("Second entry");
  }
  if(testScores[9].Newest == 1){
  document.getElementById("newright1").innerHTML = "*";
  document.getElementById("newleft1").innerHTML = "*";
  console.log("First entry");
  }





  if(getCookie("cookieScore")!= 0){
    document.getElementById("IfPreviousScore").innerHTML = "Your Last Score: " + parseInt(getCookie("cookieScore"));
  }
  if(getCookie("cookieScore")== 0){
    document.getElementById("IfPreviousScore").innerHTML = "No score recorded yet";
  }
  if(getCookie("cookieHighStreak")!= 0){
    document.getElementById("IfPreviousStreak").innerHTML = "Your Last Highest Streak: " + getCookie("cookieHighStreak");
  }
  if(getCookie("cookieHighStreak")== 0){
    document.getElementById("IfPreviousStreak").innerHTML = "No streak recorded yet";
  }

  document.getElementById("AllTimeScore").innerHTML = parseInt(getCookie("AllTimeScore"));
  document.getElementById("AllTimeStreak").innerHTML = parseInt(getCookie("AllTimeStreak"));


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
  function aboutUs(){
    window.location.href = "More.php"
  }
  function instructions(){
    window.location.href = "Instructions.php"
  }
</script>

</html>
