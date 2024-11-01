<?php
session_start(); // Start the session

// Remove the check for user login
// You can still keep the session variable for other purposes if needed

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

// Set a default user_id or handle accordingly since we no longer check if the user is logged in
$defaultUser Id = 0; // Use a default user ID or handle accordingly
$stmt->bind_param("issssss", $defaultUser Id, $petName, $description, $age, $type, $location, $image);

// Execute the query
if ($stmt->execute()) {
    echo "Pet added successfully!";
} else {
    echo "Error adding pet: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

include './includes/footer.inc';
?>