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
    <title>Gallery - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>



<body>
<?php include './includes/header.inc'; ?>
<?php include './includes/db_connect.inc'; ?>


        <div class="container">
            <h2 class="htext">Pets Victoria has a lot to offer! </h2>
            <p class="p"> For almost two decades, Pets Victoria has helped in creating true social change into the mainstream. Our work has helped make a difference to the Victorian Rescue Community and thousand of pets in need of rescue and rehabiliation. But until every pet is safe, respected and loved, we still have work to do. </p> 

</div> 

<br>
<br>
<div class="container"> 
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $name = '';
    $email = '';
    $password = '';
    $profileImage = '';

    // Check if each field is set and assign it to the variable
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    // Check if an image file was uploaded
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        // Handle file upload (you may want to validate the file type and size here)
        $profileImage = $_FILES['profile_image']['name']; // Store the image name or path as needed
        // Move the uploaded file to your desired directory
        move_uploaded_file($_FILES['profile_image']['tmp_name'], "uploads/" . $profileImage);
    } else {
        // Handle the case where no image was uploaded or an error occurred
        $profileImage = ''; // or set a default image or handle the error
    }

    // Example: Save user data to the database (this is just a placeholder)
    // saveUser ($name, $email, $password, $profileImage);

    // Redirect or display a success message
    echo "User  added successfully!";
} else {
    // If the form was not submitted, redirect or show an error
    echo "No data submitted.";
}
?>

</div> 

<?php include './includes/footer.inc'; ?>

<script src="js/main.js"></script>

</body>
</body>
</html>

