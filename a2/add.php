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
    <title>Add Pets - Pets Victoria</title>
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

    <body> 
        <div class="hero">
            <h2 class="htext"> Add a Pet</h2>
            <br> 
            <p class="p"> You can add a new pet here </p> 

            <div class="p"> 
            <form action="add_process.php" method="post" enctype="multipart/form-data">                <label for="pet-name">Pet Name:</label> <label class="required-field"></label>
                <br> 
                <input class="input" type="text" id="pet-name" name="pet-name" required>
                <br>
                <label for="pet-type">Pet Type: </label> <label class="required-field"></label>
                <br> 
                <input class="input" type="text" id="pet-type" name="pet-type" required>
                <br>
                <label class="input" for="Description">Description:</label> <label class="required-field"></label>
                <br> 
                <textarea class="input" id="Description" name="Description" required></textarea>
                <br>
                <label class="required-field">Select An Image: </label>
                    <input type="file" id="image" name="image" required>
                    <p> MAX IMAGE SIZE: 500PX</p>
                    <br>
                <label  for="Image Caption">Image Caption: </label>
                <br> 
                <textarea class="input" id="IMGCaption" name="Image Caption" required="yes"></textarea>
                <br> 
                <label for="Age">Age</label><label class="required-field"></label>
                <br>
                <input class="input"type="number" id="Age" name="Age" required>
                <br>
                <label for="Location">Location</label><label class="required-field"></label>
                <br>
                <input class="input"type="text" id="Location" name="Location" required>
                </p>

                  <input type="submit" value="Submit">
                  <button> Clear Form </button> 

</form> 

                
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