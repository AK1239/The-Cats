<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_POST['title'])) {

    if ($stm = $conn->prepare('UPDATE job set title = ?, schedule = ? , salary = ? , type = ? , exp = ? , edulevel = ? , company = ? , location = ? , summary = ? , duties = ? , date = ?  WHERE id = ?')) {
        $stm->bind_param('ssissssssssi', $_POST['title'], $_POST['schedule'], $_POST['salary'], $_POST['type'], $_POST['exp'], $_POST['edulevel'], $_POST['company'], $_POST['location'], $_POST['summary'], $_POST['duties'], $_POST['date'], $_GET['id']);
        $stm->execute();
        $stm->close();
        set_message("Job  " . $_GET['id'] . " has been updated");
        header('Location: jobs.php');
        die();
    } else {
        echo 'Could not prepare post update statement statement!';
    }
}


if (isset($_GET['id'])) {

    if ($stm = $conn->prepare('SELECT * from job WHERE id = ?')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $result = $stm->get_result();
        $post = $result->fetch_assoc();

        if ($post) {


?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="display-1">Edit job</h1>

                        <form method="post">
                            <!-- Title input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="title" name="title" class="form-control" value="<?php echo $post['title'] ?>" />
                                <label class="form-label" for="title">Title</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="companyu" name="company" class="form-control" value="<?php echo $post['company'] ?>" />
                                <label class="form-label" for="company">Company</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="type" name="type" class="form-control" value="<?php echo $post['type'] ?>" />
                                <label class="form-label" for="type">Type</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="schedule" name="schedule" class="form-control" value="<?php echo $post['schedule'] ?>" />
                                <label class="form-label" for="schedule">Schedule</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="salary" name="salary" class="form-control" value="<?php echo $post['salary'] ?>" />
                                <label class="form-label" for="salary">Salary</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="experience" name="exp" class="form-control" value="<?php echo $post['exp'] ?>" />
                                <label class="form-label" for="experience">Experience</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="edulevel" name="edulevel" class="form-control" value="<?php echo $post['edulevel'] ?>" />
                                <label class="form-label" for="edulevel">Education Level</label>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" id="location" name="location" class="form-control" value="<?php echo $post['location'] ?>" />
                                <label class="form-label" for="location">Location</label>
                            </div>


                            <!-- Content input -->
                            <div class="form-outline mb-4">
                                <textarea name="summary" id="content"><?php echo $post['summary'] ?></textarea>
                            </div>
                            <div class="form-outline mb-4">
                                <textarea name="duties" id="content"><?php echo $post['duties'] ?></textarea>
                            </div>

                            <!-- Date select -->
                            <div class="form-outline mb-4">
                                <input type="date" id="date" name="date" class="form-control" value="<?php echo $post['date'] ?>" />
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
        }
        $stm->close();
    } else {
        echo 'Could not prepare statement!';
    }
} else {
    echo "No user selected";
    die();
}

include('includes/footer.php');
?>