<?php
// Start the session if needed
session_start();

// Include database connection file
require_once 'includes/db_connect.inc'; // Ensure this file sets up $conn

// Define the target directory for image uploads
$target_dir = "/home/sh9/S4014489/public_html/wp/a3/images/";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from form submission
    $petName = $_POST['petname'] ?? '';
    $description = $_POST['description'] ?? '';
    $caption = $_POST['imagecaption'] ?? '';
    $age = $_POST['age'] ?? '';
    $type = $_POST['type'] ?? '';
    $location = $_POST['location'] ?? '';
    $imageFileName = $_FILES['image']['name'] ?? '';

    // Check if the file input is set
    if (isset($_FILES['image'])) {
        // Check for upload errors
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_file = $target_dir . basename($_FILES['image']['name']);

            // Attempt to move the uploaded file to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "The file has been uploaded successfully.";

                // Insert data into pets table
                $query = "INSERT INTO pets (petname, description, caption, age, type, location, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);

                // Bind parameters with variable names
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
                    echo "Data inserted successfully.";
                } else {
                    // Handle query error
                    echo 'Error executing query: ' . $stmt->error;
                }
            } else {
                echo "Error moving the uploaded file. Check directory permissions.";
            }
        } else {
            // Handle upload error
            echo "Error uploading file: " . $_FILES['image']['error'];
        }
    } else {
        echo "No file uploaded.";
    }
} else {
    echo "Invalid request method.";
}
?>
