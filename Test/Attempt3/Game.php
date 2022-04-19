<!--<html>


<?php

print "testPrint";


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
           echo "about to return " + "$" + " row";
      
            return json_encode($row);
            }
    }

    class Question {
        public $prompt;
        public cAns;
        public wAns1;
        public wAns2;
        public wAns3;

        function __construct() {
            $phpQuestion = promptRequest();
            echo "this is phpQuestion: ";
            echo $phpQuestion;
            $question = JSON.parse(phpQuestion);
            echo "this is question: ";
            echo $question;
            $prompt = $question[1]; //this line might not work
            echo "this is prompt: ";
            echo $prompt;

            // $prompt = $question[1];
            // this.qPrompt = phpQuestion[1];
            
        }
    }

    //now put script for array of php objects...?  maybe you can echo for each thing of an object into a js object for array

?>


</html>