<?php
  // Database connection settings
  $servername = "localhost";
  $username = "root"; // Replace with your username
  $password = ""; // Replace with your password
  $dbname = "pets";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>