<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Content Management Site - <?php echo $title; ?></title>

    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/scripts.js" async></script>
    <?php
      session_start();
     ?>
  </head>
  <body>
    <!--https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp-->

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <!-- Brand -->
      <img src="assets/logo/logo.png" alt="Logo" height=50px width=50px>
      <a class="navbar-brand">Managed Content Site</a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        </ul>
        <ul class="navbar-nav m1-auto">
          <li>
            <a class="nav-link" href="website-list.php">Admin Side</a>
          </li>
          <?php
            try {
              $db = new PDO('mysql:host=172.31.22.43;dbname=Ryan_J1103749', 'Ryan_J1103749', 'DqwMH5MD1Z');
              $sql = "SELECT * FROM websites";

              $cmd = $db->prepare($sql);
              $cmd->execute();

              $websites = $cmd -> fetchAll();

              foreach($websites as $value) {
                echo '<li class="nav-item">
                        <a class="nav-link" href="index.php?websiteId=' . $value['websiteId'] .'">' . $value['website_Title'] . '</a>
                      </li>';
              }
              $db = null;
            } catch(Exception $e) {
              header("location:error.php");
            }

           ?>

        </ul>
      </div>
    </nav>
