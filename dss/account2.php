<?php
	include("include/connection.php");

	if (isset($_POST['create'])) {

        $e_firstname = '';
        $e_lastname = '';
        $e_username = '';
        $e_email = '';
        $e_phone = '';
        $e_gender = '';
        $e_role = '';
		$e_password = '';
        $e_con_pass = '';
	
		
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$gender = $_POST['gender'];
		$role = $_POST['role'];
		$password = md5($_POST['pass']);
		$con_pass = md5($_POST['con_pass']);


                                        if ($firstname == "") {

                                            $e_firstname = 'FirstName is Required';
                                        }
                                        if ($lastname == "") {

                                            $e_lastname = 'LastName is Required';
                                        }
                                        if ($username == "") {

                                            $e_username = 'UserName is Required';
                                        }
                                        if ($email == "") {

                                            $e_email= 'Email is Required';
                                        }

                                        if ($phone == "") {

                                            $e_phone = 'Phone Number is Required';
                                        }
                                        if ($password != $rpassword) {

                                            $pass_error = 'Password Does Not Match';
                                        } else {
                                            $pass_error = '';
                                        }
                                        if ($password == "") {

                                            $e_password = 'Password is Required';
                                        }
                                        if ($rpassword == "") {

                                            $e_rpassword = 'Re Type Password';
                                        }

if ($firstname != "" && $password == $rpassword && $lastname != "" && $eaddress != "" && $cn != "" && $address != "" && preg_match($pattern,$eaddress) ) {
                                            mysqli_query($connect, `users`(`firstname`, `lastname`, `username`, `email`, `phone`, `gender`, `role`, `password`, `status`) VALUES ('$fname','$lname','$username','$email','$phone','$gender','$role','$password','')";

			$res = mysqli_query($connect, $query);

			if ($res) {

				header("Location: userlogin.php");
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
</head>
<body style="background-image: url(img/clinic_bg.jpeg); background-repeat: no-repeat; background-size: cover; ">


	<?php 
		include("include/header.php");

	 ?>

	 <div class="cointainer-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 my-2 jumbotron" style=" background-color: white;">
					<h5 class="text-center text-info my-2"> Create Account</h5>

					<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="lname" class="form-control" autocomplete="off" placeholder="Enter Lastname">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="nur_02">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" autocomplete="off" placeholder="example@gmail.com">
						</div>
						<div class="form-group">
							<label>Phone No</label>
							<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="ect 018-467 6789" pattern="[0-9]{3}-[0-9]{3} [0-9]{4}">
						</div>
						<div class="form-group">
							<label>Select Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Select Role</label>
							<select name="role" class="form-control">
								<option value="">Select Role</option>
								<option value="Admin">Admin</option>
								<option value="Doctor">Doctor</option>
								<option value="Registration">Registration Staff</option>
								<option value="Pharmacy">Pharmacy</option>
							</select>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>	

						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
						</div>		

						<input type="submit" name="create" value="Create Account" class="btn btn-info">
						<button type="reset" class="btn btn-info">Reset</button>



						<p>I already have an account <a href="userlogin.php">Click Here</a></p>		
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>