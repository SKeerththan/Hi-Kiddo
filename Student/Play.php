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

</head>

<body style="background-color: #b3e6ff;">
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