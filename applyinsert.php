<?php
include("includes/config.php");
include("includes/database.php");

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$job_id = $_GET['job_id'];

if (isset($_GET['job_id'])) {
    $phoneNo = $_POST['phoneNo'];
    $experience = $_POST['experience'];
    $qualifications = $_POST['qualifications'];
    $moreDetails = $_POST['moreDetails'];

    // Get the uploaded CV file
    $cv_data = file_get_contents($_FILES['cvFile']['tmp_name']);

    // Prepare the SQL statement
    if ($stm = $conn->prepare('INSERT INTO application(fname, lname, email, phone, cv, exp, qualifications, more, job_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
        $null = NULL;
        $stm->bind_param('ssssbbbsi', $fname, $lname, $email, $phoneNo, $null, $experience, $qualifications, $moreDetails, $job_id);

        // Use bind_param for the binary data (blob)
        $stm->send_long_data(4, $cv_data);

        if ($stm->execute()) {
            $stm->close();
            header("Location: success.html");
            die();
        } else {
            echo 'Could not execute statement: ' . $stm->error;
        }
    } else {
        echo 'Could not prepare statement: ' . $conn->error;
    }
} else {
    echo "Something went wrong.";
}
