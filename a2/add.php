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
    <title>Add Pets - Pets Victoria</title>
    <meta name="author" content="Max Thum">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>



<body>
<?php include './includes/header.inc'; ?>


<div class="hero">
        <h2 class="htext">Add a Pet</h2>
        <p class="p">You can add a new pet here</p>

    <div class="forms"> 
        <form action="add_process.php" method="post" enctype="multipart/form-data">
        <label for="petname">Pet Name:</label> <label class="required-field"></label>
        <input type="text" id="petname" name="petname"><br><br>
  
        <label for="description">Description:</label> <label class="required-field"></label>
        <textarea id="description" name="description"></textarea><br><br>
  
        <label for="imagecaption">Image Caption:</label> <label class="required-field"></label>
        <input type="text" id="ImageCaption" name="ImageCaption"><br><br>
  
        <label for="age">Age:</label> <label class="required-field"></label>
         <input type="number" id="Age" name="Age"><br><br>
  
         <label for="type">Type:</label> <label class="required-field"></label>
        <input type="text" id="type" name="type"><br><br>
  
        <label for=";ocation">Location:</label> <label class="required-field"></label>
         <input type="text" id="Location" name="Location"><br><br>
  
         <label for="image">Image:</label> <label class="required-field"></label>
         <input type="file" id="image" name="image"><br><br>
         <p> Allowed file types: .jpg, .png, .gif,  .jpeg, images must be under 5mb</p>


  
        <input type="submit" value="Add Pet"> 
        <button type="reset">Clear Form</button>


</form>
    </div>
</div>
<br>
<br>



    <?php include './includes/footer.inc'; ?>



</body>

</html>
