<?php
include("includes/header.php");
include("includes/photo_library_modal.php");
?>

<?php if (!$session->is_signed_in()) {
    redirect("login.php");
} ?>

<?php

if (empty($_GET['id'])) {
    redirect("users.php");
}

$user = User::find_by_id($_GET['id']);

global $form_submission_error;

if (isset($_POST['update'])) {
    if ($user) {
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->password = $_POST['password'];

        # Form validation needs to added again check history of commits on GitHub
        if (empty($_FILES['user_image'])) {
            $user->save();
            redirect("users.php");
            $session->message("The user has been updated");
        } else {
            $user->set_file($_FILES['user_image']);
            $user->upload_photo();
            $user->save();
            $session->message("The user has been updated");
            redirect("users.php");
        }
    }
}
?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Top navigation -->
        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>

        <!-- /.navbar-collapse -->
    </nav>

    <!-- Admin content -->
    <div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->

        <strong><?= isset($form_submission_error) ? $form_submission_error : $form_submission_error = ""; ?></strong>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit User</h1>
            </div>

            <div class="col-md-6 user_image_box">
                <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive edit_user_image" src="<?= $user->image_path_and_placeholder(); ?>" alt="Image not found"></a>
            </div>

            <form action="" method="post" enctype="multipart/form-data">

                <div class="col-md-6">

                    <div class="form-group">
                        <input type="file" name="user_image">
                    </div>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" value="<?= $user->username; ?>">
                    </div>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" autocomplete="off" value="<?= $user->first_name; ?>">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" autocomplete="off" value="<?= $user->last_name; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $user->password; ?>">
                    </div>

                    <div class="form-group">

                        <a id="user-id" class="btn btn-danger" href="delete_user.php?id=<?= $user->id; ?>">Delete</a>
                        
                        <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
                    </div>
                </div>


            </form>

        </div>
    </div>

<?php include("includes/footer.php"); ?>