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
$photos = Photo::find_all();
?>

<!-- Admin content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Filename</th>
                        <th>Type</th>
                        <th>Size</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($photos as $photo) { ?>
                        <tr>
                            <!-- Initialize properties from photo class -->
                            <td><?= $photo->photo_id; ?></td>
                            <td><img src="<?= $photo->picture_path(); ?>" alt="Image not loaded" width="150" height="100">
                                <div class="pictures-link">
                                    <a href="delete_photo.php/?id=<?= $photo->photo_id; ?>">Delete</a>
                                    <a href="#">Edit</a>
                                    <a href="#">View</a>
                                </div>
                            </td>
                            <td><?= $photo->title; ?></td>
                            <td><?= $photo->description; ?></td>
                            <td><?= $photo->filename; ?></td>
                            <td><?= $photo->type; ?></td>
                            <td><?= $photo->size; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>