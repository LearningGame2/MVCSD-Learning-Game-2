<?php


function connect() {
    $conn = mysqli_connect("localhost","fishell1","S219352","Game2");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $conn;
}//Connection Function   
    
    
    
    
function promptRequest()
{
    
      $rowNumber = rand(1,300);
    
      
       // $prompt = "";
          $conn = connect();
          $sql = "SELECT * FROM QuestionDatabase WHERE QuestionNumber = '$rowNumber'";
            if ($result = mysqli_query($conn, $sql))
            {
           
                $row = mysqli_fetch_row($result);
      
        //      $prompt = $row[1];
                
              
                mysqli_free_result($result);
           
                mysqli_close($conn);
      
                return json_encode($row);
            }
}


?>

<body>
<script>
    class Question
    {
       // qPrompt: "";//, qAns: "", qResponse1: "", qResponse2: "", qResponse3: "", qResponse4: "";

  

        constructor ()
        {
            //how to parse JSON into these things...?  maybe call a new function for each?  (bring those back in code?)

            let phpQuestion = '<?php echo promptRequest();?>';
            var question = JSON.parse(phpQuestion);
            console.log(question[1] + " inside class, inside constructor");

            this.qPrompt = question[1];
            // this.qAns = phpQuestion[2];
            // this.qResponse1 = phpQuestion[2]
            // this.qResponse2 = phpQuestion[3];
            // this.qResponse3 = phpQuestion[4];
            // this.qResponse4 = phpQuestion[5];
            console.log(`${this.qPrompt} is qPrompt`);
        }
    }

    var q1 = new Question();
    console.log(q1.qPrompt + " = q1.qPrompt");
    console.log("q1 done, now q2");
    var q2 = new Question();
    console.log(q2.qPrompt + " = q2.qPrompt");

    console.log("test 1 of outside of obj class calls to promptRequest");
    let phpQuestion1 = '<?php echo promptRequest();?>';
    var question1 = JSON.parse(phpQuestion1);
    console.log(question1[1]);
    console.log("test 2 of outside of obj class calls to promptRequest");
    let phpQuestion2 = '<?php echo promptRequest();?>';
    var question2 = JSON.parse(phpQuestion2);
    console.log(question2[1]);


</script>
</body>