<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Saving User...</title>
  </head>
  <body>
    <?php
      //Store form inputs in variables
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirm = $_POST['confirm'];

      //validate inputs
      $ok = true;
      if(empty($username)) {
        echo 'Username is required <br>';
        $ok = false;
      }
      if(empty($password)) {
        echo 'Password is required <br>';
        $ok = false;
      }
      if($password != $confirm) {
        echo 'Passwords must match';
        $ok = false;
      }

      //hash the password
      if($ok) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {


          //connect
          $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');

          //duplicate check before insert
          $sql = "SELECT * FROM user_table WHERE username = :username";
          $cmd = $db->prepare($sql);
          $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);

          $cmd->execute();
          $user = $cmd->fetch();

          if(!empty($user)) {
            echo 'Username already taken';
          } else {



          //set up & run insert
          $sql = "INSERT INTO user_table (username, password) VALUES (:username, :password)";
          $cmd = $db->prepare($sql);
          $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
          $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
          $cmd->execute();

          //Disconnect
          $db = null;
          }
        } catch(Execption $e) {
            echo 'Oops! Something broke!';
          }
        //redirect to artist-list page
        header("location:login.php");
      }

    ?>
  </body>
</html>
