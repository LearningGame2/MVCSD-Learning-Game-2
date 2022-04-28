<?php
session_start();
if(intval($_COOKIE['Checkpoint'])!=5){
    header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Home.php");
}


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
    for($x = 9; $x >=0; $x--){
        if($playerScore > $scores[$x]['Highscore']){
            $checkLeaderboardScore = $x;
            break;
        }
    }

    if($checkLeaderboardScore >= 0 && $checkLeaderboardScore<= 9){ //Leaderboard      also changed this from else if to if
        $conn = connect();
        $sql = "DELETE FROM Leaderboard WHERE Username = '$deleteName' and Highscore = '$deleteScore'"; //changed Highscore from Passcode (vestigial from copied code?)
        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        }
        else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        //changed login to be in double quotes...maybe chaining ' ' and " " is the problem?  idk this code feels like it should work
        //i know SESSION login already wasn't working but login was blue and not orange when we had ' ' whereas it was orange in Home.php
        $seshLogin = $_COOKIE['Username'];
        $sql = "INSERT INTO Leaderboard (Username, Highscore) VALUES ('$seshLogin', '$playerScore')";
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

?>




<<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    Game Over
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
      width: 400px;
      transition-duration: 0.4s;
      border: 2px solid white;
    }
    .button:hover {
      background-color: green;
    }
  </style>
</head>

<body style="background-color:black">
    <h1 style="text-align:center; color:white; font-family:Garamond; font-size:350%;"> GAME OVER! </h1>
    <h1 style="text-align:center; color:white; font-family:Garamond; font-size:350%;"> FINAL SCORE: <span id = "final-score"></span> </h1>
    <h1 style="text-align:center; color:white; font-family:Garamond; font-size:350%;"> HIGHEST STREAK: <span id = "high-streak"></span> </h1>
    <div style="text-align:center;">
        <h1 style="color:white;"> Good Try, <?php echo $_COOKIE['Username'] ?>!</h1>
    </div>
    <div>
        <h1><span id = "update-leaderboard-message"></span></h1>
    </div>
    <div style="text-align:center;">
      <button onclick = "goHome()" class="button">Return Home</button> <!--change before tuesday pres...maybe?-->
    </div>

</body>

<script>

let cookieScore = "cookieScore"
let playerScore = parseInt(getCookie(cookieScore))
document.getElementById("final-score").innerHTML = playerScore //changed this from gEBID("player-streak")

let cookieHighStreak = "cookieHighStreak"
let playerHighStreak = parseInt(getCookie(cookieHighStreak))
document.getElementByID("high-streak").innerHTML = playerHighStreak

let UpdateLeaderboard = parseInt('<?php checkUpdateLeaderboard() ?>')
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
