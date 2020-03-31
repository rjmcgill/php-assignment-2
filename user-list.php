
<?php

  $title = 'User List';
  require_once('navbar.php');
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  }

  echo '<h1>Users</h1>';

  try{
    $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');

    $query = 'select * from user_table';
    $cmd = $db->prepare($query);
    $cmd->execute();

    $users = $cmd -> fetchAll();



//table-striped
    echo '<table class="table table-hover"><thread> <th>User Id</th><th>Username</th></thread>';

    // 5. Use a foreach loop to iterate (cycle) through all the values in the $artists variable.  Inside this loop, use an echo command to display the name of each person.  See https://www.php.net/manual/en/control-structures.foreach.php for details.
    foreach ($users as $value) {

      echo '<tr>';
        echo '<td>' . $value['userId'] . '</td>';

      echo '<td>' . $value['username'] . '</td>';
      echo '<td><a href="delete-user.php?userId=' . $value['userId'] . '" class="btn btn-danger" onclick="return confirmDelete()">Delete</td>';
      echo '<td><a href="register.php?userId=' . $value['userId'] . '" class="btn btn-success">Edit</td>
      </tr>';



    }
    echo '</table>';
  } catch(Execption $e) {
    echo "Oops, something went wrong!";
  }

?>

</body>
</html>
