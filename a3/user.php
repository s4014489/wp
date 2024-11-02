<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

// Include necessary files
include './includes/db_connect.inc'; 
include './includes/header.inc'; 
include './includes/nav.inc'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="htext">User  </h2>
    </div> 

    <br>
    <br>
    <div class="container"> 
    <?php

    // Check if user_id is stored in session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Fetch user data and pets for the specific user_id
        $sql = "SELECT users.user_id, users.username, pets.* FROM pets 
                JOIN users ON pets.user_id = users.user_id 
                WHERE users.user_id = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($pet = $result->fetch_assoc()) {
                    // Validate petid before using it
                    $petid = isset($pet['petid']) && is_numeric($pet['petid']) ? htmlspecialchars($pet['petid']) : '0';

                    // Display each pet in a card format
                    echo '<div class="card">';
                    echo '<h3>' . (isset($pet['petname']) ? htmlspecialchars($pet['petname']) : 'Unknown Pet') . '</h3>';
                    echo '<p>Type: ' . (isset($pet['type']) ? htmlspecialchars($pet['type']) : 'Unknown Type') . '</p>';
                    echo '<p>Age: ' . (isset($pet['age']) ? htmlspecialchars($pet['age']) . ' years' : 'Unknown Age') . '</p>';

                    // Check if the image URL is valid
                    if (!empty($pet['image_url'])) {
                        echo '<img src="' . htmlspecialchars($pet['image_url']) . '" alt="' . htmlspecialchars($pet['petname']) . '">';
                    } else {
                        echo '<p>No image available.</p>';
                    }

                    // Display user_id and username
                    echo '<p>User ID: ' . (isset($pet['user_id']) ? htmlspecialchars($pet['user_id']) : 'Unknown User ID') . '</p>';
                    echo '<p>Username: ' . (isset($pet['username']) ? htmlspecialchars($pet['username']) : 'Unknown Username') . '</p>';

                    // Edit and Delete buttons
                    echo '<div class="button-container">';
                    echo '<a href="edit_pet.php?petid=' . $petid . '" class="edit-button">Edit</a>';
                    echo '<a href="delete_pet.php?petid=' . $petid . '" class="delete-button" onclick="return confirm(\'Are you sure you want to delete this pet?\');">Delete</a>';
                    echo '</div>'; // Close button-container
                    echo '</div>'; // Close card
                }
            } else {
                echo '<p>No pets found for this user.</p>';
            }
        } else {
            echo '<p>Failed to prepare SQL statement.</p>';
        }
    } else {
        echo '<p>You are not logged in.</p>';
    }
    ?>
    <br>
    <br>
    <br>

    </div>
    <?php include './includes/footer.inc';  ?>

</body>
</html>

