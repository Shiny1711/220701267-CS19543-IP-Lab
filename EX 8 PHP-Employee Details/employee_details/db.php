<?php
  define("DB_HOST", "localhost:3307");
  define("DB_USER", "root");
  define("DB_PASSWORD", "");
  define("DB_DATABASE", "employee");

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  
 ?>