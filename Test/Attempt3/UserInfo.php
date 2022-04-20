<?php
  function connect() {
    $conn = mysqli_connect("localhost","fishell1","S219352","Game2");

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    return $conn;
  }//Connection Function

  function userRequest($myusername){
      $conn = connect();
      $sql = "SELECT * FROM UserDatabase WHERE Username = '$myusername'";
        if ($result = mysqli_query($conn, $sql)) {
          $user = mysqli_fetch_row($result);
          mysqli_free_result($result);
          mysqli_close($conn);
        }
    return json_encode($user);
  }//Request User's Name
?>
