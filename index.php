<?php include("includes/header.php"); ?>

<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql  = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$photos = Photo::find_by_query($sql);
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

    <div class="row">
        <ul class="pagination">
            <?php if ($paginate->page_total() > 1) {
                if ($paginate->has_next()) { ?>
                    <li class="next"><a href="index.php?page=<?= $paginate->next() ?>">Next</a></li>
                <?php } ?>

                <?php for ($i = 1; $i <= $paginate->page_total(); $i++) {
                    if ($i == $paginate->current_page) { ?>
                        <li class="active"><a href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php } else { ?>
                        <li><a href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php } ?>
                <?php } ?>

                <?php if ($paginate->has_previous()) { ?>
                    <li class="previous"><a href="index.php?page=<?= $paginate->previous() ?>">Previous</a></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>
    <!-- /.row -->

<?php include("includes/footer.php"); ?>