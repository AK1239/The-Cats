<?php
include("includes/config.php");
include("includes/database.php");
$id = $_GET['id'];

if (isset($_GET['id'])) {

  if ($stm = $conn->prepare('SELECT * from job WHERE id = ?')) {
    $stm->bind_param('i', $id);
    $stm->execute();

    $result = $stm->get_result();

    if ($result->num_rows > 0) {
      $job = $result->fetch_assoc();
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PataKazi TZ</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      max-width: none;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
</head>

<body>
  <?php

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
            <li><a href="home.php" id="active"><h4>Home</h4></a></li>
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
            <li><a href="home.php" id="active"><h4>Home</h4></a></li>
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
  <div class="detailsPage">
    <div class="headingCard">
      <div class="leftHeading">
        <div class="headingTitle">
          <h2><?php echo $job['company']; ?></h2>
          <h3><?php echo $job['title']; ?></h3>
        </div>
      </div>
      <div class="rightHeading">
        <h5><?php echo $job['date']; ?></h5>
      </div>
    </div>
    <div class="badgesCard">
      <div class="experienceBadge">
        <div class="experienceLogo">
          <i class="fa-solid fa-medal"></i>
        </div>
        <div class="experienceText">
          <h5>Experience</h5>
          <h5><?php echo $job['exp']; ?></h5>
        </div>
      </div>
      <div class="educationBadge">
        <div class="educationLogo">
          <i class="fa-solid fa-graduation-cap"></i>
        </div>
        <div class="educationText">
          <h5>Education Level</h5>
          <h5><?php echo $job['edulevel']; ?></h5>
        </div>
      </div>
    </div>
    <div class="summaryText">
      <h3>Job Summary</h3>
      <p>
        <?php echo $job['summary']; ?>
      </p>
      <p><b>Location: </b><?php echo $job['location']; ?></p>
    </div>
    <hr />
    <div class="dutiesText">
      <h3>Duties And Responsibilities</h3>

      <p><?php echo $job['duties']; ?></p>
      <div class="applyBtn">
        <input type="submit" value="Apply Now" id="applyButton" disabled />
      </div>
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


  <script>
    // Check the PHP session variable to determine if the user is logged in.
    <?php

    if (isset($_SESSION['email'])) {
      echo "const isLoggedIn = true;";
    } else {
      echo "const isLoggedIn = false;";
    }

    ?>

    // Get a reference to the "Apply Now" button.
    const applyButton = document.getElementById('applyButton');

    // Check if the user is logged in and enable/disable the button accordingly.
    if (isLoggedIn) {
      applyButton.disabled = false;
      applyButton.addEventListener('click', function() {
        window.location.href = 'apply.php?id=<?php echo $id; ?>';

      });
    } else {
      applyButton.disabled = false;
      applyButton.addEventListener('click', function() {
        window.alert('Please login to apply.');
      });
    }
  </script>

</body>

</html>