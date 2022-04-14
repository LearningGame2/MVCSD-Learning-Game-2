
const questions = [
    //Question 1
        {
            question: "Round 4,725,143 to the nearest ten thousand",
            optionA: "4,725,100",
            optionB: "4,720,000",
            optionC: "4,725,000",
            optionD: "4,730,000",
            correctOption: "optionD"
        },
    //Question 2
        {
            question: "Round 9,992,552 to the nearest ten thousand",
            optionA: "1,000,0000",
            optionB: "9,990,000",
            optionC: "9,993,000",
            optionD: "9,992,600",
            correctOption: "optionB"
        },
    //Question 3
        {
            question: "Round 8,157,114 to the nearest thousand",
            optionA: "8,160,000",
            optionB: "8,157,110",
            optionC: "8,157,100",
            optionD: "8,157,000",
            correctOption: "optionD"
        },
    //Question 4
        {
            question: "Round 2,565,232 to the nearest tens digit",
            optionA: "2,565,240",
            optionB: "2,565,232",
            optionC: "2,565,230",
            optionD: "2,565,000",
            correctOption: "optionC"
        },
    //Question 5
        {
            question: "Round 8,779,125 to the nearest hundred",
            optionA: "8,779,000",
            optionB: "8,779,125",
            optionC: "8,779,130",
            optionD: "8,779,100",
            correctOption: "optionD"
        },
    //Question 6
        {
            question: "Round 387.5816 to the nearest hundredth",
            optionA: "387.58",
            optionB: "387.59",
            optionC: "387.582",
            optionD: "387.6",
            correctOption: "optionA"
        },
    //Question 7
        {
            question: "Round 625.713 to the nearest tenth",
            optionA: "626",
            optionB: "630",
            optionC: "625.7",
            optionD: "625.71",
            correctOption: "optionC"
        },
    //Question 8
        {
            question: "Round 740,411 to the nearest tens digit",
            optionA: "740,410",
            optionB: "740,400",
            optionC: "740,000",
            optionD: "740,411",
            correctOption: "optionA"
        },
    //Question 9
        {
            question: "Round 142.8444 to the nearest tenth",
            optionA: "140",
            optionB: "142.9",
            optionC: "143",
            optionD: "142.8",
            correctOption: "optionD"
        },
    //Question 10
        {
            question: "Round 9,071,411 to the nearest million",
            optionA: "1,000,0000",
            optionB: "9,100,000",
            optionC: "9,070,000",
            optionD: "9,000,000",
            correctOption: "optionD"
        }
    
    ]
    
    
    let shuffledQuestions = [] //empty array to hold shuffled selected questions out of all available questions
    
    function handleQuestions() {
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
    