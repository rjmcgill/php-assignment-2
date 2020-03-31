<?php
  if(!empty($_GET['userId'])) {
    $title = "Edit a User";
  } else {
    $title = "Register a User";
  }
  $username = ["username"=>""];

  require_once("navbar.php");

  if(!empty($_GET['taken'])) {
    if($_GET['taken'] == true) {
      echo '<div class="alert alert-danger">Username already taken</div>';
    }
  }
  
  if(!empty($_SESSION['username'])) {
    if(!empty($_GET['userId'])) {
      $userId = $_GET['userId'];
      $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');
      $sql = 'SELECT username FROM user_table WHERE userId = :userId;';
      $cmd = $db->prepare($sql);
      $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
      $cmd->execute();

      $username = $cmd->fetch();
      $db = null;
      $extention = "save-registration.php?userId=" . $_GET['userId'];
    } else {
      $extention = "save-registration.php";
    }
  } else {
    $extention = "save-registration.php";
  }

?>
    <main class="container">
        <h1>Register as a User</h1>
        <form method="post" action= <?php echo $extention ?>>
            <fieldset class="form-group">
                <label for="username" class="col-md-2">Username:</label>
                <input name="username" id="username" required type="email" placeholder="email@email.com" value = "<?php echo $username['username'] ?>"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="password" class="col-md-2">Password:</label>
                <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
            </fieldset>
            <fieldset class="form-group">
                <label for="confirm" class="col-md-2">Confirm Password:</label>
                <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup = "return comparePasswords();"/>
                <span id="pwMsg"></span>
            </fieldset>
            <div class="offset-md-2">
                <input type="submit" value="Register" class="btn btn-info" onclick="return comparePasswords();"/>
            </div>
        </form>
    </main>
  </body>
</html>
