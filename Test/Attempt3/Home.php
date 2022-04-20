
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


}



function leaderboardRequest(){
  $scores = array();
  
  $conn = connect();
  $sql = "SELECT * FROM Leaderboard";
  $result = mysqli_query($conn,$sql);
  for ($x = 0; $x < 10; $x++) {
    $scores[$x] = mysqli_fetch_assoc($result);
  }


  function cmp($a, $b)
  {
    if ($a[1] == $b[1]) {
        return 0;
    }
    if ($a[1] > $b[1]) {
      return 1;
  }
   if ($a[1] < $b[1]) {
    return -1;
  }


  $sortedScores = usort($scores, "cmp");

  return json_encode($sortedScores);


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
      top: 50%;
      left: 40%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .button2 {
      margin: 0;
      position: absolute;
      top: 50%;
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
  </style>
</head>

<header class="page-header">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <h1 style="text-align:left; color:white;">
    Welcome <?php echo $_SESSION['login']?>!
  </h1>
</header>

<body style="background-color:black;">
  <div style = "text-align:center; position:relative; top:150px; font-size:48px; color:white;">
     Press Button to Play
  </div>

  <button type ="submit" onclick = "goToGame()" class="button button1">Play</button>
  <button type ="submit" onclick = "logOut()" class="button button2">Log out</button>
</body>

<script>
  var testScores = JSON.parse('<?php echo leaderboardRequest();?>');
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

