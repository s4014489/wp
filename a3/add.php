<?php 
session_start(); // Start the session at the beginning of the script

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
</div>