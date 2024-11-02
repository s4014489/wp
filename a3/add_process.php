<?php


session_start(); // Start the session

include './includes/db_connect.inc'; 


// Retrieve form data
$petName = $_POST['petname'] ?? '';
$description = $_POST['description'] ?? '';
$age = $_POST['age'] ?? '';
$type = $_POST['type'] ?? '';
$location = $_POST['location'] ?? '';
$caption = $_POST['caption'] ?? '';


// Initialize userId
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; // Use the logged-in user's ID or 0 if not logged in

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
$stmt = $conn->prepare("INSERT INTO pets (user_id, petName, description, image, caption, age, location, type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Use the userId variable to bind the parameter
$stmt->bind_param("isssssss", $userId, $petName, $description, $image, $caption, $age, $location, $type);

// Execute the query
if ($stmt->execute()) {
    // Redirect to pets.php after successful addition
    header("Location: pets.php");
    exit; // Ensure no further code is executed after the redirect
} else {
    header("Location: add.php");
    echo "Error adding pet: " . $stmt->error;
}
// Close statement and connection
$stmt->close();
$conn->close();

include './includes/footer.inc';
?>