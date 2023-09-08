<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_POST['title'])) {

    if ($stm = $conn->prepare('INSERT INTO job (title , date , salary , type, schedule , company , exp , edulevel , summary , location , duties) VALUES (?, ?, ?, ? , ? , ? , ? , ? , ? , ? , ?)')) {

        $stm->bind_param('sssssssssss', $_POST['title'], $_POST['date'], $_POST['salary'],  $_POST['type'], $_POST['schedule'], $_POST['company'], $_POST['exp'], $_POST['edulevel'], $_POST['summary'], $_POST['location'], $_POST['duties']);
        $stm->execute();
        set_message("A new job has been added");
        header('Location: jobs.php');
        $stm->close();
        die();
    } else {
        echo 'Could not prepare statement!';
    }
}


?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="display-4">Add job</h1>

            <form method="post">
                <!-- Username input -->
                <div class="form-outline mb-4">
                    <input type="text" id="title" name="title" class="form-control" />
                    <label class="form-label" for="title">Title</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="companyu" name="company" class="form-control" />
                    <label class="form-label" for="company">Company</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="type" name="type" class="form-control" />
                    <label class="form-label" for="type">Type</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="schedule" name="schedule" class="form-control" />
                    <label class="form-label" for="schedule">Schedule</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="salary" name="salary" class="form-control" />
                    <label class="form-label" for="salary">Salary</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="experience" name="exp" class="form-control" />
                    <label class="form-label" for="experience">Experience</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="edulevel" name="edulevel" class="form-control" />
                    <label class="form-label" for="edulevel">Education Level</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="location" name="location" class="form-control" />
                    <label class="form-label" for="location">Location</label>
                </div>


                <!-- Content input -->
                <div class="form-outline mb-4">
                    <textarea name="summary" id="content">Job Summary</textarea>
                </div>
                <div class="form-outline mb-4">
                    <textarea name="duties" id="content">Duties and Responsibilities</textarea>
                </div>

                <!-- Date select -->
                <div class="form-outline mb-4">
                    <input type="date" id="date" name="date" class="form-control" />
                    <label class="form-label" for="date">Date</label>


                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Add job</button>
            </form>



        </div>

    </div>
</div>

<script src="js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content'
    });
</script>
<?php
include('includes/footer.php');
?>