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


    if (isset($_FILES["cvFile"]) && $_FILES["cvFile"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cvFile"]["name"]);

        if (move_uploaded_file($_FILES["cvFile"]["tmp_name"], $target_file)) {
            $file_name = basename($_FILES["cvFile"]["name"]);
            $file_path = $target_file;
            $user_name = $fname;

            $stmt = $conn->prepare("INSERT INTO cvs (file_name, file_path, user_name) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $file_name, $file_path, $user_name);

            if ($stmt->execute()) {
                echo "CV uploaded successfully.";
            } else {
                echo "Error uploading CV.";
            }

            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error: Please select a file to upload.";
    }

    if ($stm = $conn->prepare('INSERT INTO application(fname, lname, email, phone, exp, qualifications, more, job_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
        $stm->bind_param('sssssssi', $fname, $lname, $email, $phoneNo, $experience, $qualifications, $moreDetails, $job_id);


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
