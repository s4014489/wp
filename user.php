<!DOCTYPE html>
<html lang="en">
<import> 
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Permanent+Marker&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">

</import>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>



<body>
<?php include './includes/header.inc'; ?>
<?php include './includes/db_connect.inc'; ?>
<?php include('includes/nav.inc'); ?>



        <div class="container">
            <h2 class="htext">User</h2>

</div> 

<br>
<br>
<div class="container"> 
<?php

// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

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
                // Display each pet in a card format
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($pet['name']) . '</h3>';
                echo '<p>Type: ' . htmlspecialchars($pet['type']) . '</p>';
                echo '<p>Age: ' . htmlspecialchars($pet['age']) . ' years</p>';
                
                // Check if the image URL is valid
                if (!empty($pet['image_url'])) {
                    echo '<img src="' . htmlspecialchars($pet['image_url']) . '" alt="' . htmlspecialchars($pet['name']) . '">';
                } else {
                    echo '<p>No image available.</p>';
                }
                
                // Display user_id and username
                echo '<p>User ID: ' . htmlspecialchars($pet['user_id']) . '</p>'; // Display user_id
                echo '<p>Username: ' . htmlspecialchars($pet['username']) . '</p>'; // Display username

                // Edit and Delete buttons
                echo '<div class="button-container">';
                echo '<a href="edit_pet.php?pet_id=' . htmlspecialchars($pet['id']) . '" class="edit-button">Edit</a>';
                echo '<a href="delete_pet.php?pet_id=' . htmlspecialchars($pet['id']) . '" class="delete-button" onclick="return confirm(\'Are you sure you want to delete this pet?\');">Delete</a>';
                echo '</div>'; // Close button-container
                echo '</div>'; // Close card
            }
        } else {
            echo '<p>No pets found for this user. <a href="add_pet.php">Add a new pet</a></p>'; // Link to add a new pet
        }

        $stmt->close();
    } else {
        echo '<p>Error: Could not prepare statement.</p>';
    }
} else {
    echo '<p>Error: User is not logged in.</p>'; // Handle case where user is not logged in
}
?>

</div> 

<?php include './includes/footer.inc'; ?>

<script src="js/main.js"></script>

</body>
</body>
</html>

 