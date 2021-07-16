<?php include("includes/header.php"); ?>

<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$photos = Photo::find_all();
?>

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <div class="thumbnails row">
            <?php foreach ($photos as $photo) { ?>
            <div class="col-xs-6 col-md-3">
                <a class="thumbnail" href="photo_menu.php?id=<?= $photo->id; ?>">
                    <img class="home_page_photo img-responsive" src="admin/<?= $photo->picture_path(); ?>" alt="Image couldn't be loaded">
                </a>
            </div>
        <?php } ?>
    </div>
</div>
    <!-- /.row -->

<?php include("includes/footer.php"); ?>