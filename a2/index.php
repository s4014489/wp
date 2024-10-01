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
    <title>Home - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>

<?<php>
includes/header.inc
</php> 

<body>
    <div id="loader"></div>
    <div class="header">
        <div class="flex-container flex-start">
            <li class="flex-item">
                <img src="images/logo.png" alt="Pets Victoria Logo" width="50" height="50">
            </li>
            <li class="flex-item">
             <div class="navigation">
              <nav>
                <select id="dropdown" onchange="navigateToPage()"> 
                    <option value="no value is relevant">Select an Option</option>
                   
                    <option value="index.html">Home</option>
                    <option value="pets.html">Pets</option>
                    <option value="add.html">Add A Pet</option>
                    <option value="gallery.html">Gallery</option>
            </div> 
        </select>
        </nav>
    </li>
    </div>
    <li class="flex-item">
    <div class="search-bar" align="right">
        <input type="search" id="search" placeholder="Search...">
        <span class="material-symbols-outlined">
            search
        </span>
    </div>
    </li> 
    </div>
</div> 

    <body> 
        
        <div class="hero">
            <h1 class="heroheader1">Pets Victoria</h1>
            <h2 class="htext"> Welcome to Pet Adoption </h2>
       
        <div class="hero-image" ">
            <img src="images/main.jpeg" alt="Hero Image" width="30%"> 

        </div>
    </div>
    </body>


  <div class="footer">
    <div align="center">
            <p class="footer-text">Copyright S4014489 RMIT. All Rights Reserved | Designed for Pets Victoria</p>
    </div>
  </div>

  <script src="js/main.js"></script>
</body>
</html>