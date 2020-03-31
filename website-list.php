<style>
  td {
    color: white;
  }

  th {
    color: white;
  }
</style>

<?php
  $title = "Website List";
  require_once("navbar.php");
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  }

  echo '<h1>Active Websites</h1>';

  try{
    $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');

    $query = 'select * from websites';
    $cmd = $db->prepare($query);
    $cmd->execute();

    $users = $cmd -> fetchAll();

//table-striped
    echo '<table class="table table-hover"><thread> <th>Website Id</th><th>Website Name</th> <th>Website Content</th></thread>';

    // 5. Use a foreach loop to iterate (cycle) through all the values in the $artists variable.  Inside this loop, use an echo command to display the name of each person.  See https://www.php.net/manual/en/control-structures.foreach.php for details.
    foreach ($users as $value) {

      echo '<tr>';
      echo '<td>' . $value['websiteId'] . '</td>';
      echo '<td><a href="index.php?websiteId=' . $value['websiteId'] . '">' . $value['website_Title'] . '</td>';
      echo '<td>' . $value['website_Content'] . '</td>';
      echo '<td><a href="delete-website.php?websiteId=' . $value['websiteId'] . '" class="btn btn-danger" onclick="return confirmDelete()">Delete</a></td>';
      echo '<td><a href="create-website.php?websiteId=' . $value['websiteId'] . '" class="btn btn-success">Edit</a></td>
      </tr>';
    }
    echo '</table>';
    echo '<a href="create-website.php" class="btn btn-primary">Add a Website</a>';

  } catch(Execption $e) {
    echo "Oops, something went wrong!";
  }
?>
  </body>
</html>
