<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Adding Logo...</title>
  </head>
  <body>
    <?php
      $photo = $_FILES['photo'];
      echo $photo['name'];
      if(!empty($photo['tmp_name'])) {
        $tmp_name = $photo['tmp_name'];
        $type = mime_content_type($tmp_name);

        if ($type != 'image/jpeg' && $type != 'image/png') {
        echo 'Photo must be a .jpg or .png file';
        header("location:website-list.php?error=type");
        exit();
        }
        move_uploaded_file($tmp_name, "assets/logo/logo.png");
        header("location:website-list.php");
      } else {
        header("location:website-list.php?error=missingImg");
      }
    ?>
  </body>
</html>
