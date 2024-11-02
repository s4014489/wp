<?php
include './includes/db_connect.inc'; // Database connection
include './includes/header.inc';
include('includes/nav.inc');


// Function to fetch pet details
function getPetDetails($conn, $petid) {
    $sql = "SELECT * FROM pets WHERE petid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $petid);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Check if the pet ID is set in the URL
if (isset($_GET['petid'])) {
    $petid = (int)$_GET['petid']; // Cast to integer for safety
    $pet = getPetDetails($conn, $petid);

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
    // Get the pet ID and other details from the form
    $pet_id = (int)$_POST['pet_id'];
    $petname = $_POST['petname'];
    $type = $_POST['type'];
    $age = (int)$_POST['age'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    // Prepare the SQL statement to update pet details without changing the image
    $updateSql = "UPDATE pets SET petname = ?, type = ?, age = ?, location = ?, description = ? WHERE petid = ?";
    $updateStmt = $conn->prepare($updateSql);

    if (!$updateStmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters and execute the update
    $updateStmt->bind_param("ssissi", $petname, $type, $age, $location, $description, $pet_id);
    
    if ($updateStmt->execute()) {
        echo "Pet details updated successfully!";
    } else {
        echo "Error updating pet details: " . $updateStmt->error;
    }

    // Check if an image file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Handle image upload
        $imagePath = handleImageUpload($_FILES['image']);
        
        // If an image was uploaded, update the image path in the database
        if ($imagePath) {
            $updateImageSql = "UPDATE pets SET image = ? WHERE petid = ?";
            $updateImageStmt = $conn->prepare($updateImageSql);
            $updateImageStmt->bind_param("si", $imagePath, $pet_id);
            $updateImageStmt->execute();
        }
    }
}

// Function to handle image upload
function handleImageUpload($file) {
    if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'images/'; // Directory to save uploaded images
        $imagePath = $uploadDir . basename($file['name']);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $imagePath)) {
            return $imagePath;
        } else {
            return ''; // Return empty string if upload fails
        }
    }
    return '';
}
?>
<!-- HTML form for editing pet details -->
<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($pet['petid']); ?>">
    <label for="petname">Pet Name:</label>
    <input type="text" name="petname" value="<?php echo htmlspecialchars($pet['petname']); ?>" required>
    
    <label for="type">Type:</label>
    <input type="text" name="type" value="<?php echo htmlspecialchars($pet['type']); ?>" required>
    
    <label for="age">Age:</label>
    <input type="number" name="age" value="<?php echo htmlspecialchars($pet['age']); ?>" required>
    
    <label for="location">Location:</label>
    <input type="text" name="location" value="<?php echo htmlspecialchars($pet['location']); ?>" required>
    
    <label for="description">Description:</label>
    <textarea name="description" required><?php echo htmlspecialchars($pet['description']); ?></textarea>
    
    <label for="image">Image:</label>
    <input type="file" name="image">
    
    <input type="submit" value="Update Pet">
</form>
