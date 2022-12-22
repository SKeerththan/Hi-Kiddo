<?php
// Start the session
if (!session_start()) {
    header("location:loginStudent.php");
}

?>


<?php
$studentIndexNumber = $_SESSION['kidIndex'];
include 'Database/dbconnect.php';
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$sql = mysqli_query($con, "SELECT * FROM `student` where indexNo=$studentIndexNumber ");
$row = mysqli_num_rows($sql);
$con->close();
$url = "";
while ($row = mysqli_fetch_array($sql)) {

    $levelOneCount = $row['levelOne'];
    $levelTwoCount = $row['levelTwo'];
    $levelThreeCount = $row['levelThree'];
    $levelFourCount = $row['levelFour'];
    $levelFiveCount = $row['levelFive'];
    $levelSixCount = $row['levelSix'];
}

if ($levelOneCount <= 9) {
    header("location:Level1.php");
} else if ($levelTwoCount <= 9) {
    header("location:Level2.php");
} else if ($levelThreeCount <= 9) {
    header("location:Level3.php");
} else if ($levelFourCount <= 9) {
    header("location:Level4.php");
} else if ($levelFiveCount <= 9) {
    header("location:Level5.php");
} else if ($levelSixCount <= 9) {
    header("location:Level6.php");
} else {
   header("location:gameOver.php");
    
}


?>