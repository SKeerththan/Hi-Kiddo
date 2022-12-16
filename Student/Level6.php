<?php
// Start the session
if (!session_start()) {
    header("location:loginStudent.php");
}


?>
<?php
if (isset($_POST['checkData'])) {
    sleep(3);

    //Get the values from javascript
    $correctAnswerIDs = $_POST['ans'];
    // echo $correctAnswerIDs;

    $selectTagChecks = $_POST['radioname'];
    // echo $selectTagChecks;


    if ($correctAnswerIDs === $selectTagChecks) {

        include 'Database/dbconnect.php';
        $studentIndexNumber = $_SESSION['kidIndex'];
        $status = 1;
        $duration = (time() - $_POST['enterTime']);
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $result = $con->query("INSERT INTO `levelsix`( `studentindexno`, `status`, `time`) VALUES ('$studentIndexNumber','$status','$duration')");

        if ($result === TRUE) {
            $con->close();
           // echo "<script>alert('New record created successfully');</script>";

            // header("location:admminPanel.php");

        } else {
            $con->close();
           // echo "<script>alert('Duplicate value : check indexNo');</script>";
        }
    } else {
        include 'Database/dbconnect.php';
        $studentIndexNumber = $_SESSION['kidIndex'];
        $status = 0;
        $duration = (time() - $_POST['enterTime']);
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $result = $con->query("INSERT INTO `levelsix`( `studentindexno`, `status`, `time`) VALUES ('$studentIndexNumber','$status','$duration')");

        if ($result === TRUE) {
            $con->close();
           // echo "<script>alert('New record created successfully');</script>";

            // header("location:admminPanel.php");

        } else {
            $con->close();
           // echo "<script>alert('Duplicate value : check indexNo');</script>";
        }
    }
    $studentIndexNumber = $_SESSION['kidIndex'];
    $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT COUNT(`qId`) AS number FROM levelsix WHERE `studentindexno`=$studentIndexNumber";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $data = $data['number'];
    $result = $con->query("UPDATE student SET levelSix ='$data' WHERE `indexNo`=$studentIndexNumber");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level-6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="libs/minn.js"></script>
    <!-- <script>
        $("form").submit(function() {
            $.post($(this).attr("action"), $(this).serialize());
            return false;
        });
    </script> -->
    <style>
        .labl {
            display: block;
            width: 400px;
        }

        .labl>input {
            /* HIDE RADIO */
            visibility: hidden;
            /* Makes input not-clickable */
            position: absolute;
            /* Remove input from document flow */
        }

        .labl>input+div {
            /* DIV STYLES */
            cursor: pointer;
            border: 2px solid transparent;
        }

        .labl>input:checked+div {
            /* (RADIO CHECKED) DIV STYLES */
            background-color: #ffd6bb;
            border: 1px solid #ff6600;
        }
    </style>
</head>

<body>
    <div class="row">
        <a href="gamePanel.php">Exit</a>
    </div>
    <form action="Level6.php" id="" method="POST">
        <input type="hidden" name="enterTime" value="<?php echo time(); ?>">
        <div id="loadQuestions">
            <div class="row">
                <div class="col" id="numberOne" style="font-size: 20ex;"></div>
                <div class="col">
                    <img src="Images/Sign/de.png" alt="" style="height: 100px;">

                </div>

                <div class="col" id="numberTwo" style="font-size: 20ex;"></div>
                <div class="col">
                    <img src="Images/Sign/=.png" alt="" style="height: 100px;">

                </div>
                <input type="hidden" name="ans" id="ans">

                <div class="col border border-secondary" id="dropAnswer">
                </div>
            </div>


            <!-- <div class="row">
                <div class="col-4" id="question" style="font-size: 20ex;"></div>
                
                <div class="col-4">
                    <img src="Images/Sign/=.png" alt="" style="height: 100px;">

                </div>
                <div class="col-4 border border-secondary" id="dropAnswer">
                </div>
            </div> -->


            <div class="row" id="answers">
                <label class="labl">
                    <input type="radio" id="a0" name="radioname" checked />

                    <div class="col-4" id="0"></div>

                </label>
                <label class="labl">
                    <input type="radio" id="a1" name="radioname" />

                    <div class="col-4" id="1"></div>

                </label>
                <label class="labl">
                    <input type="radio" id="a2" name="radioname" />

                    <div class="col-4" id="2"></div>

                </label>

            </div>
        </div>
        <div>


            <button type="submit" id="btnSubmit" onclick="check()" name="checkData">check</button>

        </div>
    </form>


    <script>
        let numberOfAttemp = 1;
        let startTime = new Date();
        let systemQuestion;
        let correctAnswer;
        let correctAnswerID;
        let secondAnswer;
        let thirdAnswer;
        let passId;
        let numberOne;
        let numberTwo;



        while (true) {
            numberOne = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
            console.log(numberOne);
            document.getElementById("numberOne").innerHTML = numberOne;
            numberTwo = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
            console.log(numberTwo);
            document.getElementById("numberTwo").innerHTML = numberTwo;

            if (numberOne > numberTwo) {
                correctAnswer = numberOne / numberTwo;
                document.getElementById("ans").value = correctAnswer;
                if (Number.isInteger(correctAnswer)) {
                    if ((correctAnswer < 10) && (correctAnswer > 0)) {
                        console.log("ans is " + correctAnswer)
                        break;
                    }


                }
            }

        }



        //assign question
        // document.getElementById("question").innerHTML = systemQuestion;


        //push correct answer to array
        const answerArray = [];
        answerArray.push(correctAnswer);

        //generate other second answer and push to same array
        while (true) {
            secondAnswer = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
            if ((correctAnswer != secondAnswer) && (secondAnswer > 0) && (secondAnswer < 10)) {
                answerArray.push(secondAnswer);

                break;
            }
        }
        //generate other third answer and push to same array
        while (true) {
            thirdAnswer = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
            if ((correctAnswer != thirdAnswer) && (thirdAnswer > 0) && (thirdAnswer < 10) && (secondAnswer != thirdAnswer)) {
                answerArray.push(thirdAnswer);
                break;
            }
        }

        //check in console the generated array
        console.log(answerArray);


        //Randomly assign answer in different places

        //Declare ID for answers
        let firstId;
        let secondId;
        let thirdId;
        let imageSrc;

        //generate random number to find  a random image
        let imgIndex = Math.floor(Math.random() * 10);

        //select random image
        imageSrc = `<img src='Images/Fruits/${imgIndex}.png' class='sign' alt=''  style='height: 100px;'>`;


        //Generate First random ID
        firstId = Math.floor(Math.random() * 3);

        //Log
        console.log(firstId);

        //output image count
        let outSrc = "";

        //assign correct answer id as first ne
        correctAnswerID = firstId;


        //print the correct answer in randomly generated ID place
        document.getElementById('a' + firstId).value = answerArray[0];
        while (answerArray[0] > 0) {
            outSrc += imageSrc;
            answerArray[0]--;
        }
        correctAnswerID = firstId;
        document.getElementById(firstId).innerHTML = outSrc;


        //Generate Second ID to print the second answer
        while (true) {
            secondId = secondAnswer = Math.floor(Math.random() * 3);
            if ((firstId != secondId)) {
                document.getElementById('a' + secondId).value = answerArray[1];
                let outSrc = "";
                while (answerArray[1] > 0) {
                    outSrc += imageSrc;
                    answerArray[1]--;
                }


                document.getElementById(secondId).innerHTML = outSrc;
                break;
            }
        }


        //Generate Third ID to print the Third answer

        while (true) {
            thirdId = secondAnswer = Math.floor(Math.random() * 3);
            if ((firstId != thirdId) && (secondId != thirdId)) {
                let outSrc = "";
                document.getElementById('a' + thirdId).value = answerArray[2];
                while (answerArray[2] > 0) {
                    outSrc += imageSrc;
                    answerArray[2]--;
                }
                document.getElementById(thirdId).innerHTML = outSrc;
                break;
            }
        }

        function check() {
            if ((document.getElementById('a0').checked) && document.getElementById('a0').value == correctAnswer) {
                swal("Good job!", "You choose the right answer.", "success");

            } else if ((document.getElementById('a1').checked) && document.getElementById('a1').value == correctAnswer) {
                swal("Excellent!", "Keep Going", "success");

            } else if ((document.getElementById('a2').checked) && document.getElementById('a2').value == correctAnswer) {
                swal("Well done!", "You are so smart", "success");

            } else {

                swal("That is not a suitable answer, Correct answer : " + numberOne + "÷" + numberTwo + "=" + correctAnswer, "Give another try", "error");
            }
        }
        setTimeout(() => {
            speakMe();
        }, 2000);

        function speakMe() {
            let textToSpeak = "What is the answer for " + numberOne + "divided  by" + numberTwo;
            let speakData = new SpeechSynthesisUtterance();
            speakData.volume = 1; // From 0 to 1
            speakData.rate = 1; // From 0.1 to 10
            speakData.pitch = 2; // From 0 to 2
            speakData.text = textToSpeak;
            speakData.lang = 'en';
            speakData.voice = getVoices()[3];
            speechSynthesis.speak(speakData);
            setTimeout(() => {
                speakMe();
            }, 7000);
        }

        function getVoices() {
            let voices = speechSynthesis.getVoices();
            if (!voices.length) {
                let utterance = new SpeechSynthesisUtterance("");
                speechSynthesis.speak(utterance);
                voices = speechSynthesis.getVoices();
            }
            return voices;
        }
    </script>


    <script src="https: //unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="libs/cute-alert/cute-alert.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>