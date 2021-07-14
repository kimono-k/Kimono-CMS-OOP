//$found_user = User::find_by_id(1);
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
//$photo = new Photo();
//$photo->title = "Solar";
//$photo->size = 20;
//$photo->create();

# Testing the update method
//$user = User::find_by_id(10);
//$user->username = "Papi";
//$user->password = "rico123";
//$user->first_name = "Rico";
//$user->last_name = "Suave";
//$user->update();

# Testing the delete method
//$user = User::find_by_id(x);
//
//if (!empty($user)) {
//    $user->delete();
//} else {
//    echo "You can't delete a record that doesn't exist";
//}

# Testing the save method when the id exists
//$user = User::find_by_id(1);
////echo "<br>";
////echo $user->username;
//$user->username = "Jongjing";
//$user->save();

# Check photo
//$photo = Photo::find_by_id(15);
//echo "<br>";
//echo $photo->filename;

# Testing the save method when the id doesn't exist
//$user = new User();
//$user->username = "Bongling";
//$user->save();