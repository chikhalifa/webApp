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
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['Username'])){
		// $username = stripslashes($_REQUEST['username']); // removes backslashes
		// $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		// $email = stripslashes($_REQUEST['email']);
		// $email = mysqli_real_escape_string($con,$email);
		// $password = stripslashes($_REQUEST['password']);
        // $password = mysqli_real_escape_string($con,$password);
        // receive all input values from the form
        $username = stripslashes($_REQUEST['Username']);
        $username = mysqli_real_escape_string($conn, $username);
        $fullname = stripslashes($_REQUEST['fullname']);
        $fullname = mysqli_real_escape_string($conn, $fullname);
        $email = stripslashes($_REQUEST['Email']);
        $email = mysqli_real_escape_string($conn, $email);
        $mobile = stripslashes($_REQUEST['mobile']);
        $mobile = mysqli_real_escape_string($conn, $mobile);
        $Address = stripslashes($_REQUEST['Address']);
        $Address = mysqli_real_escape_string($conn, $Address);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // $password2 = mysqli_real_escape_string($conn, $_REQUEST['password2']);





        $mentor_val = stripslashes($_REQUEST['mentorType']);
        // $mentor_val = isset($_REQUEST['mentorType']);
        // var_dump($mentor_val);
        $mentor_gen_val;
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

		$trn_date = date("Y-m-d H:i:s"); 
        $query = "INSERT into `users` (full_name,username,email,mobile,address, password, account_type,role, created_at) VALUES ('$fullname','$username', '$email','$mobile','$Address', '".md5($password)."','$mentorType','$roleType','$trn_date')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
            header('location: login.php');
           
        }
    }else{
?>

<div class="list">
    <div class="form-header">
    <h4 class="text-center">Registration Form</h4>      
      </div>

    <div class ="jumbotron">
            <div class="flex-container flex-startrow">
                
                        <form action="" method="post">
                        
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                            
                                <input type = "text"class="form-control " name = "fullname" placeholder="Type Your Full Name"  required> 
                            </div>
                            </div>
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">UserName <sup class="text-danger">*</sup></label>
                            
                                <input type = "text"class="form-control " name = "Username" placeholder="Type Your Username"  required> 
                            </div>
                            </div>
                            
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">Phone Number <sup class="text-danger">*</sup></label>
                            
                                <input type = "text"class="form-control " name = "mobile" placeholder="Type Your Phone Number"  required> 
                            </div>
                            </div>
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">Address</label>
                            
                                <input type = "text"class="form-control "  name = "Address" placeholder="Type Your Address"  required> 
                            </div>
                            </div>
                            <div class="col-mb-6">
                        <div class="form-group">
                            <label for="securityRequestType">Registration Type <sup class="text-danger">*</sup>
                            </label> 
                            <select class="form-control" data-toggle="select2" id="mentorType" name="mentorType">
                                <option value="" disabled selected hidden>Select a Registration type</option>
                                <option value="Mentor">Mentor</option>
                                <option value="Mentee">Mentee </option>
                                
                            </select>
                        </div>
                    </div>
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">Email <sup class="text-danger">*</sup></label>
                            
                                <input type = "text"class="form-control " name = "Email" placeholder="Type Your email"  > 
                            </div>
                            </div>
                            <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">Password <sup class="text-danger">*</sup></label>
                            
                                <input type = "password"class="form-control "  name = "password" placeholder="Type Your password"  required> 
                            </div>
                            </div>
                            <!-- <div class="input-group-sm mb-6">
                            <div class="form-group">
                                <label for="name">Confirm Password <sup class="text-danger">*</sup></label>
                            
                                <input type = "text"class="form-control "id ="password2" name = "password2" placeholder="Confirm Your  Password "  required=""> 
                            </div>
                            </div> -->
                            <div class="col-12 mb-2 text-center">
                            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light"  name="reg_user">Signup</button>

                            </div>
                            
                        </form>
                        <div class="col-12 mb-2 text-center">
                     <a href="login.php">Already Have An Account?</a>
      
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