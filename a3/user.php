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


        <div>
            <h2 class="htext">Pets Victoria has a lot to offer! </h2>
            <p class="p"> For almost two decades, Pets Victoria has helped in creating true social change into the mainstream. Our work has helped make a difference to the Victorian Rescue Community and thousand of pets in need of rescue and rehabiliation. But until every pet is safe, respected and loved, we still have work to do. </p> 

</div> 

<div class="container"> 
<?php
session_start();
include './includes/db_connect.inc'; // Make sure to include your database connection

// Start the session only if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    // Prepare the SQL query to fetch pets for the logged-in user
    $query = "SELECT * FROM pets WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId); // 'i' for integer type

    // Execute the query
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        // Check if any pets are found
        if ($result->num_rows > 0) {
            echo '<div class="container">';
            echo '<h2>Your Pets</h2>';
            echo '<div class="row">'; // Start a new row for Bootstrap grid

            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4"> <!-- Adjust column size as needed -->
                    <div class="card" style="width: 18rem; margin: 10px;">
                        <img src="<?php echo 'images/' . htmlspecialchars($row["image"]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row["name"]); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row["name"]); ?></h5>
                            <a href="details.php?petid=<?php echo $row['petid']; ?>" class="btn btn-primary">View Details</a>
                            <a href="edit_pet.php?petid=<?php echo $row['petid']; ?>" class="btn btn-secondary">Edit</a>
                            <a href="delete_pet.php?petid=<?php echo $row['petid']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this pet?');">Delete</a>
                        </div>
                    </div>
                </div>
                <?php
            }

            echo '</div>'; // Close the row
            echo '</div>'; // Close the container
        } else {
            echo '<p>You have no pets.</p>'; // Message when no pets are available
        }
    } else {
        echo "Error fetching pets: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "You must be logged in to view your pets.";
}
?>
</div> 

<?php include './includes/footer.inc'; ?>

<script src="js/main.js"></script>

</body>
</body>
</html>