<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();
include('includes/header.php');


$id = $_GET['id'];

if (isset($_GET['id'])) {

    if ($stm = $conn->prepare('SELECT * from application WHERE id = ?')) {
        $stm->bind_param('i', $id);
        $stm->execute();

        $result = $stm->get_result();

        if ($result->num_rows > 0) {
            $applicant = $result->fetch_assoc();
        }
    }
}

?>


<div class="whole-content">

    <h2>Applicant Details:</h2>
    <div class="box-content">
        <h4>First name: </h4>
        <p><?php echo $applicant['fname']; ?></p>
    </div>
    <div class="box-content">
        <h4>Last name: </h4>
        <p><?php echo $applicant['lname']; ?></p>
    </div>

    <div class="box-content">
        <h4>Email: </h4>
        <p><?php echo $applicant['email']; ?></p>
    </div>

    <div class="box-content">
        <h4>Phone Number: </h4>
        <p><?php echo $applicant['phone']; ?></p>
    </div>

    <div class="box-content">
        <h4>CV: </h4>
        <a href="cv_download.php?id=<?php echo $applicant['id']; ?>" target="_blank">Download CV</a>
    </div>

    <div class="box-content">
        <h4>Experience: </h4>
        <p><?php echo $applicant['exp']; ?></p>
    </div>

    <div class="box-content">
        <h4>Qualifications: </h4>
        <p><?php echo $applicant['qualifications']; ?></p>
    </div>

    <div class="box-content">
        <h4>More about yourself: </h4>
        <p><?php echo $applicant['more']; ?></p>
    </div>


</div>

<?php

include('includes/footer.php');

?>