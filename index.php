<?php
// Start the session
session_start();
?>

<?php
include 'Database/dbconnect.php';


if (isset($_POST['name']) && isset($_POST['indexNumber'])) {
  $name = $_POST['name'];
  $indexNumber = $_POST['indexNumber'];


  $con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
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

  <!-- <link rel="stylesheet" href="CSS/test.css"> -->
  <script src="select.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Math 4 Mind</title>
  <style>
    :root {
      --orange: #ff7800;
      --black: #000000;
      --light-color: #666;
      --box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
      --border: 0.2rem solid rgba(0, 0, 0, 0.1);
      --outline: 0.1rem solid rgba(0, 0, 0, 0.1);
      --outline-hover: 0.2rem solid var(--black);
    }

    * {
      font-family: "Poppins", sans-serif;
      margin: 0;
      box-sizing: border-box;
      outline: none;
      border: none;
      text-decoration: none;
      text-transform: capitalize;
      transition: all 0.2s linear;
    }

    html {
      font-size: 62.5%;
    }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
      padding: 0;
    }

    .heading {
      text-align: center;
      padding: 2rem 0;
      padding-bottom: 3rem;
      font-size: 3.5rem;
      color: var(--black);
    }

    .heading span {
      background: var(--orange);
      color: #fff;
      display: inline-block;
      padding: 0.5rem 3rem;
      clip-path: polygon(100% 0, 93% 50%, 100% 99%, 0% 100%, 7% 50%, 0% 0%);
    }

    .btn {
      margin-top: 1rem;
      display: inline-block;
      padding: 0.8rem 3rem;
      font-size: 1.7rem;
      border-radius: 0.5rem;
      border: 0.2rem solid var(--black);
      color: var(--black);
      cursor: pointer;
      background: none;
    }

    .btn:hover {
      background: var(--orange);
      color: #fff;
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      display: flex;
      margin-left: auto;
      margin-right: auto;
      padding: 2rem 9%;
      background: #fff;
      box-shadow: var(--box-shadow);
      align-items: center;
      justify-content: center;
    }

    .header .logo i {
      color: var(--orange);
    }

    .header .navbar a {
      font-size: 1.7rem;
      margin: 0 1rem;
    }

    .header .navbar a:hover {
      color: var(--orange);
    }

    .main {
      width: 90%;
      max-width: 400px;
      margin: auto;
      color: #000000;
      border-radius: 5px;
      box-shadow: 10px 10px 5px #87ceeb;
      background-color: #57aeff;
      padding: 30px;
      box-sizing: border-box;
    }

    .login {
      /* padding-top: 20px; */
      padding-top: 15px;

      font-size: 33px;
      text-align: center;
      /* margin-top: 0.5em;
            font-size: 2.5rem; */
      font-weight: bolder;
      color: rgb(52, 95, 152);
    }

    .select {

      padding-bottom: 10px;
      width: 75%;
      color: rgb(29, 29, 29);
      font-weight: 700;
      font-size: 17px;
      background: rgb(236, 236, 236);
      border-radius: 5px;
      box-sizing: border-box;
      border: 2px solid rgba(82, 60, 60, 0.76);
      text-align: center;
      font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: stretch;
      margin-left: auto;
      margin-right: auto;
      margin-top: 1.5em;
    }

    .submit {
      margin-top: 2em;
      width: 90px;
      cursor: pointer;
      border-radius: 5px;
      color: #fff;
      background: linear-gradient(to right, #929292, #929292);
      box-shadow: 0 0 20px 1px #d3d3d3;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      display: flex;

      margin-bottom: 1em;
      padding: 2%;
      align-items: center;
      justify-content: center;
    }

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
      border: 1px solid rgba(255, 255, 255, 0.1);
      background-image: url("data:image/svg+xml,%3Csvg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 50 50' style='enable-background:new 0 0 50 50%3B' xml:space='preserve'%3E%3Cstyle type='text/css'%3E.st1%7Bopacity:0.3%3Bfill:%23FFFFFF%3B%7D.st3%7Bopacity:0.1%3Bfill:%23FFFFFF%3B%7D%3C/style%3E%3Ccircle class='st1' cx='5' cy='8' r='1'/%3E%3Ccircle class='st1' cx='38' cy='3' r='1'/%3E%3Ccircle class='st1' cx='12' cy='4' r='1'/%3E%3Ccircle class='st1' cx='16' cy='16' r='1'/%3E%3Ccircle class='st1' cx='47' cy='46' r='1'/%3E%3Ccircle class='st1' cx='32' cy='10' r='1'/%3E%3Ccircle class='st1' cx='3' cy='46' r='1'/%3E%3Ccircle class='st1' cx='45' cy='13' r='1'/%3E%3Ccircle class='st1' cx='10' cy='28' r='1'/%3E%3Ccircle class='st1' cx='22' cy='35' r='1'/%3E%3Ccircle class='st1' cx='3' cy='21' r='1'/%3E%3Ccircle class='st1' cx='26' cy='20' r='1'/%3E%3Ccircle class='st1' cx='30' cy='45' r='1'/%3E%3Ccircle class='st1' cx='15' cy='45' r='1'/%3E%3Ccircle class='st1' cx='34' cy='36' r='1'/%3E%3Ccircle class='st1' cx='41' cy='32' r='1'/%3E%3C/svg%3E");
      background-position: 0px 0px;
      animation: animatedBackground 10s linear infinite;
    }

    /* Media queries for responsive design */
    @media screen and (max-width: 767px) {
      .main {
        padding: 20px;
      }

      .responsive-image {
        max-height: 120px;
      }

      .login {
        font-size: 2rem;
      }
    }

    @media screen and (min-width: 768px) and (max-width: 1023px) {
      .main {
        padding: 25px;
      }

      .responsive-image {
        max-height: 150px;
      }
    }

    @media screen and (min-width: 1024px) {
      .main {
        padding: 30px;
      }
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
  <style>
    /* Base styles for the image */
    .responsive-image {

      max-width: 100%;
      /* Ensures the image won't exceed its original size */
      height: 180px;
      /* Allows the image to maintain its aspect ratio */
      display: block;
      /* Removes any extra space around the image */
      margin: 0 auto;
      /* Centers the image horizontally */
    }

    /* Media queries for different screen sizes */
    @media screen and (max-width: 767px) {

      /* Styles for screens with a maximum width of 767px (e.g., smartphones) */
      .responsive-image {
        /* Add specific styles for smaller screens if needed */
      }
    }

    @media screen and (min-width: 768px) and (max-width: 1023px) {

      /* Styles for screens with a minimum width of 768px and a maximum width of 1023px (e.g., tablets) */
      .responsive-image {
        /* Add specific styles for medium-sized screens if needed */
      }
    }

    @media screen and (min-width: 1024px) {

      /* Styles for screens with a minimum width of 1024px (e.g., desktops) */
      .responsive-image {
        /* Add specific styles for larger screens if needed */
      }
    }
  </style>


</head>

<body style="background-color: #D8BFD8;" class="snow">
  <!-- header section starts  -->

  <header class="header">
    <nav class="navbar">
      <a href="#" class="logo" style=" font-size: 2.5rem;
  font-weight: bolder;
  color: rgb(52, 95, 152);"> ⋆✨Math 4 Mind✨⋆ </a>

    </nav>
  </header>

  <!-- header section ends -->

  <div class="main" style="background-color: #F3FFFF;">
    <img class="responsive-image" src="Images/42248.jpg" alt="Your Image">
    <h3 class="login">Welcome home</h3>

    <form class="form1" method="post">
      <!-- name section starts  -->
      <select name="name" id="name" class="select">
        <option selected>Choose Your Name</option>
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
        <option selected>Choose Your Index No</option>
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
      <button class="submit" type="submit" name="login" style=" text-shadow: 2px 2px 4px gray; font-size:18px">Login </button>
    </form>

  </div>
</body>

</html>