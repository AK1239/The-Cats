<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_GET['delete'])) {
    if ($stm = $conn->prepare('DELETE FROM job where id = ?')) {
        $stm->bind_param('i',  $_GET['delete']);
        $stm->execute();
        set_message("Job  " . $_GET['delete'] . " has been deleted");
        header('Location: jobs.php');
        $stm->close();
        die();
    } else {
        echo 'Could not prepare statement!';
    }
}

if ($stm = $conn->prepare('SELECT * FROM job')) {
    $stm->execute();

    $result = $stm->get_result();




    if ($result->num_rows > 0) {
        if ($stm2 = $conn->prepare('SELECT * FROM application')) {
            $stm2->execute();
            $result2 = $stm2->get_result();





?>
            <div class="container mt-5 container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="display-5 mb-4">Jobs management</h1>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Salary</th>
                                <th>Schedule</th>
                                <th>Date</th>
                                <th>Edit | Delete</th>

                            </tr>

                            <?php while ($record = mysqli_fetch_assoc($result)) {  ?>
                                <tr>

                                    <td><?php echo $record['id']; ?> </td>
                                    <td><?php echo $record['title']; ?> </td>
                                    <td><?php echo $record['salary']; ?> </td>
                                    <td><?php echo $record['schedule']; ?> </td>
                                    <td><?php echo $record['date']; ?> </td>
                                    <td><a href="jobs_edit.php?id=<?php echo $record['id']; ?>">Edit</a> |
                                        <a href="jobs.php?delete=<?php echo $record['id']; ?>">Delete</a>
                                    </td>
                                </tr>


                            <?php } ?>


                        </table>

                        <a href="jobs_add.php"> Add new job</a>

                    </div>
                    <div class="col-md-9 mt-5">
                        <h1 class="display-5 mb-4">Applications</h1>
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Job Applied to</th>
                                <th>Others</th>

                            </tr>

                            <?php while ($record2 = mysqli_fetch_assoc($result2)) {  ?>
                                <tr>

                                    <td><?php echo $record2['id']; ?> </td>
                                    <td><?php echo $record2['fname']; ?> </td>
                                    <td><?php echo $record2['email']; ?> </td>
                                    <td><?php echo $record2['phone']; ?> </td>
                                    <td><?php echo $record2['job_id']; ?> </td>
                                    <td><a href="applicants_more.php?id=<?php echo $record2['id']; ?>">View More</a>
                                    </td>
                                </tr>


                            <?php } ?>


                        </table>


                    </div>

                </div>
            </div>


        <?php
        } else {
        ?>
            <h4 style="margin-top: 20px; margin-left: 20px; color: rgb(46,25,25);">No jobs found</h4>
            <a href="jobs_add.php"><button class="add_button" style="background-color: rgb(56,109,192);
    color: white;
    padding: 10px;
    margin-left: 20px;
    margin-top: 20px;">Add a new job</button></a>

<?php
        }
    }


    $stm->close();
} else {
    echo 'Could not prepare statement!';
}
include('includes/footer.php');
?>