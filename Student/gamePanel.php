<?php
// Start the session
if(!session_start()){
    header("location:loginStudent.php");
}


?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/loginStudent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Kiddo</title>
</head>


<body class="">

    <!-- <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-md">
                    <a class="navbar-brand" href="#">Hi Kiddo</a>
                    <a class="navbar-brand" href="#">Logout <span class="glyphicon">&#xe163;</span></a>
                </div>
            </nav>
        </div>
    </div> -->

    <header class="header">

        <?php
        echo "<a href='#' class='logo'> Hi " . $_SESSION['kidName'] . " </a>";

        ?>


        <nav class="navbar">
            <a href="#home" hidden>home</a>
            <a href="logoutStudent.php">Logout <i style="font-size:20px" class="fa">&#xf08b;</i></a>
        </nav>

    </header>


    <a href="findNumber.php">level-1</a><br>
    <a href="findObjectByNumber.html">level-2</a> <br>
    <a href="addNumber.html">level-3</a> <br>
    <a href="subNumber.html">level-4</a> <br>
    <a href="multiNumber.html">level-5</a> <br>
    <a href="divideNumber.html">level-6</a> <br>






    <!-- header section ends -->


</body>

</html>