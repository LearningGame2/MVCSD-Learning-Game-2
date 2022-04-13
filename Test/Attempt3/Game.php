<?php
include_once 'connection.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Game 
    </title>
</head>
<body>
   <?php 
        $sql = "SELECT * FROM QuestionDatabase";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_all($result,MYSQLI_ASSOC)){
            echo $row['Prompt'];
        }
   ?>


    
</body>
<script>

</script>

</html>