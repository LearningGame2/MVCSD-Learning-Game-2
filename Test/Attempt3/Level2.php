<?php
session_start();

// if(!isset($_SESSION['login'])){
//   header("location: http://cslab.kenyon.edu/class/ssd/Game2/LGAttempt3/Login1.php");
// } //Comment out to make less annoying

function connect() {
    $conn = mysqli_connect("localhost","fishell1","S219352","Game2");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $conn;
}//Connection Function




function promptRequest($numOfQuestions){
    $questions = array();
    for ($x = 0; $x <= $numOfQuestions; $x++) {
        $rowNumber = rand(400,410);
        $prompt = "";
        $conn = connect();
        $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";
        if ($result = mysqli_query($conn, $sql)) {
          $row = mysqli_fetch_row($result);
          mysqli_free_result($result);
          mysqli_close($conn);
          $questions[$x] = $row;
      }
    }
  return json_encode($questions);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="Game.css">
</head>

<body onload="NextQuestion(0)">
  <h1 style="background-color:black; color:white; text-align:center; font-family:courier new; font-size:300%; line-height: 100px">
    Level 2
  </h1>
    <main>
        <!-- creating a modal for when quiz ends -->
        <div class="modal-container" id="score-modal">

            <div class="modal-content-container">

                <h1>Level 2 COMPLETED</h1>

                <div class="grade-details">
                    <p>Wrong Answers : <span id="wrong-answers"></span></p>
                    <p>Right Answers : <span id="right-answers"></span></p>
                    <p>Grade : <span id="grade-percentage"></span>%</p>
                    <p>Score : <span id="score"></span></p>
                    <p ><span id="remarks"></span></p>
                </div>

                <div class="modal-button-container">
                    <button onclick="returnHome()">Ok</button>
                </div>

            </div>
        </div>
<!-- end of modal of quiz details-->

        <div class="game-quiz-container" style = "position:relative; top:-75px">

            <div class="game-details-container">
                <h1>Score : <span id="player-score"></span></h1>
                <h1>Current Streak : <span id = "player-streak"></span></h1>
                <h1>Question : <span id="question-number"></span> / 10</h1>

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

//making a class of question object to fill questions array
class Question {
    constructor (question, optionA, optionB, optionC, optionD, correctOption) {
        this.question = question;
        this.optionA = optionA;
        this.optionB = optionB;
        this.optionC = optionC;
        this.optionD = optionD;
        this.correctOption = correctOption;
    }
}

/*fills questions array after parsing the decoded json that php returned, setting them in a random order and then creating a
  question object with the results from the parse*/
//post: returns questions array
function fillQuestions()
{
    const questions = [10];
    var phpPrompt = JSON.parse('<?php echo promptRequest(10);?>');
    
    for (let i = 0; i < 10; i++) {
        var prompt = phpPrompt[i];
        console.log(prompt);
        qPrompt = prompt[1];
        var j = Math.floor(Math.random()*4)+1;

        //this way is so clunky but i couldn't get my fancy way to work :(
        let optionA, optionB, optionC, optionD, correctOption;
        if(j == 1){
            optionA = prompt[2];
            optionB = prompt[3];
            optionC = prompt[4];
            optionD = prompt[5];
            correctOption ="optionA";
        }
        if(j == 2){
            optionA = prompt[5];
            optionB = prompt[2];
            optionC = prompt[3];
            optionD = prompt[4];
            correctOption = "optionB";
        }
        if(j == 3){
            optionA = prompt[4];
            optionB = prompt[5];
            optionC = prompt[2];
            optionD = prompt[3];
            correctOption = "optionC";
        }
        if(j == 4){
            optionA = prompt[3];
            optionB = prompt[4];
            optionC = prompt[5];
            optionD = prompt[2];
            correctOption = "optionD";
        }

        var currentQuestion = new Question(qPrompt,optionA,optionB,optionC,optionD,correctOption);
        questions[i] = currentQuestion;
    }

    return questions;
}



    let questionArray = fillQuestions();

    var cookieArray = document.cookie.split("; ")

    console.log("Cookie is !!!! " + document.cookie);
    let playerScore
    let streak 

    console.log(cookieArray[2]);
    console.log(cookieArray[3]);


    let cook = cookieArray[2];
    while (cook.charAt(0)!= '='){
        cook = cook.substring(1);
    }

    ifDumbCookie = cookieArray[2].split('=');
    if(ifDumbCookie[0] == "streak"){
        streak = parseInt(cook.substring(1));
    }
    else if(ifDumbCookie[0] == "score"){
        streak = parseInt(cook.substring(1));
    }
    


    cook = cookieArray[3];
    while (cook.charAt(0)!= '='){
        cook = cook.substring(1);
    }

    let ifDumbCookie = cookieArray[3].split('=');
    if(ifDumbCookie[0] == "streak"){
        streak = parseInt(cook.substring(1));
    }
    else if(ifDumbCookie[0] == "score"){
        streak = parseInt(cook.substring(1));
    }


    let questionNumber = 1 //holds the current question number
    let amountCorrect = 0 //different from score, does not include streaks
    let wrongAttempt = 0 //amount of wrong answers picked by player
    let indexNumber = 0 //will be used in displaying next question

    // function for displaying next question in the array to dom
    //also handles displaying players and quiz information to dom
    function NextQuestion(index) {
        //handleQuestions() — this is also vestigial
        const currentQuestion = questionArray[index];
        document.getElementById("question-number").innerHTML = questionNumber;
        document.getElementById("player-score").innerHTML = playerScore;
        document.getElementById("player-streak").innerHTML = streak;
        document.getElementById("display-question").innerHTML = currentQuestion.question;
        document.getElementById("option-one-label").innerHTML = currentQuestion.optionA;
        document.getElementById("option-two-label").innerHTML = currentQuestion.optionB;
        document.getElementById("option-three-label").innerHTML = currentQuestion.optionC;
        document.getElementById("option-four-label").innerHTML = currentQuestion.optionD;

    }


    function checkForAnswer() {
        const currentQuestion = questionArray[indexNumber] //gets current Question
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
                playerScore = playerScore + 1 + streak //adding to player's score
                streak++
                amountCorrect++
                indexNumber++ //adding 1 to index so has to display next question..
                //set to delay question number till when next question loads
                setTimeout(() => {
                    questionNumber++
                }, 10)
            }

            else if (option.checked && option.value !== currentQuestionAnswer) {
                const wrongLabelId = option.labels[0].id
                document.getElementById(wrongLabelId).style.backgroundColor = "red"
                document.getElementById(correctOption).style.backgroundColor = "green"
                wrongAttempt++ //adds 1 to wrong attempts
                indexNumber++
                streak = 0
                //set to delay question number till when next question loads
                setTimeout(() => {
                    questionNumber++
                }, 10)
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
        else if (playerScore >= 4 && playerScore < 9) {
            remark = "Keep practicing!"
            remarkColor = "orange"
        }
        else if (playerScore >= 10) {
            remark = "Excellent! Keep up the good work."
            remarkColor = "green"
        }
        const playerGrade = (amountCorrect / 10) * 100

        //data to display to score board
        document.getElementById('remarks').innerHTML = remark
        document.getElementById('remarks').style.color = remarkColor
        document.getElementById('grade-percentage').innerHTML = playerGrade
        document.getElementById('wrong-answers').innerHTML = wrongAttempt
        document.getElementById('right-answers').innerHTML = amountCorrect
        document.getElementById('score').innerHTML = playerScore
        document.getElementById('score-modal').style.display = "flex"

        document.getElementById("question-number").innerHTML = questionNumber;
        document.getElementById("player-score").innerHTML = playerScore;
        document.getElementById("player-streak").innerHTML = streak;

    }
  
    //function to close warning modal
    function closeOptionModal() {
        document.getElementById('option-modal').style.display = "none"
    }

    function returnHome(){
        window.location.href = "Home.php"
    }



    /*COOOOOOOOOOOOOOOOOOOOOKIES*/


//     function setCookie(cname, cvalue) {
//     document.cookie = cname + "=" + cvalue + ";"
//     }

//     function getCookie(cname) {
//     let name = cname + "=";
//     let decodedCookie = decodeURIComponent(document.cookie);
//     let ca = decodedCookie.split(';');
//     for(let i = 0; i <ca.length; i++) {
//         let c = ca[i];
//     while (c.charAt(0) == ' ') {
//       c = c.substring(1);
//     }
//     if (c.indexOf(name) == 0) {
//       return c.substring(name.length, c.length);
//     }
//   }
//   return "";
//     }





    </script>
</body>
