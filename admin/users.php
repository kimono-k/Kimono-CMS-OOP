<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in()) { redirect("login.php"); } ?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Top navigation -->
        <?php include("includes/top_nav.php"); ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>

        <!-- /.navbar-collapse -->
    </nav>

<?php
$users = User::find_all();
?>

    <!-- Admin content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Users</h1>
                    <a href="add_user.php" class="btn btn-primary">Add User</a>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <!-- Initialize properties from User class -->
                                <td><?= $user->id; ?></td>
                                <td><img class="admin-user-thumbnail user_image" src="<?= $user->image_path_and_placeholder(); ?>" alt="Image not loaded"></td>
                                <td><?= $user->username; ?>
                                    <div class="actions-link">
                                        <a href="delete_user.php?id=<?= $user->id; ?>">Delete</a>
                                        <a href="edit_user.php?id=<?= $user->id; ?>">Edit</a>
                                    </div>
                                </td>
                                <td><?= $user->first_name; ?></td>
                                <td><?= $user->last_name; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>