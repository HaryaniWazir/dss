<?php
	include("include/connection.php");

	if (isset($_POST['create'])) {
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$role = $_POST['role'];
		$password = md5($_POST['pass']);
		$con_pass = md5($_POST['con_pass']);

		$error = array();

		if (empty($fname)){
			$error['ac'] = "Enter Firstname";
		}if (empty($lname)) {
			$error['ac'] = "Enter Lastname";
		}if (empty($uname)) {
			$error['ac'] = "Enter Username";
		}if (empty($email)) {
			$error['ac'] = "Enter Email";
		}else if (empty($phone)) {
			$error['ac'] = "Enter Phone Number";
		}else if ($gender == "") {
			$error['ac'] = "Select Your Gender";
		}else if ($role == "") {
			$error['ac'] = "Select Role";
		}else if (empty($password)) {
			$error['ac'] = "Enter Password";
		}else if ($con_pass != $password) { 
			$error['ac'] = "Both Password do not match";
		}

		if (count($error) == 0) {

			$query = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `phone`, `gender`, `role`, `password`, `status`) VALUES ('$fname','$lname','$uname','$email','$phone','$gender','$role','$password','')";

			$res = mysqli_query($connect, $query);

			if ($res) {

				echo "<script>alert('Register Successfull !')
				    window.location.href='userlogin.php'
				    </script>";
			}else{
				echo"<script>alert('failed')</script>";
			}

		}


	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="styleAcc.css">

</head>
<body>



	<?php 

	 ?>

	 <div class="wrapper">
					<h2> Create Account</h2>

					<div class="alert alert-danger">
							  <?php

							    if (isset($error['userId'])) {

								 	$sh = $error['userId'];

								    $show = "<h4 class='alert alert-danger'>$sh</h4>";

								 }else{
								 	$show = "";
								 }

								 echo $show;

								 ?>

							</div>

					<form method="post">
						<div class="input-box">
							<label>First Name</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" pattern="[A-Za-z]{1,10}" placeholder="Enter Firstname" >
						</div>
						<div class="input-box">
							<label>Last Name</label>
							<input type="text" name="lname" class="form-control" autocomplete="off" pattern="[A-Za-z]{1,10}" placeholder="Enter Lastname">
						</div>
						<div class="input-box">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="nursya_02" pattern="[A-Z_a-z]{1,10}[0-9]{1,2}" title="must contain letter or number and letter _ and number">
						</div>
						<div class="input-box">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="example@gmail.com"  id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title=" must contain @ in username etc example@gmail.com">
						</div>
						<div class="input-box">
							<label>Phone No</label>
							<input type="tel" name="phone" class="form-control" autocomplete="off" placeholder="ect 018-467 6789" pattern="[0-9]{3}-[0-9]{3} [0-9]{4}" title="must follow the example ">
						</div>
						<div class="input-box">
							<label>Select Gender</label>
							<br>
							<br>
								<div class="col-sm-10">
	    							<input type="radio" name="gender" value="Male" required="" checked="">Male 
	    							<input type="radio" name="gender" value="Female" required="">Female 
	    						</div>
						</div>
						<br>
						<div class="input-box">
							<label>Select Role</label>
							<select name="role" class="form-control">
								<option value="">Select Role</option>
								<option value="Admin">Admin</option>
								<option value="Doctor">Doctor</option>
								<option value="Registration">Registration Staff</option>
								<option value="Pharmacy">Pharmacy</option>
							</select>
						</div>
						<div class="input-box">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" placeholder="Enter Password">
						</div>	

						<div class="input-box">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" placeholder="Enter Confirm Password">
						</div>		

						<input type="submit" name="create" value="Create Account" class="btn btn-success my-2">
						<button type="reset" class="btn btn-info">Reset</button>

						<br>
						<div class="register-link">
						<p>I already have an account <a href="userlogin.php">Click Here</a></p>	
						</div>
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>