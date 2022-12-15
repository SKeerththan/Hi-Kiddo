<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level-3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    <div id="loadQuestions">


        <div class="row">
            <div class="col" id="numberOne" style="font-size: 20ex;"></div>
            <div class="col">
                <img src="Images/Sign/+.png" alt="" style="height: 100px;">

            </div>

            <div class="col" id="numberTwo" style="font-size: 20ex;"></div>
            <div class="col">
                <img src="Images/Sign/=.png" alt="" style="height: 100px;">

            </div>

            <div class="col border border-secondary" id="dropAnswer">
            </div>
        </div>
        <div class="row" id="answers">
            <label class="labl">
                <input type="radio" id="a" name="radioname" value="" />
                <div class="col-4" id="0"></div>
            </label>
            <label class="labl">
                <input type="radio" id="b" name="radioname" value="" />
                <div class="col-4" id="1"></div>

            </label>
            <label class="labl">
                <input type="radio" id="c" name="radioname" value="" />
                <div class="col-4" id="2"></div>

            </label>





        </div>
    </div>
    <div>
        <form method="post" action="">
            <button type="submit" name="addData" id="btnSubmit" onclick="check(correctAnswerID)">Submit</button>
        </form>
    </div>


    <script>
        let correctAnswerID;
        let studentAnswerID;
        let numberOfAttemp = 0;
        let startTime = new Date();
        
 


        loadQuestion();

        function loadQuestion() {


            let numberOne;
            let numberTwo;
            let secondAnswer;
            let thirdAnswer;



            while (true) {
                numberOne = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
                console.log(numberOne);
                document.getElementById("numberOne").innerHTML = numberOne;
                numberTwo = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
                console.log(numberTwo);
                document.getElementById("numberTwo").innerHTML = numberTwo;
                correctAnswer = numberOne + numberTwo;
                if (correctAnswer < 10) {
                    break;
                }

            }


            const answerArray = [];
            answerArray.push(correctAnswer);
            //creat random answers
            while (true) {
                secondAnswer = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
                if ((correctAnswer != secondAnswer) && (secondAnswer > 0) && (secondAnswer < 10)) {
                    answerArray.push(secondAnswer);

                    break;
                }

            }
            while (true) {
                thirdAnswer = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
                if ((correctAnswer != thirdAnswer) && (thirdAnswer > 0) && (thirdAnswer < 10) && (secondAnswer != thirdAnswer)) {
                    answerArray.push(thirdAnswer);

                    break;
                }


            }
            console.log(answerArray);

            //show answer in random div
            let firstId;
            let secondId;
            let thirdId;
            let imgIndex = Math.floor(Math.random() * 10);
            const imageSrc = `<img src='Images/Fruits/${imgIndex}.png' class='sign' alt=''  style='height: 100px;'>`;

            firstId = secondAnswer = Math.floor(Math.random() * 3);
            console.log(firstId);

            let outSrc = "";
            while (answerArray[0] > 0) {
                outSrc += imageSrc;
                answerArray[0]--;
            }
            correctAnswerID = firstId;
            document.getElementById(firstId).innerHTML = outSrc;


            while (true) {
                secondId = secondAnswer = Math.floor(Math.random() * 3);
                if ((firstId != secondId)) {
                    let outSrc = "";
                    while (answerArray[1] > 0) {
                        outSrc += imageSrc;
                        answerArray[1]--;
                    }


                    document.getElementById(secondId).innerHTML = outSrc;
                    break;
                }
            }

            while (true) {
                thirdId = secondAnswer = Math.floor(Math.random() * 3);
                if ((firstId != thirdId) && (secondId != thirdId)) {
                    let outSrc = "";
                    while (answerArray[2] > 0) {
                        outSrc += imageSrc;
                        answerArray[2]--;
                    }
                    document.getElementById(thirdId).innerHTML = outSrc;
                    break;
                }
            }
        }


        function check(correctAnswerID) {
            numberOfAttemp += 1;
            if (document.getElementById('a').checked && (correctAnswerID === 0)) {
                // console.log("rightAnswer");
               let  endTime = new Date();
                let consumeTime = (endTime - startTime) / 1000;
                status = 1;
                console.log("consumeTime" + consumeTime);
                console.log("numberOfAttemp" + numberOfAttemp);
               
            } else if (document.getElementById('b').checked && (correctAnswerID === 1)) {
                alert("d");
                console.log("rightAnswer");
                let endTime = new Date();
                let consumeTime = (endTime - startTime) / 1000;
                status = 1;
                console.log("consumeTime" + consumeTime);
                console.log("numberOfAttemp" + numberOfAttemp);

            } else if (document.getElementById('c').checked && (correctAnswerID === 2)) {
                alert("d5");
                console.log("rightAnswer");
                let endTime = new Date();
                let consumeTime = (endTime - startTime) / 1000;
                status = 1;
                console.log("consumeTime" + consumeTime);
                console.log("numberOfAttemp" + numberOfAttemp);

            } else {
                alert("sddsd");
                reset();
                dragTime = 0;
            }
            


        }
        
        function reset() {
            var container = document.getElementById("loadQuestions");
            container.innerHTML = html;
        }
        window.onload = function() {
            html = document.getElementById('loadQuestions').innerHTML;
        };

        function reset() {
            var container = document.getElementById("loadQuestions");
            container.innerHTML = html;
        }

        window.onload = function() {
            html = document.getElementById('loadQuestions').innerHTML;
        };
    </script>

    
<?php
    if (isset($_POST['addData'])) {











        
        // include 'Database/dbconnect.php';
        // $question = "dsd";
        // $studentIndexNo = 1;
        // $attemps =  "<script>document.write(numberOfAttemp);</script>";
        // $time = "<script>document.write(consumeTime);</script>";

        // echo "<script>alert('ffddfd' +consumeTime);</script>";


        // $con = new mysqli("localhost", "root", "", DB_DATABASE);
        // $result = $con->query("INSERT INTO `levelonetable`(`question`,`studentIndexNo`, `attemps`, `time`) VALUES ('55','5','5','5')  ");


        // if ($result === TRUE) {
        //     $con->close();
        //     echo "<script>alert('New record created successfully');</script>";

        //     // header("location:admminPanel.php");

        // } else {
        //     $con->close();
        //     echo "<script>alert('Duplicate value : check indexNo');</script>";
        // }
    }


    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>