<?php

function set_message($message)
{
    $_SESSION['message'] = $message;
}

function get_message()
{
    if (isset($_SESSION['message'])) {

        echo "<script type='text/javascript'> showToast('" . $_SESSION['message'] . "','top right' , 'success') </script>";
        unset($_SESSION['message']);
    }
}

function secure()
{
    if (!isset($_SESSION['adminuname'])) {
        header('Location: adminlogin.php');
        exit();
    }
}
