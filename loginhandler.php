<?php
include("includes/config.php");
include("includes/database.php");

$email = $_POST['email'];
$password = $_POST['pass'];


if (isset($_POST['email']) && isset($_POST['pass'])) {
  if ($stm = $conn->prepare('SELECT * FROM user WHERE email = ?')) {
    $stm->bind_param('s', $email);
    $stm->execute();
    $result = $stm->get_result();

    if ($result->num_rows > 0) {
      $record = mysqli_fetch_assoc($result);

      if (password_verify($password, $record['pass'])) {
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $password;
        $_SESSION['fname'] = $record['fname'];
        $_SESSION['lname'] = $record['lname'];

        header("Location: home.php");
        exit();
      } else {
        header("Location: login.php?error=1");
        die();
      }
    } else {
      header("Location: login.php?error=1");
      die();
    }
    $stm->close();
  } else {
    echo 'Could not prepare statement!';
  }
}
