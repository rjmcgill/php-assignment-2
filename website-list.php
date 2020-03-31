<?php
  $title = "Website List";
  require_once("navbar.php");
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  }
?>
    <div>
      <h1>This is my home page</h1>
      <p>Wow what a great placeholder</p>
    </div>
  </body>
</html>
