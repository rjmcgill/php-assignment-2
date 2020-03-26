
<?php
  $title = 'User List';
  require_once('navbar.php');

  echo '<h1>Users</h1>'
  $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');



  echo '<table class="table table-striped table-hover"><thread> <th>Username</th><th></th><th></th> </thread>';

  // 5. Use a foreach loop to iterate (cycle) through all the values in the $artists variable.  Inside this loop, use an echo command to display the name of each person.  See https://www.php.net/manual/en/control-structures.foreach.php for details.
  foreach ($artists as $value) {

    echo '<tr>';
    if(!empty($_SESSION['userId'])) {
      echo '<td><a href="artist.php?artistId=' . $value['artistId'] . '">' . $value['name'] . '</a></td>';
    } else {
      echo '<td>' . $value['name'] . '</td>';
    }

    echo '<td>' . $value['yearFounded'] . '</td>
    <td>' . '<a href="' . $value['website'] . '" target="_new">' . $value['website'] . '</td>';

    if(!empty($value['photo'])) {
      echo '<td><img src-"img/artists/' . $value['photo'] . '" alt="Artist Photo" class="listThumb" />';
    } else {
      echo '<td></td>';
    }

    if(!empty($_SESSION['userId'])) {
      echo '<td><a href="delete-artist.php?artistId=' . $value['artistId'] . '" class="btn btn-danger" onclick="return confirmDelete()">Delete</td>
      </tr>';
    }


  }
  echo '</table>';
?>
