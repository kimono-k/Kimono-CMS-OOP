<?php
$users = User::find_all_users();
$found_user = User::find_user_by_id(1);
//$user = User::instantation($found_user);
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
                        <th>#</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <!-- Initialize properties from user class -->
                        <td><?= $user->id; ?></td>
                    </tr>
                <?php } ?>

                <tr>
                    <!-- Initialize properties from user class -->
                    <!-- <td> $user->username </td> -->
                </tr>
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