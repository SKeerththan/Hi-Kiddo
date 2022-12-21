<?php
// Start the session
if (!session_start()) {
    header("location:loginStudent.php");
}

?>

<?php


// if (isset($_POST['startGame'])) {



//     $studentIndexNumber = $_SESSION['kidIndex'];
//     include 'Database/dbconnect.php';
//     $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
//     $sql = mysqli_query($con, "SELECT * FROM `student` where indexNo=$studentIndexNumber ");
//     $row = mysqli_num_rows($sql);
//     $con->close();
//     $url = "";
//     while ($row = mysqli_fetch_array($sql)) {

//         $levelOneCount = $row['levelOne'];
//         $levelTwoCount = $row['levelTwo'];
//         $levelThreeCount = $row['levelThree'];
//         $levelFourCount = $row['levelFour'];
//         $levelFiveCount = $row['levelFive'];
//         $levelSixCount = $row['levelSix'];
//     }

//     if ($levelOneCount <= 10) {
//         header("location:Level1.php");
//     } else if ($levelTwoCount <= 10) {
//         header("location:Level2.php");
//     } else if ($levelThreeCount <= 10) {
//         header("location:Level3.php");
//     } else if ($levelFourCount <= 10) {
//         header("location:Level4.php");
//     } else if ($levelFiveCount <= 10) {
//         header("location:Level5.php");
//     } else if ($levelSixCount <= 10) {
//         header("location:Level6.php");
//     } else {
//         header("location:Level1.php");
//     }
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play</title>
    <link rel="stylesheet" href="CSS/gamepanel.css">
    <style>
        body {
            font-size: 16px;
            font-family: "Helvetica", "Arial", sans-serif;
            text-align: center;
            background-color: #f8faff;
        }

        .bubbly-button {
            font-family: "Helvetica", "Arial", sans-serif;
            display: inline-block;
            font-size: 1em;
            padding: 1em 2em;
            margin-top: 100px;
            margin-bottom: 60px;
            -webkit-appearance: none;
            appearance: none;
            background-color: #ff0081;
            color: #fff;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            position: relative;
            transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
            box-shadow: 0 2px 25px rgba(255, 0, 130, 0.5);
        }

        .bubbly-button:focus {
            outline: 0;
        }

        .bubbly-button:before,
        .bubbly-button:after {
            position: absolute;
            content: "";
            display: block;
            width: 140%;
            height: 100%;
            left: -20%;
            z-index: -1000;
            transition: all ease-in-out 0.5s;
            background-repeat: no-repeat;
        }

        .bubbly-button:before {
            display: none;
            top: -75%;
            background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 20%, #ff0081 20%, transparent 30%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
            background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
        }

        .bubbly-button:after {
            display: none;
            bottom: -75%;
            background-image: radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, transparent 10%, #ff0081 15%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%), radial-gradient(circle, #ff0081 20%, transparent 20%);
            background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
        }

        .bubbly-button:active {
            transform: scale(0.9);
            background-color: #e60074;
            box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
        }

        .bubbly-button.animate:before {
            display: block;
            animation: topBubbles ease-in-out 0.75s forwards;
        }

        .bubbly-button.animate:after {
            display: block;
            animation: bottomBubbles ease-in-out 0.75s forwards;
        }

        @keyframes topBubbles {
            0% {
                background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
            }

            50% {
                background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;
            }

            100% {
                background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
                background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
            }
        }

        @keyframes bottomBubbles {
            0% {
                background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
            }

            50% {
                background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;
            }

            100% {
                background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
                background-size: 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%, 0% 0%;
            }
        }
    </style>

</head>

<body>
    <header class="header">
        <?php
        echo "<a href='#' class='logo'>👉  Hi " . $_SESSION['kidName'] . "...&#11088 </a>";

        ?>
        <nav class="navbar">
            <a href="#home" hidden>Home</a>
            <a href="logoutStudent.php">Logout <i style="font-size:20px" class="fa">👋</i></a>
        </nav>

    </header>

    <button class="bubbly-button" onclick="clixkMe()">Start The Game</button>


    <!-- 
    <form action="" method="POST">

        <button class="" name="startGame">
            <p style="font-size: 10ex;">Start The Game</p>
        </button>
    </form> -->


    <script>
        function clixkMe() {
            setTimeout(() => {
                window.location = "loaderLevel.php"
            }, 1000);


        }

        var animateButton = function(e) {
            e.preventDefault;
            //reset animation
            e.target.classList.remove("animate");

            e.target.classList.add("animate");
            setTimeout(function() {
                e.target.classList.remove("animate");
            }, 700);
        };

        var bubblyButtons = document.getElementsByClassName("bubbly-button");

        for (var i = 0; i < bubblyButtons.length; i++) {
            bubblyButtons[i].addEventListener("click", animateButton, false);
        }
    </script>







</body>

</html>