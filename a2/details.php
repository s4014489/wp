<?php include('includes/db_connect.inc'); ?>
<?php include('includes/header.inc'); ?>



<?php
if (isset($_GET['petid'])) {
  $petid = filter_var($_GET['petid'], FILTER_VALIDATE_INT);
  if ($petid === false) {
    echo "Invalid pet ID";
    exit;
  }
  $query = "SELECT * FROM pets WHERE id = '$petid'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    echo "Pet not found";
    exit;
  }
} else {
  echo "Pet ID not provided";
  exit;
}
?>

  <img src="<?php echo 'images/' . $row["image"]; ?>" class="img-fluid">
<BR> 
<BR> 
  <h1>Pet Details</h1>
<p>Pet Name: <?php echo $row["petname"]; ?></p>
<p>Description: <?php echo $row["description"]; ?></p>
<p>Age: <?php echo $row["age"]; ?></p>
<p>Type: <?php echo $row["type"]; ?></p>
<p>Location: <?php echo $row["location"]; ?></p>

// Close MySQL connection
mysqli_close($conn);
?>
<?php include('includes/footer.inc'); ?>
?> 
