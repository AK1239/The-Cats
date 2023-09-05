<?php

include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
secure();

include('includes/header.php');

if (isset($_GET['delete'])) {
    if ($stm = $conn->prepare('DELETE FROM posts where id = ?')) {
        $stm->bind_param('i',  $_GET['delete']);
        $stm->execute();
        set_message("Post  " . $_GET['delete'] . " has been deleted");
        header('Location: posts.php');
        $stm->close();
        die();
    } else {
        echo 'Could not prepare statement!';
    }
}

if ($stm = $conn->prepare('SELECT * FROM posts')) {
    $stm->execute();

    $result = $stm->get_result();




    if ($result->num_rows > 0) {



?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1 class="display-4">Posts management</h1>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Edit | Delete</th>

                        </tr>

                        <?php while ($record = mysqli_fetch_assoc($result)) {  ?>
                            <tr>

                                <td><?php echo $record['id']; ?> </td>
                                <td><?php echo $record['title']; ?> </td>
                                <td><?php echo $record['content']; ?> </td>
                                <td><a href="posts_edit.php?id=<?php echo $record['id']; ?>">Edit</a> |
                                    <a href="posts.php?delete=<?php echo $record['id']; ?>">Delete</a>
                                </td>
                            </tr>


                        <?php } ?>


                    </table>

                    <a href="posts_add.php"> Add new post</a>

                </div>

            </div>
        </div>


    <?php
    } else {
    ?>
        <h4 style="margin-top: 20px; margin-left: 20px; color: rgb(46,25,25);">No posts found</h4>
        <a href="posts_add.php"><button class="add_button" style="background-color: rgb(56,109,192);
    color: white;
    padding: 10px;
    margin-left: 20px;
    margin-top: 20px;">Add a new post</button></a>

<?php
    }


    $stm->close();
} else {
    echo 'Could not prepare statement!';
}
include('includes/footer.php');
?>