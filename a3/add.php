<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pets - Pets Victoria</title>
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
<?php 
include './includes/header.inc'; 
?>

<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <h2 class="htext">Add a Pet</h2>
            <p class="p">You can add a new pet here</p>    
        </div>
    </div> 

    <?php
    session_start(); // Start the session
    // Check if the user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo "You must be logged in to add a pet.";
        exit; // Stop further execution
    }

    // Process the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize form data
        $petName = htmlspecialchars($_POST['petname'] ?? '');
        $description = htmlspecialchars($_POST['description'] ?? '');
        $age = htmlspecialchars($_POST['age'] ?? '');
        $type = htmlspecialchars($_POST['type'] ?? '');
        $location = htmlspecialchars($_POST['location'] ?? '');

        // Handle file upload and database insertion logic here...

        echo "Pet added successfully!";
    } else {
        // Show the form for adding a pet
        ?>
        <form method="post" action="">
            <label for="petname">Pet Name:</label>
            <input type="text" name="petname" required>
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
            <label for="age">Age:</label>
            <input type="text" name="age" required>
            <label for="type">Type:</label>
            <input type="text" name="type" required>
            <label for="location">Location:</label>
            <input type="text" name="location" required>
            <input type="submit" value="Add Pet">
        </form>
        <?php
    }
    ?>

    <?php include './includes/footer.inc'; ?>
</body>
</html>