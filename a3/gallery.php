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
<?php include './includes/header.inc'; ?>
<?php include './includes/db_connect.inc'; ?>

<br>
<br>
<div class="container"> 
            <h2 class="htext">Pets Victoria has a lot to offer! </h2>
            <p class="p"> For almost two decades, Pets Victoria has helped in creating true social change into the mainstream. Our work has helped make a difference to the Victorian Rescue Community and thousand of pets in need of rescue and rehabiliation. But until every pet is safe, respected and loved, we still have work to do. </p> 

</div> 

<div class="container"> 
<?php
$query = "SELECT * FROM pets";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  echo '<div class="row">'; // Start a new row for Bootstrap grid
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-md-4"> <!-- Adjust column size as needed -->
      <div class="card" style="width: 18rem;">
        <img src="<?php echo 'images/' . $row["image"]; ?>" class="card-img-top" alt="<?php echo $row["petname"]; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row["petname"]; ?></h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="details.php?petid=<?php echo $row['petid']; ?>" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>
    <?php

  }
  echo '</div>'; // Close the last row

} 
?> 

<?php include './includes/footer.inc'; ?>

<script src="js/main.js"></script>

</body>
</body>
</html>