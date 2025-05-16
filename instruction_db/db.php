<?php
   $db_server = "localhost";
   $db_user = "root";
   $db_pass = "";
   $db_name = "instruktiondb";

   $conn = new mysqli(
    $db_server,
    $db_user,
    $db_pass,
    $db_name
   );
   if ($conn) {
    echo"connected";
   }
   else {
    echo"connection error";
   }

?>