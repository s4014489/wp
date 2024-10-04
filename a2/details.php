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
</head>

<?php
if (isset($_GET['petid'])) {
  $petid = filter_var($_GET['petid'], FILTER_VALIDATE_INT);
  if ($petid === false) {
    echo "Invalid pet ID";
    exit;
  }

echo "Pet ID: $petid<br>";

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


  <img src="<?php echo 'images/' . $row["image"]; ?>" class="img-fluid">
<BR> 
<BR> 
  <h1>Pet Details</h1>
      <li>
      <p>Age: <?php echo $row["age"]; ?></p>
      </li>
    <li>
      <p>Type: <?php echo $row["type"]; ?></p>
        </li>
    <li>
      <p>Location: <?php echo $row["location"]; ?></p>
    </li>
  </ul>


<h3>Pet Name: <?php echo $row["petname"]; ?></h3p>
<p>Description: <?php echo $row["description"]; ?></p>



<?php include('includes/footer.inc'); ?>
?> 
