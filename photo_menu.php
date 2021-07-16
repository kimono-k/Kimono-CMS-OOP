<?php include("includes/header.php"); ?>

<?php
require_once("admin/includes/init.php");

if (empty($_GET['id'])) {
    redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);

if (isset($_POST['submit'])) {
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

    $new_comment = Comment::create_comment($photo->id, $author, $body);

    if ($new_comment && $new_comment->save()) {
        redirect("photo_menu.php?id={$photo->id}");
    } else {
        $message = "There are some problems with saving.";
    }

} else {
    $author = "";
    $body = "";
}

$comments = Comment::find_the_comments($photo->id);
?>


<!-- Blog Post Content Column -->
<div class="row">
    <div class="col-lg-12">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?= $photo->title; ?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">Kimono きもの</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="admin/<?= $photo->picture_path(); ?>" alt="Image not loaded">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?= $photo->caption; ?></p>
        <p><?= $photo->description; ?></p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" method="post">

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control">
                </div>

                <div class="form-group">
                    <textarea class="form-control" rows="3" name="body"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->

        <?php foreach ($comments as $comment) { ?>
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        <?= $comment->author; ?>
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    <?= $comment->body; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>