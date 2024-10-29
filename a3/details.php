<?php include('includes/db_connect.inc'); ?>
<?php include('includes/header.inc'); ?>

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
    <title>Details - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=location_on" /></head>

<?php
if (isset($_GET['petid'])) {
  $petid = filter_var($_GET['petid'], FILTER_VALIDATE_INT);
  if ($petid === false) {
    echo "Invalid pet ID";
    exit;
  }


  $query = "SELECT * FROM pets WHERE petid = '$petid'";
  $result = mysqli_query($conn, $query);


  if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
  } else {
    echo "Pet not found";
    exit;
  }
}
?>

<div class="container">
  <div class="row align-items-start">
    <div class="col">
    <img src="<?php echo 'images/' . $row["image"]; ?>" class="img-fluid">
    <div class="row align-items-start">
    <div class="col">
    <i class="material-icons" style="font-size:60px;color:grey;">pace</i>

    <p class="htext-table"> Age in Months: <?php echo $row["age"]; ?></p>
    </div>
    <div class="col">
    <i class="material-icons" style="font-size:60px;color:grey;">pets</i>

    <p class="htext-table">Type: <?php echo $row["type"]; ?></p>

  </div>
    <div class="col">
    <i class="material-icons" style="font-size:60px;color:grey;">location_on</i>

    <p class="htext-table"> Location: <?php echo $row["location"]; ?></p>
    </div>

  </div>

    </div>
    <div class="col">
    <h3 class="headings" style="text-align: centre"> Pet Name: <?php echo $row["petname"]; ?></h3>
    <p class="text" style="text-align: centre"> Description: <?php echo $row["description"]; ?></p>

    <hr />
    <?php
    echo "Pet ID: $petid<br>";
    ?> 
    </div>
  </div>


<BR> 
<BR> 
  <div class=flex-item"> 
  <div> 
</div> 
<div> 
</div> 
<div> 
</div> 
</div> 

<div  class="flex-item">
</div> 


<?php include('includes/footer.inc'); ?>
