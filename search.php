
<?php include './includes/header.inc'; ?>
<?php include './includes/nav.inc'; ?>
<?php include './includes/db_connect.inc'; ?>



<?php
// search.php

// Check if the search parameter is set
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Sanitize the search query to prevent XSS attacks
$searchQuery = htmlspecialchars($searchQuery);

// Dummy data for demonstration purposes
$petData = [
    ['name' => 'Buddy', 'type' => 'dog'],
    ['name' => 'Mittens', 'type' => 'cat'],
    ['name' => 'Rex', 'type' => 'dog'],
    ['name' => 'Whiskers', 'type' => 'cat'],
];

// Filter the data based on the search query
$results = [];
if ($searchQuery) {
    foreach ($petData as $pet) {
        if (stripos($pet['name'], $searchQuery) !== false) {
            $results[] = $pet;
        }
    }
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
            <ul>
                <?php foreach ($results as $pet): ?>
                    <li><?php echo htmlspecialchars($pet['name']) . ' (' . htmlspecialchars($pet['type']) . ')'; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php include './includes/footer.inc'; ?>

</body>
</html>
