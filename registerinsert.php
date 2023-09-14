<?php
include("includes/database.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$hashedpass = password_hash($pass, PASSWORD_DEFAULT);

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['pass'])) {
    if ($stm = $conn->prepare('INSERT INTO user(fname,lname,email,pass) VALUES (?, ?, ?, ?)')) {
        $stm->bind_param('ssss', $fname, $lname, $email, $hashedpass);
        $stm->execute();
        header("Location: register.html");
        $stm->close();
        die();
    } else {
        echo 'Could not prepare statement!';
    }
}
