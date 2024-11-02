<!-- Navbar -->
<?php

session_start(); // Start the session
$isLoggedIn = isset($_SESSION['username']); 
$searchQuery = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search query from the URL
?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #008080;">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pets.php">Pets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">Add A Pet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">Gallery</a>
        </li>
        <?php if ($isLoggedIn): ?>
          <li class="nav-item">
            <a class="nav-link" href="logoff.php">Log Off</a>
          </li>
          <li class="nav-item"> 
            <a class="nav-link" href="user.php">User </a>
          </li> 
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php endif; ?>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
