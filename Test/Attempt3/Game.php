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
<script>

function fillQuestions(){ 
    const questions = [
        //Question 1
            {
                question: "",
                optionA: "",
                optionB: "",
                optionC: "",
                optionD: "",
                correctOption: ""
            },
        //Question 2
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 3
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 4
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 5
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 6
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 7
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 8
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 9
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        },
        //Question 10
        {
            question: "",
            optionA: "",
            optionB: "",
            optionC: "",
            optionD: "",
            correctOption: ""
        }
]; 

 // QUESTION 0 

    var phpPrompt0 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt0 = JSON.parse(phpPrompt0);
    console.log(prompt0);
    questions[0].question = prompt0[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[0].optionA = prompt0[2];
        questions[0].optionB = prompt0[3];
        questions[0].optionC = prompt0[4];
        questions[0].optionD = prompt0[5];
        questions[0].correctOption ="optionA";
    }
    if(j == 2){
        questions[0].optionA = prompt0[5];
        questions[0].optionB = prompt0[2];
        questions[0].optionC = prompt0[3];
        questions[0].optionD = prompt0[4];
        questions[0].correctOption = "optionB";
    } 
    if(j == 3){
        questions[0].optionA = prompt0[4];
        questions[0].optionB = prompt0[5];
        questions[0].optionC = prompt0[2];
        questions[0].optionD = prompt0[3];
        questions[0].correctOption = "optionC";
    }
    if(j == 4){
        questions[0].optionA = prompt0[3];
        questions[0].optionB = prompt0[4];
        questions[0].optionC = prompt0[5];
        questions[0].optionD = prompt0[2];
        questions[0].correctOption = "optionD";
    }

   

  // QUESTION 1

  var phpPrompt1 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt1= JSON.parse(phpPrompt1);
    console.log(prompt1);
    questions[1].question = prompt1[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[1].optionA = prompt1[2];
        questions[1].optionB = prompt1[3];
        questions[1].optionC = prompt1[4];
        questions[1].optionD = prompt1[5];
        questions[1].correctOption ="optionA";
    }
    if(j == 2){
        questions[1].optionA = prompt1[5];
        questions[1].optionB = prompt1[2];
        questions[1].optionC = prompt1[3];
        questions[1].optionD = prompt1[4];
        questions[1].correctOption = "optionB";
    } 
    if(j == 3){
        questions[1].optionA = prompt1[4];
        questions[1].optionB = prompt1[5];
        questions[1].optionC = prompt1[2];
        questions[1].optionD = prompt1[3];
        questions[1].correctOption = "optionC";
    }
    if(j == 4){
        questions[1].optionA = prompt1[3];
        questions[1].optionB = prompt1[4];
        questions[1].optionC = prompt1[5];
        questions[1].optionD = prompt1[2];
        questions[1].correctOption = "optionD";
    }
    
// QUESTION 2

  var phpPrompt2 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt2= JSON.parse(phpPrompt2);
    console.log(prompt2);
    questions[2].question = prompt2[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[2].optionA = prompt2[2];
        questions[2].optionB = prompt2[3];
        questions[2].optionC = prompt2[4];
        questions[2].optionD = prompt2[5];
        questions[2].correctOption ="optionA";
    }
    if(j == 2){
        questions[2].optionA = prompt2[5];
        questions[2].optionB = prompt2[2];
        questions[2].optionC = prompt2[3];
        questions[2].optionD = prompt2[4];
        questions[2].correctOption = "optionB";
    } 
    if(j == 3){
        questions[2].optionA = prompt2[4];
        questions[2].optionB = prompt2[5];
        questions[2].optionC = prompt2[2];
        questions[2].optionD = prompt2[3];
        questions[2].correctOption = optionC";
    }
    if(j == 4){
        questions[2].optionA = prompt2[3];
        questions[2].optionB = prompt2[4];
        questions[2].optionC = prompt2[5];
        questions[2].optionD = prompt2[2];
        questions[2].correctOption = "optionD";
    }

 // QUESTION 3

 var phpPrompt3 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt3= JSON.parse(phpPrompt3);
    console.log(prompt3);
    questions[3].question = prompt3[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[3].optionA = prompt3[2];
        questions[3].optionB = prompt3[3];
        questions[3].optionC = prompt3[4];
        questions[3].optionD = prompt3[5];
        questions[3].correctOption ="optionA";
    }
    if(j == 2){
        questions[3].optionA = prompt3[5];
        questions[3].optionB = prompt3[2];
        questions[3].optionC = prompt3[3];
        questions[3].optionD = prompt3[4];
        questions[3].correctOption = "optionB";
    } 
    if(j == 3){
        questions[3].optionA = prompt3[4];
        questions[3].optionB = prompt3[5];
        questions[3].optionC = prompt3[2];
        questions[3].optionD = prompt3[3];
        questions[3].correctOption = "optionC";
    }
    if(j == 4){
        questions[3].optionA = prompt3[3];
        questions[3].optionB = prompt3[4];
        questions[3].optionC = prompt3[5];
        questions[3].optionD = prompt3[2];
        questions[3].correctOption = "optionD";
    }
    
 // QUESTION 4

 var phpPrompt4 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt4= JSON.parse(phpPrompt4);
    console.log(prompt4);
    questions[4].question = prompt4[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[4].optionA = prompt4[2];
        questions[4].optionB = prompt4[3];
        questions[4].optionC = prompt4[4];
        questions[4].optionD = prompt4[5];
        questions[4].correctOption ="optionA";
    }
    if(j == 2){
        questions[4].optionA = prompt4[5];
        questions[4].optionB = prompt4[2];
        questions[4].optionC = prompt4[3];
        questions[4].optionD = prompt4[4];
        questions[4].correctOption = "optionB";
    } 
    if(j == 3){
        questions[4].optionA = prompt4[4];
        questions[4].optionB = prompt4[5];
        questions[4].optionC = prompt4[2];
        questions[4].optionD = prompt4[3];
        questions[4].correctOption = "optionC";
    }
    if(j == 4){
        questions[4].optionA = prompt4[3];
        questions[4].optionB = prompt4[4];
        questions[4].optionC = prompt4[5];
        questions[4].optionD = prompt4[2];
        questions[4].correctOption = "optionD";
    }

   // QUESTION 5

   var phpPrompt5 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt5= JSON.parse(phpPrompt5);
    console.log(prompt5);
    questions[5].question = prompt5[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[5].optionA = prompt5[2];
        questions[5].optionB = prompt5[3];
        questions[5].optionC = prompt5[4];
        questions[5].optionD = prompt5[5];
        questions[5].correctOption ="optionA";
    }
    if(j == 2){
        questions[5].optionA = prompt5[5];
        questions[5].optionB = prompt5[2];
        questions[5].optionC = prompt5[3];
        questions[5].optionD = prompt5[4];
        questions[5].correctOption = "optionB";
    } 
    if(j == 3){
        questions[5].optionA = prompt5[4];
        questions[5].optionB = prompt5[5];
        questions[5].optionC = prompt5[2];
        questions[5].optionD = prompt5[3];
        questions[5].correctOption = "optionC";
    }
    if(j == 4){
        questions[5].optionA = prompt5[3];
        questions[5].optionB = prompt5[4];
        questions[5].optionC = prompt5[5];
        questions[5].optionD = prompt5[2];
        questions[5].correctOption = "optionD";
    }
 // QUESTION 6

 var phpPrompt6 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt6= JSON.parse(phpPrompt6);
    console.log(prompt6);
    questions[6].question = prompt6[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[6].optionA = prompt6[2];
        questions[6].optionB = prompt6[3];
        questions[6].optionC = prompt6[4];
        questions[6].optionD = prompt6[5];
        questions[6].correctOption ="optionA";
    }
    if(j == 2){
        questions[6].optionA = prompt6[5];
        questions[6].optionB = prompt6[2];
        questions[6].optionC = prompt6[3];
        questions[6].optionD = prompt6[4];
        questions[6].correctOption = "optionB";
    } 
    if(j == 3){
        questions[6].optionA = prompt6[4];
        questions[6].optionB = prompt6[5];
        questions[6].optionC = prompt6[2];
        questions[6].optionD = prompt6[3];
        questions[6].correctOption = "optionC";
    }
    if(j == 4){
        questions[6].optionA = prompt6[3];
        questions[6].optionB = prompt6[4];
        questions[6].optionC = prompt6[5];
        questions[6].optionD = prompt6[2];
        questions[6].correctOption = "optionD";

    }

 // QUESTION 7

 var phpPrompt7 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt7= JSON.parse(phpPrompt7);
    console.log(prompt7);
    questions[7].question = prompt7[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[7].optionA = prompt7[2];
        questions[7].optionB = prompt7[3];
        questions[7].optionC = prompt7[4];
        questions[7].optionD = prompt7[5];
        questions[7].correctOption ="optionA";
    }
    if(j == 2){
        questions[7].optionA = prompt7[5];
        questions[7].optionB = prompt7[2];
        questions[7].optionC = prompt7[3];
        questions[7].optionD = prompt7[4];
        questions[7].correctOption = "optionB";
    } 
    if(j == 3){
        questions[7].optionA = prompt7[4];
        questions[7].optionB = prompt7[5];
        questions[7].optionC = prompt7[2];
        questions[7].optionD = prompt7[3];
        questions[7].correctOption = "optionC";
    }
    if(j == 4){
        questions[7].optionA = prompt7[3];
        questions[7].optionB = prompt7[4];
        questions[7].optionC = prompt7[5];
        questions[7].optionD = prompt7[2];
        questions[7].correctOption = "optionD";
    }
    
     // QUESTION 8

  var phpPrompt8= '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt8= JSON.parse(phpPrompt8);
    console.log(prompt8);
    questions[8].question = prompt8[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[8].optionA = prompt8[2];
        questions[8].optionB = prompt8[3];
        questions[8].optionC = prompt8[4];
        questions[8].optionD = prompt8[5];
        questions[8].correctOption ="optionA";
    }
    if(j == 2){
        questions[8].optionA = prompt8[5];
        questions[8].optionB = prompt8[2];
        questions[8].optionC = prompt8[3];
        questions[8].optionD = prompt8[4];
        questions[8].correctOption = "optionB";
    } 
    if(j == 3){
        questions[8].optionA = prompt8[4];
        questions[8].optionB = prompt8[5];
        questions[8].optionC = prompt8[2];
        questions[8].optionD = prompt8[3];
        questions[8].correctOption = "optionC";
    }
    if(j == 4){
        questions[8].optionA = prompt8[3];
        questions[8].optionB = prompt8[4];
        questions[8].optionC = prompt8[5];
        questions[8].optionD = prompt8[2];
        questions[8].correctOption = "optionD";
    }
    
 // QUESTION 9

 var phpPrompt9 = '<?php echo promptRequest();?>'; //This is not working :(((( Big sad
    var prompt9= JSON.parse(phpPrompt9);
    console.log(prompt9);
    questions[9].question = prompt9[1];

    var j = Math.floor(Math.random()*4)+1;

    if(j == 1){
        questions[9].optionA = prompt9[2];
        questions[9].optionB = prompt9[3];
        questions[9].optionC = prompt9[4];
        questions[9].optionD = prompt9[5];
        questions[9].correctOption ="optionA";
    }
    if(j == 2){
        questions[9].optionA = prompt9[5];
        questions[9].optionB = prompt9[2];
        questions[9].optionC = prompt9[3];
        questions[9].optionD = prompt9[4];
        questions[9].correctOption = "optionB";
    } 
    if(j == 3){
        questions[9].optionA = prompt9[4];
        questions[9].optionB = prompt9[5];
        questions[9].optionC = prompt9[2];
        questions[9].optionD = prompt9[3];
        questions[9].correctOption = "optionC";
    }
    if(j == 4){
        questions[9].optionA = prompt9[3];
        questions[9].optionB = prompt9[4];
        questions[9].optionC = prompt9[5];
        questions[9].optionD = prompt9[2];
        questions[9].correctOption = "optionD";
    }
    return questions;
  }

let shuffledQuestions = []; //empty array to hold shuffled selected questions out of all available questions
    
function handleQuestions() {
    questions = fillQuestions();
        //function to shuffle and push 10 questions to shuffledQuestions array
    //app would be dealing with 10questions per session
        while (shuffledQuestions.length <= 9) {
            const random = questions[Math.floor(Math.random() * questions.length)]
            if (!shuffledQuestions.includes(random)) {
                shuffledQuestions.push(random)
            }
        }
}
    
    
    let questionNumber = 1 //holds the current question number
    let playerScore = 0  //holds the player score
    let wrongAttempt = 0 //amount of wrong answers picked by player
    let indexNumber = 0 //will be used in displaying next question
    
    // function for displaying next question in the array to dom
    //also handles displaying players and quiz information to dom
    function NextQuestion(index) {
        handleQuestions()
        const currentQuestion = shuffledQuestions[index]
        document.getElementById("question-number").innerHTML = questionNumber
        document.getElementById("player-score").innerHTML = playerScore
        document.getElementById("display-question").innerHTML = currentQuestion.question;
        document.getElementById("option-one-label").innerHTML = currentQuestion.optionA;
        document.getElementById("option-two-label").innerHTML = currentQuestion.optionB;
        document.getElementById("option-three-label").innerHTML = currentQuestion.optionC;
        document.getElementById("option-four-label").innerHTML = currentQuestion.optionD;
    
    }
    
    
    function checkForAnswer() {
        const currentQuestion = shuffledQuestions[indexNumber] //gets current Question
        const currentQuestionAnswer = currentQuestion.correctOption //gets current Question's answer
        const options = document.getElementsByName("option"); //gets all elements in dom with name of 'option' (in this the radio inputs)
        let correctOption = null
    
        options.forEach((option) => {
            if (option.value === currentQuestionAnswer) {
                //get's correct's radio input with correct answer
                correctOption = option.labels[0].id
            }
        })
    
        //checking to make sure a radio input has been checked or an option being chosen
        if (options[0].checked === false && options[1].checked === false && options[2].checked === false && options[3].checked == false) {
            document.getElementById('option-modal').style.display = "flex"
        }
    
        //checking if checked radio button is same as answer
        options.forEach((option) => {
            if (option.checked === true && option.value === currentQuestionAnswer) {
                document.getElementById(correctOption).style.backgroundColor = "green"
                playerScore++ //adding to player's score
                indexNumber++ //adding 1 to index so has to display next question..
                //set to delay question number till when next question loads
                setTimeout(() => {
                    questionNumber++
                }, 1000)
            }
    
            else if (option.checked && option.value !== currentQuestionAnswer) {
                const wrongLabelId = option.labels[0].id
                document.getElementById(wrongLabelId).style.backgroundColor = "red"
                document.getElementById(correctOption).style.backgroundColor = "green"
                wrongAttempt++ //adds 1 to wrong attempts
                indexNumber++
                //set to delay question number till when next question loads
                setTimeout(() => {
                    questionNumber++
                }, 1000)
            }
        })
    }
    
    
    
    //called when the next button is called
    function handleNextQuestion() {
        checkForAnswer() //check if player picked right or wrong option
        unCheckRadioButtons()
        //delays next question displaying for a second just for some effects so questions don't rush in on player
        setTimeout(() => {
            if (indexNumber <= 9) {
    //displays next question as long as index number isn't greater than 9, remember index number starts from 0, so index 9 is question 10
                NextQuestion(indexNumber)
            }
            else {
                handleEndGame()//ends game if index number greater than 9 meaning we're already at the 10th question
            }
            resetOptionBackground()
        }, 1000);
    }
    
    //sets options background back to null after display the right/wrong colors
    function resetOptionBackground() {
        const options = document.getElementsByName("option");
        options.forEach((option) => {
            document.getElementById(option.labels[0].id).style.backgroundColor = ""
        })
    }
    
    // unchecking all radio buttons for next question(can be done with map or foreach loop also)
    function unCheckRadioButtons() {
        const options = document.getElementsByName("option");
        for (let i = 0; i < options.length; i++) {
            options[i].checked = false;
        }
    }
    
    // function for when all questions being answered
    function handleEndGame() {
        let remark = null
        let remarkColor = null
    
        // condition check for player remark and remark color
        if (playerScore <= 3) {
            remark = "You can do better!"
            remarkColor = "red"
        }
        else if (playerScore >= 4 && playerScore < 7) {
            remark = "Keep practicing!"
            remarkColor = "orange"
        }
        else if (playerScore >= 7) {
            remark = "Excellent! Keep up the good work."
            remarkColor = "green"
        }
        const playerGrade = (playerScore / 10) * 100
    
        //data to display to score board
        document.getElementById('remarks').innerHTML = remark
        document.getElementById('remarks').style.color = remarkColor
        document.getElementById('grade-percentage').innerHTML = playerGrade
        document.getElementById('wrong-answers').innerHTML = wrongAttempt
        document.getElementById('right-answers').innerHTML = playerScore
        document.getElementById('score-modal').style.display = "flex"
    
    }
    
    //closes score modal, resets game and reshuffles questions
function closeScoreModal() {
        questionNumber = 1
        playerScore = 0
        wrongAttempt = 0
        indexNumber = 0
        shuffledQuestions = []
        NextQuestion(indexNumber)
        document.getElementById('score-modal').style.display = "none"
}
    
    //function to close warning modal
function closeOptionModal() {
        document.getElementById('option-modal').style.display = "none"
    }
    
    
</script>
</body>
