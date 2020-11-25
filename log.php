// LOGIN USER
<?php
require('database.php');
// session_start()
if (isset($_POST['ok'])) {
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    
if (empty($username)) {
array_push($errors, "Username is required");
}
if (empty($password)) {
array_push($errors, "Password is required");
}
if (count($errors) == 0) {
$password = md5($password);
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$results = mysqli_query($conn, $query);
// var_dump($results);
if (mysqli_num_rows($results) == 1) {
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: dashboard1.php');
}else {
array_push($errors, "Wrong username/password combination");
}
}
}?>