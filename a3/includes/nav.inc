<!-- Navbar -->
<?php

session_start(); // Start the session
$isLoggedIn = isset($_SESSION['username']); 
$searchQuery = isset($_GET['search']) ? $_GET['search'] : ''; // Get the search query from the URL
?>

<nav class="navbar  navbar-expand-lgt" style="background-color: #008080;">
  <a class="navbar-brand" href="index.php">
    <img class="logo" src="./images/logo.png" width="55px" alt="Logo" /> 
  </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
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
      <span class="navbar-text">
         <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
      <input class="form-control mr-sm-2" type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search...">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
      </span>
    </div>
     
    </div>

</nav>

