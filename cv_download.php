<?php
include("includes/config.php");
include("includes/database.php");

$user_name = $_SESSION['fname'];

$stm = $conn->prepare("SELECT * FROM cvs WHERE user_name = ?");
$stm->bind_param('s', $user_name);
$stm->execute();
$result = $stm->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo 'Click the file below to download the CV <br><br>';
    echo '<a href="' . $row["file_path"] . '" download>' . $row["file_name"] . '</a><br>';
} else {
    echo "No CVs found for this user.";
}

$conn->close();
