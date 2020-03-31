<?php
  $title = "Saving website...";
  require_once("navbar.php");
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  }

  //Store form inputs in variables
  $website_Title = $_POST['name'];
  $website_Content = $_POST['content'];



  //validate inputs
  $ok = true;
  if(empty($website_Title)) {
    echo 'Name is required <br>';
    $ok = false;
  }
  if(empty($website_Content)) {
    echo 'Content is required <br>';
    $ok = false;
  }

  if($ok) {
    try {
      //connect
      $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');

      //duplicate check before insert
      $sql = "SELECT * FROM websites WHERE website_Title = :website_Title";
      $cmd = $db->prepare($sql);
      $cmd->bindParam(':website_Title', $website_Title, PDO::PARAM_STR, 45);

      $cmd->execute();
      $websites = $cmd->fetch();

      if(!empty($websites)) {
        echo 'Website Name already taken';
        header("location:create-website.php?taken=true");
      } else {
        //set up & run insert
        $sql = "INSERT INTO websites (website_Title, website_Content) VALUES (:website_Title, :website_Content)";

        $cmd = $db->prepare($sql);
        $cmd->bindParam(':website_Title', $website_Title, PDO::PARAM_STR, 45);
        $cmd->bindParam(':website_Content', $website_Content, PDO::PARAM_STR, 1028);
        $cmd->execute();

        //Disconnect
        $db = null;
        //redirect to login page
        //header("location:index.php");
      }
    } catch(Execption $e) {
        echo 'Oops! Something broke!';
      }
  }


?>
  </body>
</html>
