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
        <h2 class="htext" align="center"> Discover Pets Victoria </h2>
        <br> 
        <p class="p">Pets Victoria is a dedicated pet adoption organsation based out in Victoria, Australia, focused on providing a safe and loving environment for pets in need. With a compassionate approach, Pet Victoria works tirelessly to rescue, rehabliliate and rehome dogs, cats and other animals. Their mission is to connect these deserving pets with caring individuals and families, creating lifelong bonds. The organsation offers a range of services, including adoption counseling, pet education and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.   </p>
        <p> </p>
        <p> </p>
        <p></p>
    </div> 
    <section class="twin grid">
        <div class="twin" align='left'> 
        <img src="images/pets.jpeg">
        </div>
        <div class="twin">
        <table class="table"> 
            <tr>
                <th> Pet </th>
                <th> Type </th>
                <th> Age </th>
                <th> Location</th>
            </tr>
            <tr>
                <td> Milo </td>
                <td> Cat </td>
                <td> 3 Months</td>
                <td> Melbourne CBD</td> 
            </tr>
            <tr>
                <td> Baxter </td>
                <td> Dog </td>
                <td> 5 Months</td>
                <td> Cape Woolamai</td> 
            </tr>
            <tr>
                <td> Luna </td>
                <td> Cat </td>
                <td> 1 Month</td>
                <td> Ferntree Gully</td> 
            </tr>
            <tr>
                <td> Willow </td>
                <td> Dog </td>
                <td> 48 Months</td>
                <td> Marysville</td> 
            </tr>
            <tr>
                <td> Oliver </td>
                <td> Cat </td>
                <td> 12 Months</td>
                <td> Grampians</td> 
            </tr>
            <tr>
                <td> Bella </td>
                <td> Cat </td>
                <td> 10 Months</td>
                <td> Carlton</td> 
            </tr>
        </table>
        </div>
    </section>


</body>

<br> 

<div class="footer">
<div align="center">
        <p class="footer-text">Copyright S4014489 RMIT. All Rights Reserved | Designed for Pets Victoria</p>
</div>
</div>

<script src="js/main.js"></script>

</body>
</body>
</html>