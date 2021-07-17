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
$comments = Comment::find_all();
?>

    <!-- Admin content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Comments</h1>
                    <p class="bg-success"><?= $message; ?></p>

                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Author</th>
                            <th>Body</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($comments as $comment) { ?>
                            <tr>
                                <!-- Initialize properties from User class -->
                                <td><?= $comment->id; ?></td>
                                <td><?= $comment->author; ?>
                                    <div class="actions-link">
                                        <a href="delete_comment.php?id=<?= $comment->id; ?>">Delete</a>
                                    </div>
                                </td>
                                <td><?= $comment->body; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>