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

    <title>Kiddo</title>
</head>


<body class="">
    <header class="header">
        <?php
        echo "<a href='#' class='logo'> Hi " . $_SESSION['kidName'] . " </a>";

        ?>
        <nav class="navbar">
            <a href="#home" hidden>home</a>
            <a href="logoutStudent.php">Logout <i style="font-size:20px" class="fa">&#xf08b;</i></a>
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
        <p class='small'>Card description with lots of great facts and interesting details.</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelOneCount . "/10
            </div>
        </div>
    </a>";

        if ($levelOneCount >= 10) {
            echo "<a class='card1' href='Level2.php'>
        <h3>Level 2</h3>
        <p class='small'>Card description with lots of great facts and interesting details.</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelTwoCount . "/10
            </div>
        </div>
    </a>";
        }else{
            echo "<a class='card1' href='Level2.php' style='pointer-events:none;'>
        <h3>Level 2</h3>
        <p class='small'>Card description with lots of great facts and interesting details.</p>
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
        <p class='small'>Card description with lots of great facts and interesting details.</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelThreeCount . "/10
            </div>
        </div>
    </a>";
        }else{
            echo "<a class='card1' href='Level3.php' style='pointer-events:none;'>
        <h3>Level 3</h3>
        <p class='small'>Card description with lots of great facts and interesting details.</p>
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
        <p class='small'>Card description with lots of great facts and interesting details.</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelFourCount . "/10
            </div>
        </div>
    </a>";
        }else{
            echo "<a class='card1' href='Level4.php' style='pointer-events:none;'>
        <h3>Level 4</h3>
        <p class='small'>Card description with lots of great facts and interesting details.</p>
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
        <p class='small'>Card description with lots of great facts and interesting details.</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelFiveCount . "/10
            </div>
        </div>
    </a>";
        }else{
            echo "<a class='card1' href='Level5.php' style='pointer-events:none;'>
        <h3>Level 5</h3>
        <p class='small'>Card description with lots of great facts and interesting details.</p>
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
        <p class='small'>Card description with lots of great facts and interesting details.</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelSixCount . "/10
            </div>
        </div>
    </a>";
        }else{
            echo "<a class='card1' href='Level6F.php' style='pointer-events:none;'>
        <h3>Level 6</h3>
        <p class='small'>Card description with lots of great facts and interesting details.</p>
        <div class='go-corner' href='#'>
            <div class='go-arrow'>
                
                " . $levelSixCount . "/10
            </div>
        </div>
    </a>";
        }



        ?>

        <!-- <a class="card1" href="Level1.php">
            <h3>Level 1</h3>
            <p class="small">Card description with lots of great facts and interesting details.</p>
            <div class="go-corner" href="#">
                <div class="go-arrow">
                    
                    4/10
                </div>
            </div>
        </a> -->
        <!-- <a class="card1" href="Level2.php" >
            <h3>Level 2</h3>
            <p class=" small">Card description with lots of great facts and interesting details.</p>
            <div class="go-corner" href="#">
                <div class="go-arrow">
                    →
                </div>
            </div>
        </a>
        <a class="card1" href="Level3.php">
            <h3>Level 3</h3>
            <p class=" small">Card description with lots of great facts and interesting details.</p>
            <div class="go-corner" href="#">
                <div class="go-arrow">
                    →
                </div>
            </div>
        </a> -->
        <!-- <a class="card1" href="Level4.php">
            <h3>Level 4</h3>
            <p class=" small">Card description with lots of great facts and interesting details.</p>
            <div class="go-corner" href="#">
                <div class="go-arrow">
                    →
                </div>
            </div>
        </a> -->
        <!-- <a class="card1" href="Level5.php">
            <h3>Level 5</h3>
            <p class=" small">Card description with lots of great facts and interesting details.</p>
            <div class="go-corner" href="#">
                <div class="go-arrow">
                    →
                </div>
            </div>
        </a> -->
        <!-- <a class="card1" href="Level6.php">
            <h3>Level 6</h3>
            <p class=" small">Card description with lots of great facts and interesting details.</p>
            <div class="go-corner" href="#">
                <div class="go-arrow">
                    →
                </div>
            </div>
        </a> -->

    </div>



</body>

</html>