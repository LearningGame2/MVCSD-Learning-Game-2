<?php

$conn = mysqli_connect("localhost","fishell1","S219352","Game2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


//Prompt and answer request functions

  function promptRequest($rowNumber){
    

//connection

  $prompt = "";
    $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";
    if ($result = mysqli_query($conn, $sql)) {
     
        while ($row = mysqli_fetch_row($result)) {
          $prompt = $row[1];
          
        }
        mysqli_free_result($result);
      }
      mysqli_close($con);
      return $prompt;
}

// function correctRequest($row){
//   $conn = mysqli_connect("localhost","fishell1","S219352","Game2");

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// }
// //Connection


//   $sql = "SELECT CorrectResponse FROM QuestionDatabase WHERE QuestionNumber = " . $row;
//   if ($result = mysqli_query($conn, $sql)) {
//       while ($row = mysqli_fetch_row($result)) {
//         $correctResponse = $row[0];
//       }
//       mysqli_free_result($result);
//     }
//     mysqli_close($con);
//     return $correctResponse;
// }

// function wrong1Request($row){
//   $conn = mysqli_connect("localhost","fishell1","S219352","Game2");

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// }
// //Connection

  
//   $sql = "SELECT WrongResponse1 FROM QuestionDatabase WHERE QuestionNumber = " . $row;
//   if ($result = mysqli_query($conn, $sql)) {
//       while ($row = mysqli_fetch_row($result)) {
//         $wrongResponse1 = $row[0];
//       }
//       mysqli_free_result($result);
//     }
    
//     mysqli_close($con);
//     return $wrongResponse1;
// }

// function wrong2Request($row){
//   $conn = mysqli_connect("localhost","fishell1","S219352","Game2");

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// }
// //Connection

  
//   $sql = "SELECT WrongResponse2 FROM QuestionDatabase WHERE QuestionNumber = " . $row;
//   if ($result = mysqli_query($conn, $sql)) {
//       while ($row = mysqli_fetch_row($result)) {
//         $wrongResponse2 = $row[0];
//       }
//       mysqli_free_result($result);
//     }
    
//     mysqli_close($con);
//     return $wrongResponse2;
// }

// function wrong3Request($row){
//   $conn = mysqli_connect("localhost","fishell1","S219352","Game2");

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// }
// //Connection

  
//   $sql = "SELECT WrongResponse3 FROM QuestionDatabase WHERE QuestionNumber = " . $row;
//   if ($result = mysqli_query($conn, $sql)) {
//       while ($row = mysqli_fetch_row($result)) {
//         $wrongResponse3 = $row[0];
//       }
//       mysqli_free_result($result);
//     }
  
//     mysqli_close($con);
//     return $wrongResponse3;
// }





    

function add($a,$b){
  $c=$a+$b;
  return $c;
}
function mult($a,$b){
  $c=$a*$b;
  return $c;
}

function divide($a,$b){
  $c=$a/$b;
  return $c;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>FUCKCKKKKK
    </title>
</head>
<body>
    <h1>Fuckin Around!</h1>
    <h2>Press button to play </h2>
   
    
</body>
<script>
  var phpadd= <?php echo add(1,2);?> //call the php add function
  var phpmult= <?php echo mult(1,2);?> //call the php mult function
  var phpdivide= <?php echo divide(1,2);?> //call the php divide function
  var phpQuestion = <?php echo promptRequest(1); ?>
  
  



  console.log(phpadd +" = phpadd");
  console.log("\nQuestion = "+ phpQuestion);
  // console.log("\nCorrect answer = "+ phpCorrect);
  // console.log("\nWrong1 = "+ phpWrong1);
  // console.log("\nWrong2 = "+ phpWrong2);
  // console.log("\nWrong3 = "+ phpWrong3);

</script>

</html>