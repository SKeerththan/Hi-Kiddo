<?php
//  define('DB_SERVER', 'sql305.unaux.com');
//  define('DB_USERNAME', 'unaux_33182317');
//  define('DB_PASSWORD', 'ggkaqt');
//  define('DB_DATABASE', 'unaux_33182317_hikiddo');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'hikiddo');

 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (!$db){
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?> 