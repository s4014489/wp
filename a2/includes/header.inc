<header>
  <div class="header">
    <div class="flex-container flex-start">
      <li class="flex-item" style="text-align: center;">
        <img src="images/logo.png" alt="Pets Victoria Logo" width="50" height="50">
      </li>
      <li class="flex-item" style="text-align: center;">
        <nav>
          <select id="dropdown" onchange="navigateToPage()" style="width: 100%; text-align: center;">
            <option value="" disabled selected>Select an Option</option>
            <option value="index.php">Home</option>
            <option value="pets.php">Pets</option>
            <option value="add.php">Add A Pet</option>
            <option value="gallery.php">Gallery</option>
          </select>
        </nav>
      </li>
      <li class="flex-item" style="text-align: right;">
        <div class="search-bar">
          <input type="search" id="search" placeholder="Search..." style="width: 100%; text-align: right;">
          <span class="material-symbols-outlined">
            search
          </span>
        </div>
      </li>
    </div>
  </div>
</header>