<!-- Navbar -->
<?php
session_start(); // Start the session

$isLoggedIn = isset($_SESSION['username']); 
?>


<nav class="py-3 navbar navbar-expand-lg fixed-top auto-hiding-navbar">
  <div class="container">
    <a class="navbar-brand"" href="#">
      <img class="logo" src="./images/logo.png" width="55px" /> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

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
              <a class="nav-link" href="user.php">User</a>
          </li> 
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
