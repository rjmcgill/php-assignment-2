<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting User...</title>
</head>
<body>
  <?php

    $userId = $_GET['userId'];

    $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');
    $sql = 'DELETE FROM user_table WHERE userId = :userId';
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
    //Execute the deletion
    $cmd->execute();
    //Disconnect
    $db = null;
    //Redirect back to updated artist-list page
    header('location:user-list.php');
  ?>

</body>
</html>
