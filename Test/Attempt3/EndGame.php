<?php
session_start();
if(intval($_COOKIE['Checkpoint'])!=5){
    header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Home.php");
}
setcookie("Checkpoint",6);



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



function leaderboardRequest(){ //called by checkUpdateLeaderboard below
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
  return $scores;
}


function checkUpdateLeaderboard(){
    $scores = leaderboardRequest(); //calls leaderboardRequest above
    $playerScore = intval($_COOKIE["cookieScore"]); //changed from intval( $_COOKIE["cookieScore"])
    $checkLeaderboardScore = -1; //keep track of whether to add to Leaderboard
    $deleteScore = $scores[0]['Highscore'];
    $deleteName = $scores[0]['Username'];
    $deleteID = $scores[0]['GameID'];
    for($x = 9; $x >=0; $x--){
        if($playerScore > $scores[$x]['Highscore']){
            $checkLeaderboardScore = $x;
            break;
        }
    }

    if($checkLeaderboardScore >= 0 && $checkLeaderboardScore<= 9){ //Leaderboard
        $conn = connect();
        $sql = "DELETE FROM Leaderboard WHERE Username = '$deleteName' and Highscore = '$deleteScore' and GameID = '$deleteID'"; //Delete worst one
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        }
        else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        $sql = "UPDATE Leaderboard SET Newest = '0' WHERE Newest = '1'";//Making previous newest no longer newest
        if (mysqli_query($conn, $sql)) {
          echo "Record edit successfully";
        }
        else {
          echo "Error editing record: " . mysqli_error($conn);
        }




        $seshLogin = $_COOKIE['Username'];
        $sql = "INSERT INTO Leaderboard (Username, Highscore, Newest) VALUES ('$seshLogin', '$playerScore','1')";
        if (mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        }
        else {
            echo "Error inserting record: " . mysqli_error($conn);
        }
        mysqli_close($conn);


        //Return conditionals
        if($checkLeaderboardScore==9){//All time new highscore!!!!11!!1!!!
            return 2;
        }
        else{return 1;}//On leaderboard, respectable dude

    }

    else if($checkLeaderboardScore < 0){ // Did not make leaderboard, rip bozo
        return 0;
    }
}

function checkIndividualStats(){
  $conn = connect();
  $returnValue = 0;
  $usernameStats = $_COOKIE['Username'];
  $sql = "SELECT * FROM UserDatabase WHERE Username = '$usernameStats'";
  $result = mysqli_query($conn,$sql);
  $stats = mysqli_fetch_assoc($result);
  $StudentID = $stats['StudentID'];
  $checkDBScore = $stats['Highscore'];
  $checkDBStreak = $stats['LongestStreak'];

  $playerScore = intval($_COOKIE['cookieScore']);
  $playerStreak = intval($_COOKIE['cookieHighStreak']);



  if($playerScore> $checkDBScore){
    $returnValue = $returnValue + 1;
    $sql = "UPDATE UserDatabase SET Highscore = '$playerScore' WHERE StudentID = '$StudentID'";
    if (mysqli_query($conn, $sql)) {
      echo "Record edit successfully";
  }
  else {
      echo "Error editing record: " . mysqli_error($conn);
  }
  }


  if($playerStreak > $checkDBStreak){
    $returnValue = $rturnValue + 2;
    $sql = "UPDATE UserDatabase SET LongestStreak = '$playerStreak' WHERE StudentID = '$StudentID'";
    if (mysqli_query($conn, $sql)) {
      echo "Record edit successfully";
  }
  else {
      echo "Error editing record: " . mysqli_error($conn);
  }
  }

  mysqli_close($conn);

  return $returnValue;
}

?>




<<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    Game Over
  </title>
  <style>
    body {
      background-color: #4158D0;
      background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
    }
    .button {
      text-align: center;
      background-color:#0093E9;
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
      width: 400px;
      transition-duration: 0.4s;
      border: 2px solid white;
    }
    .button:hover {
      background-color:#2ECC71;
    }
    .container {
      border: 2px solid white;
      border-radius:12px;
      padding: 15px 32px;
      background-color:#0093E9;
      background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
    }
  </style>

</head>

<body>
    <h1 style="text-align:center; color:white; font-family: 'Lucida Console', 'Courier New', monospace; font-size:350%;"> GAME OVER! </h1>
    <div class="container">
      <h3 style="text-align:center; color:white; font-family: 'Lucida Console', 'Courier New', monospace; font-size:250%;"> FINAL SCORE: <span id = "final-score"></span> </h3>
      <h3 style="text-align:center; color:white; font-family: 'Lucida Console', 'Courier New', monospace; font-size:250%;"> HIGHEST STREAK: <span id = "high-streak"></span> </h3>
      <div style="text-align:center;">
          <h1 style="color:white; font-family: 'Lucida Console', 'Courier New', monospace;"> Good Try, <?php echo $_COOKIE['Username'] ?>!</h1>
      </div>
    </div>
    <div>
        <h1><span id = "update-leaderboard-message"></span></h1>
    </div>
    <div style="text-align:center;">
      <button onclick = "goHome()" class="button">Return Home</button>
    </div>

</body>

<script>

let cookieScore = "cookieScore"
let playerScore = parseInt(getCookie(cookieScore))
document.getElementById("final-score").innerHTML = playerScore //changed this from gEBID("player-streak")
//sam error noticed: console.log says this is not a function ^^

let cookieHighStreak = "cookieHighStreak"
let playerHighStreak = parseInt(getCookie(cookieHighStreak))
document.getElementById("high-streak").innerHTML = playerHighStreak
//changed from ID to Id

let UpdateLeaderboard = parseInt('<?php checkUpdateLeaderboard() ?>')
let UpdateIndividualStats = parseInt('<?php checkIndividualStats() ?>')

console.log("update leaderboard message: " + UpdateLeaderboard);
if(UpdateLeaderboard == 0){
    document.getElementById("update-leaderboard-message").innerHTML = "Awesome Job!"
}
else if(UpdateLeaderboard == 1){
    document.getElementById("update-leaderboard-message").innerHTML = "You made it onto the leaderboard!! Fantastic run!!!"
}
else if(UpdateLeaderboard == 2){
    document.getElementById("update-leaderboard-message").innerHTML = "NEW ALL TIME HIGH SCORE!!!!"
}


function setCookie(cname, cvalue) {
        document.cookie = cname + "=" + cvalue + ";"
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

function goHome(){
    window.location.href = "Home.php"
}

</script>

</html>
