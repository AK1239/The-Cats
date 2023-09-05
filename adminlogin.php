<?php

include("includes/database.php");
include("includes/config.php");


?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Admin Portal</title>
    <link rel="stylesheet" href="adminlogin.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div class="maincontent">
      <img src="images/catslogo.png" alt="" />
      <p>Welcome to Admin Portal</p>

      <form action="adminloginhandler.php" method="post">
        <input type="text" name="uname" placeholder="Username" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="submit" name="login" value="Log In" />
      </form>
      <div class="error-message">
        <?php
        if (isset($_GET['error'])) {
            echo "Username or password is incorrect.";
        }
        ?>
      </div>
    </div>
  </body>
</html>

