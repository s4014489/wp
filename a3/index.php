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
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/cat1.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/cat1.jpeg" class="d-block w-100" alt="...">
    </div>
    /*<div class="carousel-item">
      <img src.="/images/cat1.jpeg" class="d-block w-100" alt="...">
    </div>*/
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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
          <form class="form-inline my-2 my-lg-0" action="pets.php" method="GET">
            <select class="form-control mr-sm-2" name="pet_type" aria-label="Select Pet Type">
              <option value="">Select Pet Type</option>
              <option value="dog">Dog</option>
              <option value="cat">Cat</option>
            </select>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filter</button>
          </form>
        </li>
    </div>
    <div class="col">        
      <li class="nav-item">
      <form method="POST" action="">
      <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
            <input type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search...">
          </form>
        </li>
</div>

  </div>
  <br> 
  <br> 

  <div class="row">
    <div class="col">    
        <p> PETS VICTORIA IS A DEDICATED PET ADOPTION ORGANIZATION BASED IN VICTORIA, AUSTRALIA, FOCUSED ON PROVIDING A SAFE AND LOVING ENVIRONMENT FOR PETS IN NEED. WITH A COMPASSIONATE APPROACH, PETS VICTORIA WORKS TIRELESSLY TO RESCUE, REHABILITATE, AND REHOME DOGS, CATS, AND OTHER ANIMALS. THEIR MISSION IS TO CONNECT THESE DESERVING PETS WITH CARING INDIVIDUALS AND FAMILIES, CREATING LIFELONG BONDS. THE ORGANIZATION OFFERS A RANGE OF SERVICES, INCLUDING ADOPTION COUNSELING, PET EDUCATION, AND COMMUNITY SUPPORT PROGRAMS, ALL AIMED AT PROMOTING RESPONSIBLE PET OWNERSHIP AND REDUCING THE NUMBER OF HOMELESS ANIMALS. </p> 
    </div>
</div>

 
    <?php include './includes/footer.inc'; ?>
</body>

</html>