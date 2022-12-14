<?php
// Start the session
if (!session_start()) {
    header("location:loginStudent.php");
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Level-1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <a href="gamePanel.html">Exit</a>
    </div>
    <br>
    <br>
    <br>
    <div id="loadQuestions">


        <div class="row">
            <div class="col-4" id="question" style="font-size: 20ex;"></div>
            <div class="col-4">
                <img src="Images/Sign/=.png" alt="" style="height: 100px;">

            </div>
            <div class="col-4 border border-secondary" id="dropAnswer" ondrop="drop(event)" ondragover="allowDrop(event)">
            </div>
        </div>
        <div class="row" id="answers">
            <div class="col-4 " id="0" draggable="true" ondragstart="drag(event)"></div>
            <div class="col-4" id="1" draggable="true" ondragstart="drag(event)"></div>
            <div class="col-4" id="2" draggable="true" ondragstart="drag(event)"></div>



            
        </div>
    </div>
    <div>
      
            <button type="submit" id="btnSubmit" name="addLevelOne" onclick="check(correctAnswerID,studentAnswerID)">check</button>
       
    </div>


    <script>
        let correctAnswerID;
        let studentAnswerID;
        let numberOfAttemp = 0;
        let startTime = new Date();
        let endTime = 0;
        let consumeTime = 0;
        let status=0;
        let dragTime=0;



        loadQuestion();

        function loadQuestion() {


            let systemQuestion;
            let correctAnswer;
            let secondAnswer;
            let thirdAnswer;

            systemQuestion = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
            correctAnswer = systemQuestion;
            document.getElementById("question").innerHTML = systemQuestion;

            //answer
            // ansOneIndex = Math.floor(Math.random() *  (3 - 1 + 1)) + 1;
            // document.getElementById(ansOneIndex).innerHTML = systemQuestion;


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
            // while (answerArray[0] > 0) {
            //     outSrc += imageSrc;
            //     answerArray[0]--;
            // }
            correctAnswerID = firstId;
            document.getElementById(firstId).innerHTML = answerArray[0];


            while (true) {
                secondId = secondAnswer = Math.floor(Math.random() * 3);
                if ((firstId != secondId)) {
                    let outSrc = "";
                    // while (answerArray[1] > 0) {
                    //     outSrc += imageSrc;
                    //     answerArray[1]--;
                    // }


                    document.getElementById(secondId).innerHTML = answerArray[1];
                    break;
                }
            }

            while (true) {
                thirdId = secondAnswer = Math.floor(Math.random() * 3);
                if ((firstId != thirdId) && (secondId != thirdId)) {
                    let outSrc = "";
                    // while (answerArray[2] > 0) {
                    //     outSrc += imageSrc;
                    //     answerArray[2]--;
                    // }
                    document.getElementById(thirdId).innerHTML = answerArray[2];
                    break;
                }
            }
        }

  


        function drop(ev) {
            if( dragTime<1)
            {
                ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            studentAnswerID = data;
            console.log(studentAnswerID);
            //alert(data);
            //document.getElementById("print").innerHTML =data;
            //checkAnswer(data);
            dragTime++;

            }
            else{
                reset();
                dragTime=0;
            }


        }



        function check(correctAnswerID, retrivedIdData) {
            console.log(correctAnswerID + "" + retrivedIdData);
            numberOfAttemp += 1;
            if (correctAnswerID == studentAnswerID) {

                console.log("rightAnswer");
                endTime = new Date();
                consumeTime = (endTime - startTime) / 1000;


                status=1;


                console.log("consumeTime" + consumeTime);
                console.log("numberOfAttemp" + numberOfAttemp);
                window.location = "findNumber.php"

            } else {
                console.log("Wrong answer");
                reset();
            }

        }

      
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

