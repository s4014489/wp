<?php include('db_connect.inc'); ?>
<?php
  // Process form data and upload image to images folder
  // Insert data into pets table
  $query = "INSERT INTO pets (petname, description, caption, age, type, location, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sssssss", $petname, $description, $caption, $age, $type, $location, $image);
  $stmt->execute();
  $stmt->close();
  $conn->close();
  header('Location: pets.php');
  exit;
?>