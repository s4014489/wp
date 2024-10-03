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


    <body class="body">
        <div>
            <h2 class="htext">Pets Victoria has a lot to offer! </h2>
            <p class="p"> For almost two decades, Pets Victoria has helped in creating true social change into the mainstream. Our work has helped make a difference to the Victorian Rescue Community and thousand of pets in need of rescue and rehabiliation. But until every pet is safe, respected and loved, we still have work to do. </p> 

 
            <div class="container">
                <? php> 
                
            // Query to select relevant fields from pets table
    $sql = "SELECT name, image, description FROM pets";
    $result = mysqli_query($conn, $sql);

    // Display results in container
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<div class="card">';
      echo '<img src="' . $row["image"] . '" alt="' . $row["name"] . '">';
      echo '<div class="name">' . $row["name"] . '</div>';
      echo '<div class="overlay">';
      echo '<div>';
      echo '<i class="fas fa-search search-icon"></i>';
      echo '<p>DISCOVER MORE!</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }

    // Close connection
    mysqli_close($conn);
  ?>







</body>
<?php include './includes/footer.inc'; ?>


</html>