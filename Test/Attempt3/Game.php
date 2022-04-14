<?php
$conn = new mysqli("localhost","fishell1","S219352","Game2");

if ($conn -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
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
      if ($result = $conn-> query("SELECT * FROM QuestionDatabase WHERE QuestionNumber = 1")) {
        echo "Returned rows are: " . $result -> num_rows;
        // Free result set
        $result -> free_result();
      }
      echo $result;
      $mysqli -> close();
   ?>


    
</body>
<script>

</script>

</html>