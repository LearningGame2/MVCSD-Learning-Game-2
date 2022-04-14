<?php
function connect() {
    $conn = mysqli_connect("localhost","fishell1","S219352","Game2");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $conn;
    }//Connection Function
    
    
    
    
    
function promptRequest($rowNumber){
      $prompt = "";
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
    
function correctRequest($rowNumber){
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
    
function wrong1Request($rowNumber){
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
    
function wrong2Request($rowNumber){
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
    
function wrong3Request($rowNumber){
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

?>

<head>
  <link rel="stylesheet" href="Game.css">
</head>

<body onload="NextQuestion(0)">
  <h1 style="background-color:black; color:white; text-align:center; font-family:courier new; font-size:300%; line-height: 100px">
    Learning Game 2
  </h1>
    <main>
        <!-- creating a modal for when quiz ends -->
        <div class="modal-container" id="score-modal">

            <div class="modal-content-container">

                <h1>Congratulations, Quiz Completed.</h1>

                <div class="grade-details">
                    <p>Attempts : 10</p>
                    <p>Wrong Answers : <span id="wrong-answers"></span></p>
                    <p>Right Answers : <span id="right-answers"></span></p>
                    <p>Grade : <span id="grade-percentage"></span>%</p>
                    <p ><span id="remarks"></span></p>
                </div>

                <div class="modal-button-container">
                    <button onclick="closeScoreModal()">Continue</button>
                </div>

            </div>
        </div>
<!-- end of modal of quiz details-->

        <div class="game-quiz-container" style = "position:relative; top:-75px">

            <div class="game-details-container">
                <h1>Score : <span id="player-score"></span> / 10</h1>
                <h1> Question : <span id="question-number"></span> / 10</h1>
            </div>

            <div class="game-question-container">
                <h1 id="display-question"></h1>
            </div>

            <div class="game-options-container">

               <div class="modal-container" id="option-modal">

                    <div class="modal-content-container">
                         <h1>Please Pick An Option</h1>

                         <div class="modal-button-container">
                            <button onclick="closeOptionModal()">Continue</button>
                        </div>

                    </div>

               </div>

                <span>
                    <input type="radio" id="option-one" name="option" class="radio" value="optionA" />
                    <label for="option-one" class="option" id="option-one-label"></label>
                </span>


                <span>
                    <input type="radio" id="option-two" name="option" class="radio" value="optionB" />
                    <label for="option-two" class="option" id="option-two-label"></label>
                </span>


                <span>
                    <input type="radio" id="option-three" name="option" class="radio" value="optionC" />
                    <label for="option-three" class="option" id="option-three-label"></label>
                </span>


                <span>
                    <input type="radio" id="option-four" name="option" class="radio" value="optionD" />
                    <label for="option-four" class="option" id="option-four-label"></label>
                </span>


            </div>

            <div class="next-button-container">
                <button onclick="handleNextQuestion()">Submit</button>
            </div>

        </div>
    </main>
    <script src="Game.js"></script>
</body>
