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
  if(!empty($_GET['error'])) {
    if($_GET['error'] == 'missingImg') {
      echo '<div class="alert alert-danger">You did not upload an image for the logo</div>';
    }

    if($_GET['error'] == 'type') {
      echo '<div class="alert alert-danger">Please upload either a jpeg or png file type</div>';
    }
  }

  echo '<h1>Active Websites</h1>';

  try{
    $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');

    $query = 'select * from websites';
    $cmd = $db->prepare($query);
    $cmd->execute();

    $websites = $cmd -> fetchAll();
    echo '<form action="add-logo.php" method="post" enctype="multipart/form-data">
          <label for="photo">Add a site logo</label>
          <input type="file" name="photo" id="photo">
          <button type="submit" name="submit" class="btn btn-primary">Upload Logo</button>
          </form>';
    //table-striped
    echo '<table class="table table-hover"><thread> <th>Website Id</th><th>Website Name</th> <th>Website Content</th></thread>';

    foreach ($websites as $value) {

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
    header("location:error.php");
  }
?>
  </body>
</html>
