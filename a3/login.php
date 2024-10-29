<?php
// Start the session only if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include your database connection file
include './includes/db_connect.inc';

// Initialize variables
$username = '';
$password = '';
$errorMessage = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, password FROM users WHERE username = ?");

    // Check if the prepare() method failed
    if ($stmt === false) {
        die("Database prepare error: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user was found
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Set user_id in the session
            $_SESSION['user_id'] = $userId;

            // Redirect to user page or dashboard after successful login
            header("Location: user.php");
            exit(); // Always exit after a redirect
        } else {
            $errorMessage = "Invalid credentials. Please try again.";
        }
    } else {
        $errorMessage = "Invalid credentials. Please try again.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to your CSS file -->
</head>
<body>
<?php include './includes/header.inc'; ?>

    <h1>Login</h1>
    
    <?php if (!empty($errorMessage)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($errorMessage); ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
        <br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        
        <input type="submit" value="Login">

        <p class="text-center mt-3">Don't have an account? <a href="register.php">Register here</a></p>

    </form>
    <?php include './includes/footer.inc'; ?>

</body>
</html>