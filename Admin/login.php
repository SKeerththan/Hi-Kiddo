<?php 
  include 'Database/dbconnect.php'; 
  if(isset($_POST['login']))
    {
      $email=$_POST['email'];
      $password=$_POST['password'];
      $con=new mysqli("localhost","root","",DB_DATABASE);
      $result=$con->query("select * from admin where email = '$email'");
     
    if($result->num_rows>0)
      {
        $row=$result->fetch_assoc();
        if($row['password']==$password)
        {
          
          header("location:adminPanel.php");
          $con -> close();
        }
        else
        {
          echo "<script>alert('wrong password');</script>";
          $con -> close();
          //header("location:signUp.php");
        }
      }
      
      
    }
   

  ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="CSS/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sign in</title>
</head>

<body>
  <div class="main">
    <p class="sign">Sign in</p>

    <form class="form1" method="post">
      <input class="user " type="text"  name = "email" placeholder="example@example.com">
      <input class="pass" type="password"   name = "password" placeholder="Example123">
      <button class="submit" name="login" value="Sign In">Submit</button>
      <button class="Organization"  hidden>Organization</button>
    </form>

  </div>

  
  

</body>

</html>