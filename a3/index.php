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


<?php include './includes/header.inc'; ?>
<?php include './includes/nav.inc'; ?>
<?php include './includes/db_connect.inc'; ?>


<body padding ="30">



    <br>
    <br>
    <section class="hero" padding-top ="30">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Welcome to Pets Victoria</h1>
                    <p class="lead">inset text.</p>
                    <button class="btn btn-primary">Learn More</button>
                </div>
                <div class="col-md-6">
                 <div id="recentImagesCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Directory where images are stored
                $imageDir = './images/';
                $images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                // Sort images by modification time (most recent first)
                usort($images, function($a, $b) {
                    return filemtime($b) - filemtime($a);
                });

                // Limit to the 5 most recent images
                $recentImages = array_slice($images, 0, 3);

                // Display the images in the carousel
                foreach ($recentImages as $index => $image) {
                    $activeClass = ($index === 0) ? 'active' : '';
                    echo '<div class="carousel-item ' . $activeClass . '">';
                    echo '<img src="' . htmlspecialchars($image) . '" class="d-block w-100" alt="Recent Image">';
                    echo '</div>';
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#recentImagesCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#recentImagesCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
              </div> 
            </div>
            </div>
        </div>
    </section>

  <br> 
  <br>

  <div class="container">
    <div class="row">
        <div class="col">
            <li class="nav-item">
            <form method="GET" action="search.php">
            <select name="pet-type" id="pet-type">
                <option value="">--All Types--</option>
                <option value="cat">Cat</option>
                <option value="dog">Dog</option>
                <!-- Add more options as needed -->
            </select>
            <input type="submit" value="Search">
        </form>
            </li>
        </div>
        <div class="col">        
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search...">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
        </div>
    </div>
</div>

  </div>
  <br> 
  <br> 
<div>
  <div class="row">
    <div class="col">    
        <p> PETS VICTORIA IS A DEDICATED PET ADOPTION ORGANIZATION BASED IN VICTORIA, AUSTRALIA, FOCUSED ON PROVIDING A SAFE AND LOVING ENVIRONMENT FOR PETS IN NEED. WITH A COMPASSIONATE APPROACH, PETS VICTORIA WORKS TIRELESSLY TO RESCUE, REHABILITATE, AND REHOME DOGS, CATS, AND OTHER ANIMALS. THEIR MISSION IS TO CONNECT THESE DESERVING PETS WITH CARING INDIVIDUALS AND FAMILIES, CREATING LIFELONG BONDS. THE ORGANIZATION OFFERS A RANGE OF SERVICES, INCLUDING ADOPTION COUNSELING, PET EDUCATION, AND COMMUNITY SUPPORT PROGRAMS, ALL AIMED AT PROMOTING RESPONSIBLE PET OWNERSHIP AND REDUCING THE NUMBER OF HOMELESS ANIMALS. </p> 
    </div>
</div>

 
    <?php include './includes/footer.inc'; ?>
</body>

</html>