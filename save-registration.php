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
      $userId = $_GET['userId'];



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
          $sql = "SELECT * FROM user_table WHERE username = :username AND WHERE userId = :userId";
          $cmd = $db->prepare($sql);
          $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
          $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);

          $cmd->execute();
          $user = $cmd->fetch();

          if(!empty($user)) {
            echo 'Username already taken';
            header("location:register.php?taken=true");
          } else {
            if(empty($userId)) {
              //set up & run insert
              $sql = "INSERT INTO user_table (username, password) VALUES (:username, :password)";
            } else {
              $sql = "UPDATE user_table SET username = :username, password = :password WHERE userId = :userId";
            }

            $cmd = $db->prepare($sql);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
            $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
            if(!empty($userId)) {
              $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
            }
            $cmd->execute();

            //Disconnect
            $db = null;
            //redirect to login page
            header("location:login.php");
          }
        } catch(Execption $e) {
            header("location:error.php");
          }
      }
    ?>
  </body>
</html>
