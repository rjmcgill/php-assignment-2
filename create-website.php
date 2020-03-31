<?php
  if(!empty($_GET['websiteId'])) {
    $title = "Edit a Website";
  } else {
    $title = "Create a Website";
  }

  $websiteInfo = ["website_Title"=>"", "website_Content"=>""];

  if(!empty($_GET['taken'])) {
    if($_GET['taken'] == true) {
      echo '<div class="alert alert-danger">Website name already taken</div>';
    }
  }

  require_once("navbar.php");
  if(!empty($_SESSION['username'])) {
    if(!empty($_GET['websiteId'])) {
      $websiteId = $_GET['websiteId'];
      $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');
      $sql = 'SELECT * FROM websites WHERE websiteId = :websiteId;';
      $cmd = $db->prepare($sql);
      $cmd->bindParam(':websiteId', $websiteId, PDO::PARAM_INT);
      $cmd->execute();

      $websiteInfo = $cmd->fetch();
      $db = null;
      $extention = "save-website.php?websiteId=" . $_GET['websiteId'];
    } else {
      $extention = "save-website.php";
    }
  } else {
    $extention = "save-website.php";
  }
?>

    <main class="container">
        <h1>Create a Website</h1>
        <form method="post" action= "<?php echo $extention ?>">
            <fieldset class="form-group">
                <label for="name" class="col-md-2">Website Name:</label>
                <input name="name" id="name" placeholder="Name" value = "<?php echo $websiteInfo['website_Title'] ?>" required/>
            </fieldset>
            <fieldset class="form-group">
                <label for="content" class="col-md-2">Page Content(Max 1028 characters): </label>
                <style>
                  textarea {
                    width: 100%;
                  }
                </style>
                <textarea name="content" id="content" required><?php echo $websiteInfo['website_Content']?></textarea>
            </fieldset>
            <div>
                <input type="submit" value="Create" class="btn btn-info"/>
            </div>
        </form>
    </main>
  </body>
</html>
