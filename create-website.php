<?php
  $title = "Create a Website";
  require_once("navbar.php");
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  }
?>
    <div>
      <h1>Create a Website</h1>
      <p>Wow what a great placeholder</p>
    </div>
  </body>
</html>
