<?php
  // Database connection settings
  $servername = "localhost";
  $username = "s4014489"; // Replace with your username
  $password = "your_password"; // Replace with your password
  $dbname = "Jacob 5";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>