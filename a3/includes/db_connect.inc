<?php
  // Database connection settings
  $servername = "talsprddb02.int.its.rmit.edu.au";
  $db_username = "s4014489"; // Replace with your username
  $db_password = "Q]y%~A&}.x8n9<u2"; // Replace with your password
  $dbname = "s4014489";

  // Create connection
  $conn = new mysqli($servername, $db_username, $db_password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>