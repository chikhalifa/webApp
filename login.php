<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
    <link href="assets/bootstrap-creative.css" rel="stylesheet" type="text/css" />
    <link href="assets/main.css"  type="text/css" rel="stylesheet" />
<!-- Optional theme -->
<link href="assets/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
</head>
<body>

<?php
	require('database.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['ok'])){ // This is the name of the submit login button
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($conn,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        // var_dump($rows);
        if($rows==1){
            $_SESSION['username'] = $username;
                $_SESSION['username'] = $username;
            $roletype_query = "SELECT 'role'  FROM `users`  WHERE username='$username'";
        // $roletype_result = mysqli_query($conn,$roletype_query) or die(mysql_error());
        $result = $conn->query($roletype_query);
        $row2 = $result->fetch_assoc()
        var_dump($row2);
        die();
            //echo "I am Here......";
			header("Location: dashboard1.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>

<div class="list">
    <div class="form-header">
    <h4 class="text-center">Login Form</h4>      
      </div>

    <div class ="jumbotron">
            <div class="flex-container flex-startrow">
                
                        <form action="" method="post">
                        <!-- <?php include('error.php'); ?> -->
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">UserName <sup class="text-danger">*</sup></label>
                            
                                <input type = "text"class="form-control "id ="username" name = "username" placeholder="Type Your Username"  required=""> 
                            </div>
                            </div>
                            
                          
                        
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">Password <sup class="text-danger">*</sup></label>
                            
                                <input type = "password"class="form-control " id="password" name = "password" placeholder="Type Your Password"  required=""> 
                            </div>
                            </div>
                           
                            <div class="col-12 mb-2 text-center">
                            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light" id ="ok" name="ok">Login</button>

                            </div>
                            
                        </form>
                        <div class="col-12 mb-2 text-center">
                     <a href="index.php">Don't Have An Account?</a>
      
       </div>
            </div>
          
    </div>
</div>
<?php } ?>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
    

    
 <script src="assets/bootstrap.min.js"></script>
    <script src="assets/bootstrap-table.min.js"></script>
    <script type="text/javascript" src="assets/jquery.min.js"></script>
    <script type="text/javascript" src="assets/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

     
</body>
	
</html>     