<?php
include './includes/header.inc';
include './includes/nav.inc';
include './includes/db_connect.inc';

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL statement to prevent SQL injection
$sql = "SELECT * FROM pets WHERE name LIKE ? OR type LIKE ? ORDER BY name ASC";
$stmt = $pdo->prepare($sql);
$searchTerm = "%" . $searchQuery . "%";
$stmt->execute([$searchTerm, $searchTerm]);

// Fetch results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h1>Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h1>
        
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
