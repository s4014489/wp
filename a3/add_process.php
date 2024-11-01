<?php
session_start(); // Start the session

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $_SESSION['isLoggedIn'] = true;

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve and sanitize form data
        $petName = trim($_POST['petname'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $age = trim($_POST['age'] ?? '');
        $type = trim($_POST['type'] ?? '');
        $location = trim($_POST['location'] ?? '');

        // Handle file upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "/home/sh9/S4014489/public_html/wp/a3/images/";
            $image = basename($_FILES['image']['name']);
            $target_file = $target_dir . $image;

            // Validate file type (optional)
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                echo "Invalid file type. Only JPG, PNG, and GIF files are allowed.";
                exit;
            }

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

        // Establish database connection (ensure $conn is defined)
        // Example: $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO pets (user_id, name, description, age, type, location, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        
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
        echo "Invalid request method.";
    }
} else {
    echo "You must be logged in to add a pet.";
}

include './includes/footer.inc';
?>