<?php include './includes/header.inc'; ?>
<?php include './includes/nav.inc'; ?>
<?php include './includes/db_connect.inc'; ?>

<?php
// search.php

// Check if the search parameter is set
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Sanitize the search query to prevent XSS attacks
$searchQuery = htmlspecialchars($searchQuery);

// Initialize an empty results array
$results = [];

// Fetch pet data from the pets table
$query = "SELECT * FROM pets";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetch all pets from the result set
    $petData = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Filter the data based on the search query
    if ($searchQuery) {
        foreach ($petData as $pet) {
            if (stripos($pet['petname'], $searchQuery) !== false) {
                $results[] = $pet;
            }
        }
    }
} else {
    // Handle query error
    echo "Error fetching data: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <div class="container">
        <h1>Search Results for "<?php echo $searchQuery; ?>"</h1>
        
 <?php if (empty($results)): ?>
    <p>No results found.</p>
<?php else: ?>
    <div class="card-container">
        <?php foreach ($results as $pet): ?>
            <div class="card">
                <a href="pet_detail.php?petid=<?php echo urlencode($pet['petid']); ?>" class="card-link">
                    <div class="card-content">
                        <h3><?php echo htmlspecialchars($pet['name']); ?></h3>
                        <p><?php echo htmlspecialchars($pet['type']); ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <?php include './includes/footer.inc'; ?>
</body>
</html>
