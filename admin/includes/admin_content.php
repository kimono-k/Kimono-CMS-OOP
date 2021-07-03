<?php
$users = User::find_all_users();
$found_user = User::find_user_by_id(1);
$user = User::instantation($found_user);

# Testing the create method
//$user = new User();
//$user->username = "Moonbyul";
//$user->password = "solar123";
//$user->first_name = "Solar";
//$user->last_name = "wow";
//$user->create();

# Testing the insert method
//$user = User::find_user_by_id(4);
//$user->last_name = "Rico Suave bitches!";
//$user->update();

# Testing the delete method
//$user = User::find_user_by_id(x);
//
//if (!empty($user)) {
//    $user->delete();
//} else {
//    echo "You can't delete a record that doesn't exist";
//}

# Testing the save method when the id exists
//$user = User::find_user_by_id(3);
//$user->username = "Jongjing";
//$user->save();

# Testing the save method when the id doesn't exist
//$user = new User();
//$user->username = "Bongling";
//$user->save();
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
                        <td><?= $user->username; ?></td>
                        <td><?= $user->password; ?></td>
                        <td><?= $user->first_name; ?></td>
                        <td><?= $user->last_name; ?></td>
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