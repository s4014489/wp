<?php
 include './includes/db_connect.inc'; 


// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $_SESSION['isLoggedIn'] = true; 
    $_SESSION['user_id'] = $user_id;

    // Retrieve form data
    $petName = $_POST['petname'] ?? '';
    $description = $_POST['description'] ?? '';
    $age = $_POST['age'] ?? '';
    $type = $_POST['type'] ?? '';
    $location = $_POST['location'] ?? '';
    
    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "/home/sh9/S4014489/public_html/wp/a3/images/";
        $image = basename($_FILES['image']['name']);
        $target_file = $target_dir . $image;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // File uploaded successfully
        } else {
            echo "Error moving the uploaded file.";
            exit;
        }
    } else {
        echo "Error uploading file: " . ($_FILES['image']['error'] ?? 'No file uploaded.');
        exit;
    }

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO pets (user_id, name, description, age, type, location, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $userId, $petName, $description, $age, $type, $location, $image);
    
    // Execute the query
    if ($stmt->execute()) {
        echo "Pet added successfully!";
    } else {
        echo "Error adding pet: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "You must be logged in to add a pet.";
}

?>