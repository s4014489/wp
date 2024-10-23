<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
</head>

<body class="body">
    <?php include './includes/header.inc'; ?>
    <div>
        <h2 class="htext">Pets Victoria has a lot to offer! </h2>
        <p class="p">For almost two decades, Pets Victoria has helped in creating true social change into the mainstream. Our work has helped make a difference to the Victorian Rescue Community and thousand of pets in need of rescue and rehabilitation. But until every pet is safe, respected and loved, we still have work to do.</p>
        <div class="container">
            <!-- PHP code to display pet cards -->
            <?php
                // Query to select relevant fields from pets table
                $sql = "SELECT name, image, description FROM pets";
                $result = mysqli_query($conn, $sql);

                // Display results in container
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card">
                        <img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["name"]; ?>">
                        <div class="name"><?php echo $row["name"]; ?></div>
                        <div class="overlay">
                            <div>
                                <i class="fas fa-search search-icon"></i>
                                <p>DISCOVER MORE!</p>
                            </div>
                        </div>
                    </div>
                    <?php } 
                    ?> 

        </div>
    </div>
    <?php include  './includes/footer.inc'; ?>
</body>

</html> 
