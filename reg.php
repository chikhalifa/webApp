// REGISTER USER
<?php
 require('database.php') 
if (isset($_POST['reg_user'])) {

// receive all input values from the form

$username = mysqli_real_escape_string($conn, $_POST['Username']);
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$Address = mysqli_real_escape_string($conn, $_POST['Address']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password2 = mysqli_real_escape_string($conn, $_POST['password2']);

$mentor_val = isset($_POST['mentorType']);
var_dump($mentor_val);
static $mentor_gen_val;
$role_type;
if($mentor_val === "Mentor"){
    $mentor_gen_val = "Mentor";
    $role_val=1;
    $mentorType = mysqli_real_escape_string($conn,$mentor_gen_val);
    $roleType = mysqli_real_escape_string($conn,$role_val);
}else if($mentor_val === "Mentee"){
    $mentor_gen_val = "Mentee";
    $role_val=2;
    $mentorType = mysqli_real_escape_string($conn,$mentor_gen_val);
    $roleType = mysqli_real_escape_string($conn,$role_val);
}

// form validation: ensure that the form is correctly filled ...

// by adding (array_push()) corresponding error unto $errors array

if (empty($username)) { array_push($errors, "Username is required"); }

if (empty($email)) { array_push($errors, "Email is required"); }

if (empty($password_1)) { array_push($errors, "Password is required"); }

if ($password != $password2) {

array_push($errors, "The two passwords do not match");

}

// first check the database to make sure

// a user does not already exist with the same username and/or email

$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

$result = mysqli_query($conn, $user_check_query);

$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists

if ($user['username'] === $username) {

array_push($errors, "Username already exists");

}

if ($user['email'] === $email) {

array_push($errors, "email already exists");

}

}
// ins
// Finally, register user if there are no errors in the form
$trn_date = date("Y-m-d H:i:s");
if (count($errors) == 0) {

$password = md5($password);//encrypt the password before saving in the database

echo $password ;


// $sql = "INSERT INTO tutorials_tbl ".
// "(tutorial_title,tutorial_author, submission_date) "."VALUES ".
// "('$tutorial_title','$tutorial_author','$submission_date')";



$query = "INSERT INTO `users`(full_name,username, email,mobile,address, password,account_type,role,created_at)".

"VALUES"."('$fullname','$username', '$email','$mobile','$address', '$password','$mentorType','$roleType','$trn_date')";
$result = mysqli_query($conn,$query);
// mysqli_query($conn, $query);
if($result){
    echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
}

$_SESSION['username'] = $username;

$_SESSION['success'] = "You are now logged in";

header('location: login.php');

}

}
?>

// ...