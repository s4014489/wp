<?php include('db_connect.inc'); ?>
<?php include('header.inc'); ?>
<main>
  <table>
    <tr>
      <th>Pet Name</th>
      <th>Age</th>
      <th>Type</th>
      <th>Location</th>
    </tr>
    <?php
      $query = "SELECT petid, petname, age, type, location FROM pets";
      $result = $conn->query($query);
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><a href='details.php?id={$row['petid']}'>{$row['petname']}</a></td>";
        echo "<td><i class='material-icons'>{$row['age']}</i></td>";
        echo "<td><i class='material-icons'>{$row['type']}</i></td>";
        echo "<td><i class='material-icons'>{$row['location']}</i></td>";
        echo "</tr>";
      }
      $result->free();
      $conn->close();
    ?>
  </table>
</main>
<?php include('footer.inc'); ?>