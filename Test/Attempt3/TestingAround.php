<?php

function connect() {
$conn = mysqli_connect("localhost","fishell1","S219352","Game2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
return $conn;
}//Connection Function





$rowNumber = rand(1,300);




function promptRequest(){
  
    $conn = connect();//Connect
    $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";//sql code
    if ($result = mysqli_query($conn, $sql)) {
     
        while ($row = mysqli_fetch_row($result)) {

	      $prompt = $row[1];
          
        }
        mysqli_free_result($result);
      
    mysqli_close($conn);//close connection

      return $prompt;
      }
}

function correctRequest(){
  $correct = "";
    $conn = connect();//Connect
    $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";//sql code
    if ($result = mysqli_query($conn, $sql)) {
     
        while ($row = mysqli_fetch_row($result)) {

	      $correct = $row[2];
          
        }
        mysqli_free_result($result);
      
    mysqli_close($conn);//close connection

      return $correct;
      }
}

function wrong1Request(){
  $wrong1 = "";
    $conn = connect();//Connect
    $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";//sql code
    if ($result = mysqli_query($conn, $sql)) {
     
        while ($row = mysqli_fetch_row($result)) {

          $wrong1 = $row[3];
          
        }
        mysqli_free_result($result);
      
    mysqli_close($conn);//close connection

      return $wrong1;
      }
}

function wrong2Request(){
  $wrong2 = "";
    $conn = connect();//Connect
    $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";//sql code
    if ($result = mysqli_query($conn, $sql)) {
     
        while ($row = mysqli_fetch_row($result)) {

          $wrong2 = $row[4];
          
        }
        mysqli_free_result($result);
      
    mysqli_close($conn);//close connection

      return $wrong2;
      }
}

function wrong3Request(){
  $wrong3 = "";
    $conn = connect();//Connect
    $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";//sql code
    if ($result = mysqli_query($conn, $sql)) {
     
        while ($row = mysqli_fetch_row($result)) {

          $wrong3 = $row[5];
          
        }
        mysqli_free_result($result);
      
    mysqli_close($conn);//close connection

      return $wrong3;
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
  var phpCorrect = "<?php echo correctRequest(); ?>"
  var phpWrong1 = "<?php echo wrong1Request(); ?>"
  var phpWrong2 = "<?php echo wrong2Request(); ?>"
  var phpWrong3 = "<?php echo wrong3Request(); ?>"
  
  

  console.log(phpadd +" = phpadd");
  console.log("\nQuestion = "+ phpQuestion + "\nCorrect Response= "+ phpCorrect +"\nWrong Answer 1 = "+ phpWrong1 +"\nWrong Answer 2 = "+ phpWrong2 +"\nWrong Answer 3 = "+ phpWrong3);
  // console.log("\nCorrect answer = "+ phpCorrect);
  // console.log("\nWrong1 = "+ phpWrong1);
  // console.log("\nWrong2 = "+ phpWrong2);
  // console.log("\nWrong3 = "+ phpWrong3);

</script>

</html>