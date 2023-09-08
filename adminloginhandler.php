<?php

include("includes/database.php");
include("includes/config.php");

if (isset($_POST['uname']) && isset($_POST['pass'])) {
    $inputUsername = $_POST['uname'];
    $inputPassword = $_POST['pass'];

    $stm = $conn->prepare('SELECT uname, pass FROM adminuser WHERE uname = ?');
    $stm->bind_param('s', $inputUsername);
    $stm->execute();

    $result = $stm->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($inputPassword, $user['pass'])) {
        $_SESSION['adminuname'] = $user['uname'];
        header("Location: jobs.php");
        die();
    } else {
        header("Location: adminlogin.php?error=1");
        die();
    }

    $stm->close();
}
