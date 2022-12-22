<?php
// Start the session
session_start();
?>

<?php
include 'Database/dbconnect.php';
if (isset($_POST['login'])) {

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
  <link rel="stylesheet" href="CSS/log.css">
  <script src="select.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Hi</title>

</head>

<body style="background-color: #b3e6ff;" class="snow">

  <!-- header section starts  -->

  <header class="header">
    <nav class="navbar">
      <a href="#" class="logo" style="  font-family: 'Brush Script MT', cursive;text-shadow: 2px 2px 4px gray; font-size:28px;"> ⋆✨Math-4-Mind✨⋆ </a>
    </nav>
  </header>

  <!-- header section ends -->

  <div class="main ">

    <div class="login">Hi Kiddo</div>
    <form class="form1" method="post">
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
      <button class="submit" type="submit" name="login" style="  font-family: 'Brush Script MT', cursive;text-shadow: 2px 2px 4px gray; font-size:18px">Login </button>
    </form>

  </div>
</body>

</html>