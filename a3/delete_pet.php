<?php
include './includes/header.inc';
include './includes/nav.inc';
include './includes/db_connect.inc';

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
    // Delete the associated image file if it exists
    $image_path = 'images/' . $pet['image'];
    if (file_exists($image_path)) {
        unlink($image_path); // Delete the image file
    }

    // Prepare the delete statement
    $delete_stmt = $conn->prepare("DELETE FROM pets WHERE petid = ?");
    if (!$delete_stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $delete_stmt->bind_param("i", $petid); // Bind the petid parameter
    
    // Execute the delete statement
    if ($delete_stmt->execute()) {
        if ($delete_stmt->affected_rows > 0) {
            // Successfully deleted
            header("Location: pets.php"); // Redirect to pets.php
            exit();
        } else {
            // Deletion failed, no rows affected
            echo "No rows deleted. Please check if the pet exists.";
        }
    } else {
        die("Deletion failed: " . $delete_stmt->error);
    }
    
    $delete_stmt->close(); // Close the statement
}

$stmt->close(); // Close the initial statement
?>

<!-- HTML form to confirm deletion -->
<div class="container"> 
<form method="POST">
    <p>Are you sure you want to delete the pet: <?php echo htmlspecialchars($pet['petname']); ?>?</p>
    <input type="submit" value="Delete">
    <a href="pets.php">Cancel</a>
</form>
</div> 