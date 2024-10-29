<?php
include './includes/db_connect.inc'; // Database connection
include './includes/header.inc';


// Check if the pet ID is set in the URL
if (isset($_GET['petid'])) {
    $petid = $_GET['petid'];

    // Fetch the current details of the pet
    $sql = "SELECT * FROM pets WHERE petid = ?";
    $stmt = $conn->prepare($sql);

    // Check if the prepare was successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $petid);
    $stmt->execute();
    $result = $stmt->get_result();
    $pet = $result->fetch_assoc();

    // Check if pet exists
    if (!$pet) {
        echo "Pet not found!";
        exit;
    }
} else {
    echo "No pet ID provided!";
    exit;
}

// Update pet details if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Get the pet ID from the form
     $pet_id = $_POST['pet_id'];
     $petname = $_POST['petname'];
     $type = $_POST['type'];
     $age = $_POST['age'];
     $location = $_POST['location'];
     $description = $_POST['description'];
 
     // Handle image upload
     $imagePath = '';
     if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
         $uploadDir = 'images/'; // Directory to save uploaded images
         $imagePath = $uploadDir . basename($_FILES['image']['name']);
         move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
     }
 
     // Prepare the SQL query
     $sql = "UPDATE pets SET petname = ?, type = ?, age = ?, location = ?, description = ?, image = ? WHERE id = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("ssssssi", $petname, $type, $age, $location, $description, $imagePath, $pet_id);
 
     // Execute the query
     if ($stmt->execute()) {
         echo "Pet updated successfully.";
     } else {
         echo "Error updating pet: " . $stmt->error;
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet - Pets Victoria</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Edit Pet Details</h2>
 <form action="update_pet.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="pet_id" value="<?php echo $pet_id; ?>"> <!-- Hidden field for the pet ID -->
    <label for="petname">Pet Name:</label>
    <input type="text" name="petname" required>

    <label for="type">Type:</label>
    <input type="text" name="type" required>

    <label for="age">Age:</label>
    <input type="text" name="age" required>

    <label for="location">Location:</label>
    <input type="text" name="location" required>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="image">Image:</label>
    <input type="file" name="image" accept="image/*">

    <input type="submit" value="Update Pet">
</form>
    <a href="view_pet.php?petid=<?php echo $petid; ?>">Cancel</a>
    
<?php 
    include './includes/footer.inc';
; ?>

</body>
</html>

<?php

// Close the database connection
$conn->close();
}
?>
