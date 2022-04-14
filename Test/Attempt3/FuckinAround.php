<?php
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
    
    <title>Login Sucessful
    </title>
</head>
<body>
    <h1>Logged in!!!</h1>
    <h2>Press button to play </h2>
    <button type ="submit" onclick = "goToGame()">Play</button>
    
</body>
<script>
  var phpadd= <?php echo add(1,2);?> //call the php add function
  var phpmult= <?php echo mult(1,2);?> //call the php mult function
  var phpdivide= <?php echo divide(1,2);?> //call the php divide function

  console.log(phpadd+" = phpadd");
</script>

</html>