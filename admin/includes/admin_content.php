<?php
$users = User::find_all();
//$found_user = User::find_user_by_id(1);
//$user = User::instantation($found_user);
$photos = Photo::find_all();

# Testing the create method for user
//$user = new User();
//$user->username = "nigelritfeld";
//$user->password = "nigel123";
//$user->first_name = "Nigel";
//$user->last_name = "Ritfeld";
//$user->create();

# Testing the create method for photos
$photo = new Photo();
$photo->title = "Solar";
$photo->size = 20;
$photo->create();

# Testing the update method
//$user = User::find_user_by_id(10);
//$user->username = "Papi";
//$user->password = "rico123";
//$user->first_name = "Rico";
//$user->last_name = "Suave";
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

            <h2>Photos table</h2>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Filename</th>
                    <th>Type</th>
                    <th>Size</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($photos as $photo) { ?>
                    <tr>
                        <!-- Initialize properties from photo class -->
                        <td><?= $photo->photo_id; ?></td>
                        <td><?= $photo->title; ?></td>
                        <td><?= $photo->description; ?></td>
                        <td><?= $photo->filename; ?></td>
                        <td><?= $photo->type; ?></td>
                        <td><?= $photo->size; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <h2>Users table</h2>
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