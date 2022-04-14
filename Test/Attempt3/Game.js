
    var RandNumbers = [];
    for(let i = 1; i <10; i++){
        RandNumbers[i]= Math.floor(Math.random() * 300);
    }
    
    


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



function fillQuestions(){    
  for (let i = 0; i < 10; i++) {

    questions[i].question = promptRequest(RandNumbers[i]);

    var j = Math.floor(Math.random()*4)+1;

    if(j = 1){
        questions[i].optionA = correctRequest(RandNumbers[i]);
        questions[i].optionB = wrong1Request(RandNumbers[i]);
        questions[i].optionC = wrong2Request(RandNumbers[i]);
        questions[i].optionD = wrong3Request(RandNumbers[i]);
        questions[i].correctOption ="optionA";
    }
    if(j = 2){
        questions[i].optionB = correctRequest(RandNumbers[i]);
        questions[i].optionC = wrong1Request(RandNumbers[i]);
        questions[i].optionD = wrong2Request(RandNumbers[i]);
        questions[i].optionA = wrong3Request(RandNumbers[i]);
        questions[i].correctOption = "optionB";
    } 
    if(j = 3){
        questions[i].optionC = correctRequest(RandNumbers[i]);
        questions[i].optionD = wrong1Request(RandNumbers[i]);
        questions[i].optionA = wrong2Request(RandNumbers[i]);
        questions[i].optionB = wrong3Request(RandNumbers[i]);
        questions[i].correctOption = "optionC";
    }
    if(j = 4){
        questions[i].optionD = correctRequest(RandNumbers[i]);
        questions[i].optionA = wrong1Request(RandNumbers[i]);
        questions[i].optionB = wrong2Request(RandNumbers[i]);
        questions[i].optionC = wrong3Request(RandNumbers[i]);
        questions[i].correctOption = "optionD";
    }
}
    return questions
}

    
    let shuffledQuestions = [] //empty array to hold shuffled selected questions out of all available questions
    
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
    