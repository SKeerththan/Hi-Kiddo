<?php
// Start the session
session_start();
?>

<?php
include 'Database/dbconnect.php';
if (isset($_POST['login'])) {

  $name = $_POST['name'];
  $indexNumber = $_POST['indexNumber'];
  $con = new mysqli("localhost", "root", "", DB_DATABASE);
  echo "<script>alert($name );</script>";
  // echo "<script>alert();</script>";
  $result = $con->query("select * from student where name = '$name' AND indexNo ='$indexNumber' ");

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (($row['name'] == $name) && ($row['indexNo'] == $indexNumber)) {
      $_SESSION["kidName"] =  $name;
      $_SESSION["kidIndex"] =  $indexNumber;

      // header("location:gamePanel.php");
      header("location:Play.php");
      $con->close();
    } else {
      //echo "<script>alert('Incorrect details');</script>";
      header("location:loginStudent.php");
      $con->close();
      //header("location:signUp.php");
    }
  }
}


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="CSS/loginStudent.css">
  <script src="select.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hi</title>
  <style>
    .containerBG {
      background-image: url("Images/6.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100%;



    }

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

    /* .snow div {
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50%3B' xml:space='preserve'%3E%3Cstyle type='text/css'%3E.st1%7Bopacity:0.7%3Bfill:%23FFFFFF%3B%7D.st3%7Bopacity:0.1%3Bfill:%23FFFFFF%3B%7D%3C/style%3E%3Ccircle class='st3' cx='4' cy='14' r='1'/%3E%3Ccircle class='st3' cx='43' cy='3' r='1'/%3E%3Ccircle class='st3' cx='31' cy='30' r='2'/%3E%3Ccircle class='st3' cx='19' cy='23' r='1'/%3E%3Ccircle class='st3' cx='37' cy='22' r='1'/%3E%3Ccircle class='st3' cx='43' cy='16' r='1'/%3E%3Ccircle class='st3' cx='8' cy='45' r='1'/%3E%3Ccircle class='st3' cx='29' cy='39' r='1'/%3E%3Ccircle class='st3' cx='13' cy='37' r='1'/%3E%3Ccircle class='st3' cx='47' cy='32' r='1'/%3E%3Ccircle class='st3' cx='15' cy='4' r='2'/%3E%3Ccircle class='st3' cx='9' cy='27' r='1'/%3E%3Ccircle class='st3' cx='30' cy='9' r='1'/%3E%3Ccircle class='st3' cx='25' cy='15' r='1'/%3E%3Ccircle class='st3' cx='21' cy='45' r='2'/%3E%3Ccircle class='st3' cx='42' cy='45' r='1'/%3E%3C/svg%3E");
          
            animation: animatedBackground 15s linear infinite;
        } */

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

<body style="background-color: #76c7f1;" class="snow">

  <!-- <body style="  background-image: url('Images/6.jpg');background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;"> -->
  <!-- header section starts  -->

  <header class="header">
    <nav class="navbar">
      <a href="#" class="logo" style="  font-family: 'Brush Script MT', cursive;text-shadow: 2px 2px 4px gray; font-size:28px;"> ⋆✨Math-4-Mind✨⋆ </a>
    </nav>

    <!-- <a href="#" class="logo" style="  font-family: 'Brush Script MT', cursive;text-shadow: 2px 2px 4px gray; font-size:30px;" > Math-4-Mind </a> -->

    <!-- <nav class="navbar">
      <a href="#home" hidden>home</a>
      <a href="#features" hidden>login</a>
  </nav> -->

  </header>

  <!-- header section ends -->

  <div class="main ">
    <!-- birds starts  -->
    <div class="container">

      <div class="bird-container bird-container--one">
        <div class="bird bird--one"></div>
      </div>

      <div class="bird-container bird-container--two">
        <div class="bird bird--two"></div>
      </div>

      <div class="bird-container bird-container--three">
        <div class="bird bird--three"></div>
      </div>

      <div class="bird-container bird-container--four">
        <div class="bird bird--four"></div>
      </div>


    </div>
    <!-- birds ends  -->
    <p class="login" style="font-family: 'Brush Script MT', cursive;font-size:28px;text-shadow: 2px 2px 4px gray; font-size:30px;">Hi Kiddo...&#128512;
    </p>
    <form class="form1" method="post" ac>
      <!-- name section starts  -->
      <select name="name" id="name" class="select">
        <option selected>Name</option>
        <?php
        include 'Database/dbconnect.php';
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT `indexNo`, `name` FROM `student` ");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)) {
          echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
        }
        $con->close();
        ?>
      </select>
      <!-- name section end  -->

      <!-- index section starts  -->
      <select name="indexNumber" id="index" class="select">
        <option selected>Index No</option>
        <?php
        include 'Database/dbconnect.php';
        $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        $sql = mysqli_query($con, "SELECT `indexNo`, `name` FROM `student` ");
        $row = mysqli_num_rows($sql);
        while ($row = mysqli_fetch_array($sql)) {
          echo "<option value='" . $row['indexNo'] . "'>" . $row['indexNo'] . "</option>";
        }
        $con->close();
        ?>
      </select>
      <!-- index section starts  -->
      <button class="submit" type="submit" name="login" style="  font-family: 'Brush Script MT', cursive;text-shadow: 2px 2px 4px gray; font-size:18px">Login</button>
    </form>

  </div>
</body>

</html>