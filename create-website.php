<?php
  $title = "Create a Website";
  require_once("navbar.php");
  if(empty($_SESSION['username'])) {
    header("location:login.php");
  }
?>

    <main class="container">
        <h1>Create a Website</h1>
        <form method="post" action= "save-website.php">
            <fieldset class="form-group">
                <label for="name" class="col-md-2">Website Name:</label>
                <input name="name" id="name" placeholder="Name" required/>
            </fieldset>
            <fieldset class="form-group">
                <label for="content" class="col-md-2">Page Content(Max 1028 characters): </label>
                <style>
                  textarea {
                    width: 100%;
                  }
                </style>
                <textarea name="content" id="content" required></textarea>
            </fieldset>
            <div>
                <input type="submit" value="Create" class="btn btn-info"/>
            </div>
        </form>
    </main>
  </body>
</html>
