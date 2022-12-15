<?php
// Start the session
session_start();
?>

<?php 
  include 'Database/dbconnect.php'; 
  if(isset($_POST['login']))
    {
    
      $name=$_POST['name'];
      $indexNumber=$_POST['indexNumber'];
      $con=new mysqli("localhost","root","",DB_DATABASE);
      echo "<script>alert($name );</script>";
      // echo "<script>alert();</script>";
      $result=$con->query("select * from student where name = '$name' AND indexNo ='$indexNumber' ");

      if($result->num_rows>0)
      {
        $row=$result->fetch_assoc();
        if(($row['name']==$name) && ($row['indexNo']==$indexNumber) ) 
        {
          $_SESSION["kidName"] =  $name;
        $_SESSION["kidIndex"] =  $indexNumber;
          
          header("location:gamePanel.php");
          $con -> close();
        }
        else
        {
          //echo "<script>alert('Incorrect details');</script>";
          header("location:loginStudent.php");
          $con -> close();
          //header("location:signUp.php");
        }
      }

    }
   

  ?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="CSS/select.css">
  <script src="select.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Select</title>
</head>
<body>
<!-- header section starts  -->

<header class="header">

  <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i>Math-4-Mind </a>

  <nav class="navbar">
      <a href="#home" hidden>home</a>
      <a href="#features" hidden>login</a>
  </nav>
 
</header>

<!-- header section ends -->

<div class="main">
  <p class="login">Select</p>
<form class="form1" method="post" ac>
  <!-- name section starts  -->
  <select name="name" id="name" class="select">
  <option selected>Select your name</option>
                                <?php
                                    include 'Database/dbconnect.php'; 
                                    $con=new mysqli("localhost","root","",DB_DATABASE);
                                    $sql = mysqli_query($con, "SELECT `indexNo`, `name` FROM `student` ");
                                    $row = mysqli_num_rows($sql);
                                    while ($row = mysqli_fetch_array($sql)){
                                    echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                                    }
                                    $con -> close();
                                ?>
  </select>
<!-- name section end  -->

<!-- index section starts  -->
<select name="indexNumber" id="index" class="select">
<option selected>Select your index No</option>
                                <?php
                                    include 'Database/dbconnect.php'; 
                                    $con=new mysqli("localhost","root","",DB_DATABASE);
                                    $sql = mysqli_query($con, "SELECT `indexNo`, `name` FROM `student` ");
                                    $row = mysqli_num_rows($sql);
                                    while ($row = mysqli_fetch_array($sql)){
                                    echo "<option value='". $row['indexNo'] ."'>" .$row['indexNo'] ."</option>" ;
                                    }
                                    $con -> close();
                                ?>
</select>
<!-- index section starts  -->
<button class="submit" type="submit" name="login" >Login</button >
</form>

</div>
</body>
</html>