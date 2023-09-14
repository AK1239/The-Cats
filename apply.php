<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PataKazi TZ</title>
  <link rel="stylesheet" href="apply.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>
  <?php
  include("includes/config.php");

  if (isset($_SESSION['email'])) {
    echo '
<nav>
    <div class="left">
        <ul id="nav-list">
            <li>
                <div class="pataKazi">
                    <i class="fa-solid fa-globe"></i>
                    <h1 class="companyName"><a href="home.php">PataKazi</a></h1>
                </div>
            </li>
            <li><a href="home.php"><h4>Home</h4></a></li>
            <li id="logout-item"><a href="userlogout.php">Logout</a></li>
        </ul>
    </div>
    <div class="right">
   <div class="location">
      <i class="fa-solid fa-location-dot"></i>
      <a href="">Dar Es Salaam, TZ</a>
    </div>
  
  </div>


</nav>
';
  } else {
    echo '
<nav>
    <div class="left">
        <ul id="nav-list">
            <li>
                <div class="pataKazi">
                    <i class="fa-solid fa-globe"></i>
                    <h1 class="companyName"><a href="home.php">PataKazi</a></h1>
                </div>
            </li>
            <li><a href="home.php"><h4>Home</h4></a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.html">Register</a></li>
        </ul>
    </div>
    <div class="right">
    <div class="location">
       <i class="fa-solid fa-location-dot"></i>
       <a href="">Dar Es Salaam, TZ</a>
     </div>
    
   </div>
   </nav>
';
  }
  ?>
  <div class="maincontent">
    <?php
    $job_id = $_GET['id'];
    ?>
    <form action="applyinsert.php?job_id=<?php echo $job_id; ?>" method="post" id="form" enctype="multipart/form-data">
      <h1 class="head1">Please fill in your details:</h1>

      <div class="inputs">
        <input type="number" value="" placeholder="Phone Number" class="input-field" name="phoneNo" max="99999999999" required />
        <div class="cvUpload">
          <span for="cvFile">Upload your CV:</span>
          <input name="cvFile" type="file" value="" class="input-field" name="inputFile" required />
        </div>

        <div class="exp">
          <span for="experience">Experience:</span>
          <select id="experienceInput" name="experience">
            <option value="Less Than 1 Year">Less than 1 year</option>
            <option value="Two to Three Years">2 - 3 years</option>
            <option value="Five to Ten Years">5 - 10 years</option>
            <option value="Ten+ Years">10+ years</option>
          </select>
        </div>
        <input type="text" id="qualifications" value="" placeholder="Qualifications" class="input-field" name="qualifications" required />
        <textarea name="moreDetails" class="input-field" cols="30" rows="10" placeholder="Tell us more about yourself" max="200"></textarea>
      </div>
      <div class="form-footer">
        <input type="submit" name="sbutton" id="sbutton" value="Apply now!" />
      </div>
    </form>
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