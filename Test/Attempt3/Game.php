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
    $sql = "SELECT * FROM QuestionDatabase";
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_row($result)) {
          printf ("%s (%s)\n", $row[0], $row[1]);
        }
        mysqli_free_result($result);
      }
      
      mysqli_close($con);
   ?>


    
</body>
<script>

</script>

</html>