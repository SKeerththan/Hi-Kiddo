<?php
// Start the session
if (!session_start()) {
    header("location:loginStudent.php");
}


?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/gamepanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Kiddo</title>
    <style>
        #notifypop {
            display: none;
        }



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


<body class="snow" style="background-color: #C5E1A5;">

    <header class="header">
        <?php
        echo "<a href='#' style='color:rgb(52, 95, 152)' class='logo'>  Hi " . $_SESSION['kidName'] . " 😜 </a>";

        ?>
        <nav class="navbar">
            <a href="Play.php" hidden>Go Back</a>
            <a style='color:rgb(52, 95, 152)' href="logoutStudent.php"> Logout &nbsp;<i class="fa-solid fa-right-from-bracket"> </i> </a>
        </nav>

    </header>


    <div class="container">

        <?php
        $levelOneCount;
        $levelTwoCount;
        $levelThreeCount;
        $levelFourCount;
        $levelFiveCount;
        $levelSixCount;
        $studentIndexNumber = $_SESSION['kidIndex'];

        include 'Database/dbconnect.php';
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT * FROM `student` where indexNo=$studentIndexNumber ");
        $row = mysqli_num_rows($sql);
        $con->close();
        while ($row = mysqli_fetch_array($sql)) {

            $levelOneCount = $row['levelOne'];
            $levelTwoCount = $row['levelTwo'];
            $levelThreeCount = $row['levelThree'];
            $levelFourCount = $row['levelFour'];
            $levelFiveCount = $row['levelFive'];
            $levelSixCount = $row['levelSix'];
        }
        echo "<a class='card1' href='Level1.php'>
        <h3>Level 1</h3>
        <p class='small'>Find The Numbers</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelOneCount . "/10
            </div>
        </div>
    </a>";

        if ($levelOneCount >= 10) {
            echo "<a class='card1' href='Level2.php'>
        <h3>Level 2</h3>
        <p class='small'>Find The Fruits</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelTwoCount . "/10
            </div>
        </div>
    </a>";
        } else {
            echo "<a class='card1' href='Level2.php' style='pointer-events:none;'>
        <h3>Level 2</h3>
        <p class='small'>Find The Fruits</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelTwoCount . "/10
            </div>
        </div>
    </a>";
        }

        if ($levelTwoCount >= 10) {
            echo "<a class='card1' href='Level3.php'>
        <h3>Level 3</h3>
        <p class='small'>Addition Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelThreeCount . "/10
            </div>
        </div>
    </a>";
        } else {
            echo "<a class='card1' href='Level3.php' style='pointer-events:none;'>
        <h3>Level 3</h3>
        <p class='small'>Addition Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelThreeCount . "/10
            </div>
        </div>
    </a>";
        }

        if ($levelThreeCount >= 10) {
            echo "<a class='card1' href='Level4.php'>
        <h3>Level 4</h3>
        <p class='small'>Subtraction Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelFourCount . "/10
            </div>
        </div>
    </a>";
        } else {
            echo "<a class='card1' href='Level4.php' style='pointer-events:none;'>
        <h3>Level 4</h3>
        <p class='small'>Subtraction Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelFourCount . "/10
            </div>
        </div>
    </a>";
        }

        if ($levelFourCount >= 10) {
            echo "<a class='card1' href='Level5.php'>
        <h3>Level 5</h3>
        <p class='small'>Multiplication Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelFiveCount . "/10
            </div>
        </div>
    </a>";
        } else {
            echo "<a class='card1' href='Level5.php' style='pointer-events:none;'>
        <h3>Level 5</h3>
        <p class='small'>Multiplication Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelFiveCount . "/10
            </div>
        </div>
    </a>";
        }

        if ($levelFiveCount >= 10) {
            echo "<a class='card1' href='Level6.php'>
        <h3>Level 6</h3>
        <p class='small'>Division Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelSixCount . "/10
            </div>
        </div>
    </a>";
        } else {
            echo "<a class='card1' href='Level6F.php' style='pointer-events:none;'>
        <h3>Level 6</h3>
        <p class='small'>Division Practices</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelSixCount . "/10
            </div>
        </div>
    </a>";
        }



        ?>


    </div>





</body>

</html>