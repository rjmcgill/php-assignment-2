<?php

  if(empty($_GET['websiteId'])) {
    $title = "Home";
    require_once("navbar.php");
    echo "<div>
            <h1>This is my home page</h1>
            <p>Wow what a great placeholder</p>
          </div>";
  } else {
    $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');
    $websiteId = $_GET['websiteId'];
    $sql = 'SELECT * FROM websites WHERE websiteId = :websiteId';
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':websiteId', $websiteId, PDO::PARAM_INT);
    $cmd->execute();

    $websiteInfo = $cmd->fetch();
    $title = $websiteInfo['website_Title'];
    require_once("navbar.php");
  }


  if(!empty($_GET['websiteId'])) {
    echo "<h1>" . $websiteInfo['website_Title'] . "</h1><br><p>" . $websiteInfo['website_Content'] . "</p>";
  }
?>

  </body>
</html>
