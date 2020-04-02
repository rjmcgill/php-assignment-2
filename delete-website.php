<?php
  $title = "Deleting website...";
  require_once("navbar.php");
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  } else {
    header("location:website-list.php");
  }

  $websiteId = $_GET['websiteId'];
  try {
    $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');
    $sql = 'DELETE FROM websites WHERE websiteId = :websiteId';
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':websiteId', $websiteId, PDO::PARAM_INT);
    //Execute the deletion
    $cmd->execute();
    //Disconnect
    $db = null;
    //Redirect back to updated artist-list page
  } catch(Execption $e) {
    header("location:error.php");
  }

?>

  </body>
</html>
