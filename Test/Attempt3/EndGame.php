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
        $sql = "INSERT INTO Leaderboard (Username, Highscore) VALUES ('$_SESSION["login"]', '$playerScore')";
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
    <h1>END SCREEN </h1>
    <button onclick = "goHome()">Go Home Loser</button> <!--change before tuesday pres...maybe?-->
    <h1> FINAL SCORE: <span id = "final-score"></span></h1>
    <div>
        <h1><span id = "update-leaderboard-message"></span></h1>
    </div>


<script>

let cookieScore = "cookieScore"    
let playerScore = parseInt(getCookie(cookieScore))
document.getElementById("final-score").innerHTML = playerScore //changed this from gEBID("player-streak")

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