<?php

  if(empty($_GET['websiteId'])) {
    $title = "Home";
    require_once("navbar.php");
    echo "<div>
            <h1>Welcome to the Back End</h1>
            <p>Please use the links in the navigation bar to use the website.</p>
          </div>";
  } else {
    try {
      $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');
      $websiteId = $_GET['websiteId'];
      $sql = 'SELECT * FROM websites WHERE websiteId = :websiteId';
      $cmd = $db->prepare($sql);
      $cmd->bindParam(':websiteId', $websiteId, PDO::PARAM_INT);
      $cmd->execute();

      $websiteInfo = $cmd->fetch();
      $title = $websiteInfo['website_Title'];
      require_once("CMNavbar.php");
      $db = null;
    } catch(Exception $e) {
      header("location:error.php");
    }
  }


  if(!empty($_GET['websiteId'])) {
    echo "<h1>" . $websiteInfo['website_Title'] . "</h1><br><p>" . $websiteInfo['website_Content'] . "</p>";
  }
?>

  </body>
</html>
