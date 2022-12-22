<?php
// Start the session
if (!session_start()) {
    header("location:loginStudent.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play</title>
    <link rel="stylesheet" href="CSS/play.css">


    <style>
        .snow {
            /* width:100%;
            height: 100%; */
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50%3B' xml:space='preserve'%3E%3Cstyle type='text/css'%3E.st1%7Bopacity:0.3%3Bfill:%23FFFFFF%3B%7D.st3%7Bopacity:0.1%3Bfill:%23FFFFFF%3B%7D%3C/style%3E%3Ccircle class='st1' cx='5' cy='8' r='1'/%3E%3Ccircle class='st1' cx='38' cy='3' r='1'/%3E%3Ccircle class='st1' cx='12' cy='4' r='1'/%3E%3Ccircle class='st1' cx='16' cy='16' r='1'/%3E%3Ccircle class='st1' cx='47' cy='46' r='1'/%3E%3Ccircle class='st1' cx='32' cy='10' r='1'/%3E%3Ccircle class='st1' cx='3' cy='46' r='1'/%3E%3Ccircle class='st1' cx='45' cy='13' r='1'/%3E%3Ccircle class='st1' cx='10' cy='28' r='1'/%3E%3Ccircle class='st1' cx='22' cy='35' r='1'/%3E%3Ccircle class='st1' cx='3' cy='21' r='1'/%3E%3Ccircle class='st1' cx='26' cy='20' r='1'/%3E%3Ccircle class='st1' cx='30' cy='45' r='1'/%3E%3Ccircle class='st1' cx='15' cy='45' r='1'/%3E%3Ccircle class='st1' cx='34' cy='36' r='1'/%3E%3Ccircle class='st1' cx='41' cy='32' r='1'/%3E%3C/svg%3E");
            background-position: 0px 0px;
            animation: animatedBackground 10s linear infinite;
        }


        @keyframes animatedBackground {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 0px 300px;
            }
        }
    </style>

</head>

<body class="snow" style="background-color: #b3e6ff;">

    <header class="header">
        <?php
        echo "<a href='#' class='logo'>👉  Hi " . $_SESSION['kidName'] . "...&#11088 </a>";

        ?>
        <nav class="navbar">
            <!-- <a href="#home" hidden>Home</a> -->
            <a href="logoutStudent.php">Logout <i style="font-size:20px" class="fa">👋</i></a>
        </nav>

    </header>

    <button class="bubbly-button" onclick="clixkMe()">Start The Game</button>





    <script>
        function clixkMe() {
            setTimeout(() => {
                window.location = "gamePanel.php"
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