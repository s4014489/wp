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
    <title>Gallery - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>



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

    <body class="body">
        <div>
            <h2 class="htext">Pets Victoria has a lot to offer! </h2>
            <p class="p"> For almost two decades, Pets Victoria has helped in creating true social change into the mainstream. Our work has helped make a difference to the Victorian Rescue Community and thousand of pets in need of rescue and rehabiliation. But until every pet is safe, respected and loved, we still have work to do. </p> 

 
          </div>
          <div class="grid-container2">
            <div> 
              <div class="image-container">
              <img src="images/cat4.jpeg"
              <div class="overlay-new"> 
                <i class="material-icons">search</i>
                <p class="p>" Discover More </p> 
              
              <div class="Namebox">
                <h2 class="htext">Milo</h2>
              </div>
              </div>
            </div>
            <div class="image-container">
              <img src="images/dog1.jpeg"
              <div class="overlay-new"> 
                <i class="material-icons">search</i>
                <p class="p>" Discover More </p> 
              
              <div class="Namebox">
                <h2 class="htext">Baxter</h2>
              </div>
              </div>
            <div class="image-container">
              <img src="images/cat2.jpeg"
              <div class="overlay-new"> 
                <i class="material-icons">search</i>
                <p class="p>" Discover More </p> 
              
              <div class="Namebox">
                <h2 class="htext imagecontainertext">Luna</h2>
              </div>
            </div>
          </div>
          <br> 
          <br> 
          <div class="grid-container2">
            <div> 
              <div class="image-container">
              <img src="images/cat4.jpeg"
              <div class="overlay-new"> 
                <i class="material-icons">search</i>
                <p class="p"> Discover More </p> 
              
              <div class="Namebox">
                <h2 class="htext">Meet Our Pets</h2>
              </div>
              </div>
            </div>
            <div class="image-container">
              <img src="images/cat4.jpeg"
              <div class="overlay-new"> 
                <i class="material-icons">search</i>
                <p class="p"> Discover More </p> 
              
              <div class="Namebox">
                <h2 class="htext">Meet Our Pets</h2>
              </div>
            </div>
            <div class="image-container">
              <img src="images/cat4.jpeg"
              <div class="overlay-new"> 
                <i class="material-icons">search</i>
                <p class="p>" Discover More </p> 
              
              <div class="Namebox">
                <h2 class="htext">Meet Our Pets</h2>
              </div>
            </div>
          </div>
          <br>   
          <br> 
    
         
        </div>
      </div> 


          


  <div class="footer">
    <div align="center">
            <p class="footer-text">Copyright S4014489 RMIT. All Rights Reserved | Designed for Pets Victoria</p>
    </div> 
  </div>

  <script src="js/main.js"></script>

</body>


</html>