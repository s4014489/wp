
<?php include './includes/header.inc'; ?>
<?php include './includes/nav.inc'; ?>
<?php include './includes/db_connect.inc'; ?>



<?php


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchQuery = '';
$results = [];
$pet_type = isset($_GET['pet_type']) ? $_GET['pet_type'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM items WHERE name LIKE ? OR description LIKE ?");
    $searchTerm = "%" . $searchQuery . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
    

    // Fetch results
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Functionality</title>
</head>
<body>
    <h1>Search</h1>
    <form method="POST" action="">
        <input type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search...">
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($results)): ?>
        <h2>Search Results:</h2>
        <ul>
            <?php foreach ($results as $item): ?>
                <li>
                    <strong><?php echo htmlspecialchars($item['name']); ?></strong><br>
                    <?php echo htmlspecialchars($item['description']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <p>No results found for "<?php echo htmlspecialchars($searchQuery); ?>".</p>
    <?php endif; ?>
</body>
</html>