<?php
$conn = mysqli_connect("localhost","fishell1","S219352","Game2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>BigGamerGuy 
    </title>
</head>
<h1>Playing Game</h1>
<body>
    
   <?php
    $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = 3";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_row($result)) {
          $prompt = $row[1];
          $corr = $row[2];
          $wr1 = $row[3];
          $wr2 = $row[4];
          $wr3 = $row[5];
          echo $prompt;
          echo $corr;
          echo $wr1;
          //printf ("%s (%s) (%s)\n", $row[0], $row[1], $row[3]);
        }
        mysqli_free_result($result);
      }
      
      mysqli_close($con);
   ?>


    
</body>
<script>

</script>

</html>