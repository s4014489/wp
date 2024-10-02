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
    <title>Pets - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>




<body>
<?php include './includes/header.inc'; ?>
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
            <thread> 
            <tr>
                <th> Pet </th>
                <th> Type </th>
                <th> Age </th>
                <th> Location</th>
            </tr>
        </thread> 
        <tbody>
    <?php
      // Connect to the database
      $conn = mysqli_connect("localhost", "username", "password", "database");

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // Query the pets table
      $sql = "SELECT * FROM pets";
      $result = mysqli_query($conn, $sql);

      // Loop through the results and display them in the table
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["pet_id"] . "</td>";
        echo "<td>" . $row["pet_name"] . "</td>";
        echo "<td>" . $row["pet_type"] . "</td>";
        echo "<td>" . $row["owner"] . "</td>";
        echo "</tr>";
      }

      // Close the connection
      mysqli_close($conn);
      ?>
  </tbody>
  </table>
</div>
</section>

<script src="js/main.js"></script>
</body>
<?php include './includes/footer.inc'; ?>
</html>