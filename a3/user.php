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
// Check if user_id is set in the GET request
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch pets for the specific user_id
    $sql = "SELECT * FROM pets WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($pet = $result->fetch_assoc()) {
            // Display each pet in a card format
            echo '<div class="card">';
            echo '<h3>' . htmlspecialchars($pet['name']) . '</h3>';
            echo '<p>Type: ' . htmlspecialchars($pet['type']) . '</p>';
            echo '<p>Age: ' . htmlspecialchars($pet['age']) . ' years</p>';
            echo '<img src="' . htmlspecialchars($pet['image_url']) . '" alt="' . htmlspecialchars($pet['name']) . '">';
            
            // Edit and Delete buttons
            echo '<div class="button-container">';
            echo '<a href="edit_pet.php?pet_id=' . htmlspecialchars($pet['id']) . '" class="edit-button">Edit</a>';
            echo '<a href="delete_pet.php?pet_id=' . htmlspecialchars($pet['id']) . '" class="delete-button" onclick="return confirm(\'Are you sure you want to delete this pet?\');">Delete</a>';
            echo '</div>'; // Close button-container
            echo '</div>'; // Close card
        }
    } else {
        echo '<p>No pets found for this user.</p>';
    }

    $stmt->close();
} else {
    echo '<p>Error: user_id is not specified.</p>';
}

$conn->close();
?>


</div> 

<?php include './includes/footer.inc'; ?>

<script src="js/main.js"></script>

</body>
</body>
</html>

