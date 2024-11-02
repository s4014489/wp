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


<?php include './includes/header.inc'; ?>
<?php include './includes/nav.inc'; ?>
<?php include './includes/db_connect.inc'; ?>

<body>

<br>
<br> 
<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <h2 class="htext">Add a Pet</h2>
            <p class="p">You can add a new pet here</p>    
        </div>
    </div> 

    <?php

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
<div class="form" style="form"> 
    <form method="POST" action="add_process.php" enctype="multipart/form-data">
    <p> Enter the pet's name:</p>
    <input type="text" name="petname" placeholder="Pet Name" required>
    <p> Enter the pet's description </p> 
    <textarea name="description" placeholder="Description" required></textarea>
    <p>  Enter the pet's age:</p>
    <input type="text" name="imagecaption" placeholder="Image Caption" required>
    <p>  Enter the pet's age:</p>
    <input type="text" name="age" placeholder="Age" required>
    <p>  Enter the pet's type:</p>
    <input type="text" name="type" placeholder="Type" required>
    <p>  Enter the pet's location:</p>
    <input type="text" name="location" placeholder="Location" required>
    <p>  Enter the pet's image:</p>
    <input type="file" name="image" required>
        <input type="submit" value="Add Pet"> 
        <button type="reset">Clear Form</button>
        <?php
    }
    ?>

    <?php include './includes/footer.inc'; ?>
</body>
</html>