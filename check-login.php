<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checking Credentials...</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

  <?php

    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');

    $sql = "SELECT username, password FROM users WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();

    $user = $cmd->fetch();


    if (!password_verify($password, $user['password'])) {
      header('location:login.php?invalid=true');
      exit();
    } else {
      //Access the existing session
      session_start();

      $_SESSION['username'] = $user['username'];

      //also store username in a 2nd session variable to display in Navbar
      $_SESSION['username'] = $username;

      //Redirect to the artist list page
      header('location:index.php');
    }
    $db = null;

  ?>

</body>
</html>
