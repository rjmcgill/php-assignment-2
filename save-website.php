<?php
  $title = "Saving website...";
  require_once("navbar.php");
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  }
?>
    <div>
      <p>Wow what a great placeholder</p>
    </div>
  </body>
</html>
