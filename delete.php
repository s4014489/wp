

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    // Redirect to login if not logged in
    exit();
}

// Check if the pet ID is provided
if (!isset($_GET['id'])) {
    header("Location: pets.php"); 
    // Redirect to pets page if no ID is provided
    exit();
}

// Fetch the pet details from the database
$pet_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE id = ?");
$stmt->bind_param("i", $pet_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: pets.php"); // Redirect if no pet found
    exit();
}

$pet = $result->fetch_assoc();

// Handle deletion if confirmed
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Delete the image file from the server
    $image_path = 'images/' . $pet['image'];
    if (file_exists($image_path)) {
        unlink($image_path); // Remove the image file
    }

    // Delete the pet record from the database
    $delete_stmt = $conn->prepare("DELETE FROM pets WHERE id = ?");
    $delete_stmt->bind_param("i", $pet_id);
    $delete_stmt->execute();
    $delete_stmt->close();

    header("Location: pets.php"); // Redirect to pets page after deletion
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Pet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Delete Pet</h1>
        <p>Are you sure you want to delete the pet: <strong><?php echo htmlspecialchars($pet['name']); ?></strong>?</p>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $pet_id; ?>" method="post">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="pets.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>