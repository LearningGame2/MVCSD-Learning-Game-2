<?php

function connect() {
$conn = mysqli_connect("localhost","fishell1","S219352","Game2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
return $conn;
}//Connection Function


function promptRequest(){
    
  $rowNumber = rand(1,300);

  
    $prompt = "";
      $conn = connect();
      $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";
      if ($result = mysqli_query($conn, $sql)) {
       
          $row = mysqli_fetch_row($result);
  
    //      $prompt = $row[1];
            
          
          mysqli_free_result($result);
       
       mysqli_close($conn);
  
        return json_encode($row);
        }
}




//Example add function to make sure shit works
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
    
    <title>TEST
    </title>
</head>
<body>
    <h1>Testin Around!</h1>
    <h2>Press button to play </h2>
   
    
</body>
<script>
  var phpadd= <?php echo add(1,2);?> //call the php add function
  var phpmult= <?php echo mult(1,2);?> //call the php mult function
  var phpdivide= <?php echo divide(1,2);?> //call the php divide function



  var phpQuestion = "<?php echo promptRequest();?>"
  

  console.log(phpadd +" = phpadd");
  // console.log("\nCorrect answer = "+ phpCorrect);
  // console.log("\nWrong1 = "+ phpWrong1);
  // console.log("\nWrong2 = "+ phpWrong2);
  // console.log("\nWrong3 = "+ phpWrong3);

</script>

</html>