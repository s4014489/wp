<?php include './includes/db_connect.inc'; ?>


<?php
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

// Check if the pet ID is provided
if (!isset($_GET['petid'])) {
    header("Location: pets.php"); 
    exit();
}

// Fetch the pet details from the database
$petid = $_GET['petid'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE petid = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $petid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: pets.php"); 
    exit();
}

$pet = $result->fetch_assoc();

// Handle deletion if confirmed
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_path = 'images/' . $pet['image'];
    if (file_exists($image_path)) {
        unlink($image_path); 
    }

    $delete_stmt = $conn->prepare("DELETE FROM pets WHERE petid = ?");
    if (!$delete_stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $delete_stmt->bind_param("i", $petid);
    
    if ($delete_stmt->execute()) {
        if ($delete_stmt->affected_rows > 0) {
            // Successfully deleted
            header("Location: pets.php"); 
            exit();
        } else {
            // Deletion failed, no rows affected
            echo "No rows deleted. Please check if the pet exists.";
        }
    } else {
        die("Deletion failed: " . $delete_stmt->error);
    }
    
    $delete_stmt->close();
}