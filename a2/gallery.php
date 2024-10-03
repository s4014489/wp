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


        <div>
            <h2 class="htext">Pets Victoria has a lot to offer! </h2>
            <p class="p"> For almost two decades, Pets Victoria has helped in creating true social change into the mainstream. Our work has helped make a difference to the Victorian Rescue Community and thousand of pets in need of rescue and rehabiliation. But until every pet is safe, respected and loved, we still have work to do. </p> 

</div> 
        <div class "container"> 
        <?php
$query = "SELECT * FROM pets";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  ?>
      <div class="row">
      <?php
      $count = 0;
      while ($row = mysqli_fetch_assoc($result)) {
          $count++;
      ?>
           <div class="container">
           <div class="card">
           <div class="image-container">
                  <img src="<?php echo 'images/' . $row["image"]; ?>" class="card-img-top">
                  <div class="overlay">
          <span class="material-symbols-outlined">
            search
          </span>
        <span class="discover-text">DISCOVER MORE!</span>
        <?php
        $petid = $_GET['petid'];
        $query2 = "SELECT * FROM pets WHERE id = '$row[id]'";
       ?> 
        <a href="details.php?petid=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>


      </div>
    </div>
    <h2 class="card-title" align="centre" ><?php echo $row["petname"]; ?></h2>
    </div>
      </div>
</div>
                  
                
              </div>
          </div>
          <?php
          if ($count % 3 == 0) {
              echo '</div><div class="row">';
          }
      }
      ?>
      </div>
  <?php
  } else {
      ?>
      <p>No data available</p>
  <?php
  }
  ?>
<br>
<br> 
</body>
<br>
<br> 
<?php include './includes/footer.inc'; ?>


</html>
