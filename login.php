<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PataKazi TZ</title>
  <link rel="stylesheet" href="login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>

  <nav>
    <div class="left">
      <ul>
        <li>
          <div class="pataKazi">
            <i class="fa-solid fa-globe"></i>
            <h1 class="companyName"><a href="home.php">PataKazi</a></h1>
          </div>
        </li>
        <li>
          <a href="home.php">Home</a>
        </li>
        <li>
          <a href="login.php" id="active">
            <h4>Login</h4>
          </a>
        </li>
        <li><a href="register.html">Register</a></li>
      </ul>
    </div>
    <div class="right">
      <div class="location"><i class="fa-solid fa-location-dot"></i> <a href="">Dar Es Salaam, TZ</a></div>
    </div>
  </nav>
  <div class="maincontent">
    <img src="images/catslogo.png" alt="" />
    <p>Dont have an account ? <a href="register.html">Register</a></p>

    <form action="loginhandler.php" method="post">
      <input type="email" name="email" placeholder="Email" />
      <input type="password" name="pass" placeholder="Password" />
      <input type="submit" name="signin" value="Log In" />
    </form>



    <div class="error-message">
      <?php
      if (isset($_GET['error'])) {
        echo "Username or password is incorrect.";
      }
      ?>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>Useful links</h4>
          <ul>
            <li><a href="home.php">Home</a></li>

            <li>
              <a href="login.php">Login</a>
            </li>
            <li><a href="register.html">Register</a></li>

          </ul>
        </div>
        <div class="main"></div>
        <div class="footer-col">
          <h4>Location</h4>
          <div class="logo">
            <ul>
              <li>
                <p>RITA Tower , 16th floor</p>
              </li>
              <li>
                <p>Simu Street</p>
              </li>
              <li>
                <p>Dar es Salaam</p>
              </li>
              <li>
                <p>Tanzania</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="footer-col">
          <h4>Contact Us</h4>
          <div class="social-links">
            <a href="#" target="_blank"><i class="fa-solid fa-phone"></i></a>
            <a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>