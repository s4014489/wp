<?php
require_once 'includes/db_connect.inc';

// Retrieve data from form submission
$petName = $_POST['petname'] ??'';
$description = $_POST['description']??'';
$caption = $_POST['imagecaption']??'';
$age = $_POST['age']??'';
$type = $_POST['type']??'';
$location = $_POST['location']??'';
$imagePath = $_FILES['image']['name']??'';

// Define the target directory for image uploads
$targetDir = __DIR__ . '/images/';

// Process image upload
$imageFileName = basename($_FILES['image']['name']);
$targetFile = $targetDir . $imageFileName;
if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    // Image uploaded successfully
} else {
    // Handle image upload error
    echo 'Error uploading image';
    exit;
}

// Insert data into pets table
$query = "INSERT INTO pets (petname, description, caption, age, type, location, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Bind parameters with meaningful variable names
$stmt->bind_param("sssssss", 
  $petName, 
  $description, 
  $caption, 
  $age, 
  $type, 
  $location, 
  $imageFileName
);

// Execute the query
if ($stmt->execute()) {
    // Query executed successfully
} else {
    // Handle query error
    echo 'Error executing query: ' . $stmt->error;
    exit;
}
?> 