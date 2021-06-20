<?php
$user = new User();
$result_set = $user->find_all_users();
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>First Name</th>
                    </tr>
                </thead>

                <tbody>
                <?php while ($row = mysqli_fetch_array($result_set)) { ?>
                    <tr>
                        <td><?= $row['username']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->