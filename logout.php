<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logging Out...</title>
</head>
    <?php
      session_start();    //Access current session
      session_unset();    //Remove any session variables
      session_destroy();  //end the current session
      header('location:login.php');
    ?>

</main>

</body>
</html>
