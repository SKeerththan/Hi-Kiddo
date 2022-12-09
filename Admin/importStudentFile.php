<?php
 include 'Database/dbconnect.php'; 
// sql code to create table
// if(isset($_POST['submit_file']))
// {
//     $fileName = "jhc";
//     $adminEmail = "test@test.com";
//     $sql = "CREATE TABLE $fileName(
//     indexNo VARCHAR(200)  PRIMARY KEY, 
//     name VARCHAR(300) NOT NULL,
//     grade VARCHAR(300) NOT NULL,
//     division VARCHAR(500) NOT NULL

//     )";
//     $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//     if ($conn->query($sql) === TRUE) {
//     echo "Table employees created $fileName";
//     //$result=$conn->query("insert into statusorganization(adminEmail,fileName,isActive) values('$adminEmail','$fileName','1')");
//     } else {
//     echo "Error creating table: " . $conn->error;
//     }
//     $conn->close();
// }







<!DOCTYPE html>
<html>
<body>
<div id="wrapper">
 <form method="post" action="" enctype="multipart/form-data">
  <input type="file" name="file"/>
  <input type="submit" name="submit_file" value="Submit"/>
 </form>
</div>
</body>
</html>

