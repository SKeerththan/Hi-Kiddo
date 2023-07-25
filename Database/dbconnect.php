<?php
//  define('DB_SERVER', 'sql210.unaux.com');
//  define('DB_USERNAME', 'unaux_34685350');
//  define('DB_PASSWORD', 'xvzbjgmy4g');
//  define('DB_DATABASE', 'unaux_34685350_hikiddo');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'hikiddo');


$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
