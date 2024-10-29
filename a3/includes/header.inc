<header>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <div class="header">
      <div> 
        <?php include './includes/nav.inc'; ?>
      </div> 
      <div> 
        <div class="col-md-6">
    <h2 class="text-center">Search</h2>
    <form method="GET" action="search.php">
        <div class="form-group">
            <input type="text" class="form-control" name="query" placeholder="Search..." required>
        <button type="submit" class="btn btn-secondary btn-block">Search</button>
                </div>

    </form>
    </div> 
  </div>

</div>
    <script src="js/main.js"></script>
</header>