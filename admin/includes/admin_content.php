<?php
$result_set = User::find_all_users();
$found_user = User::find_user_by_id(1);
$user = new User();
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
                <?php while ($row = mysqli_fetch_array($result_set)) { ?>
                    <tr>
                        <!-- Initialize properties from user class -->
                        <td><?= $user->id = $row['id']; ?></td>
                        <td><?= $user->username = $row['username']; ?></td>
                        <td><?= $user->password = $row['password']; ?></td>
                        <td><?= $user->first_name = $row['first_name']; ?></td>
                        <td><?= $user->last_name = $row['last_name']; ?></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td><?= $user->id = $found_user['id']; ?></td>
                        <td><?= $user->username = $found_user['username']; ?></td>
                        <td><?= $user->password = $found_user['password']; ?></td>
                        <td><?= $user->first_name = $found_user['first_name']; ?></td>
                        <td><?= $user->last_name = $found_user['last_name']; ?></td>
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