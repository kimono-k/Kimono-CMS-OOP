<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in()) {
    redirect("login.php");
} ?>

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
                    <h1 class="page-header">
                        Edit Photo
                        <small>Subheading</small>
                    </h1>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" name="caption" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="caption">Alternate Text</label>
                        <input type="text" name="alternate_text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="caption">Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>

<?php include("includes/footer.php"); ?>