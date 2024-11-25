<?php
session_start();
error_reporting(0);

include("include/connection.php");

if (isset($_POST['login'])) {

	$username = $_POST['uname'];
	$password = md5($_POST['pass']);

	$error = array();

	if (empty($username)) {
		$message[] = 'Please Enter Username';
	}
    else if(empty($password)) {
		$message[] = 'Please Enter Password';
	}

	if (count($error)==0) {

		$query = "SELECT * FROM users WHERE username='$username'  AND password='$password'";

		$result = mysqli_query($connect,$query);


		if ( mysqli_num_rows ($result) == 1) {

			$row = mysqli_fetch_assoc($result);
			
			$role = $row["role"];

			$userId = $row["id"];

			$_SESSION['userId'] = $userId;

			$_SESSION['loggedin'] = true;

			if ( $role == "Admin"){

				header("Location:admin/index.php");

				exit();

			}else if ( $role == "Doctor"){

				header("Location:doctor/index.php");

				exit();

			}else if ( $role == "Registration"){

				header("Location:registration/index.php");

				exit();

			}else if ( $role == "Pharmacy"){

				header("Location:pharmacy/index.php");
			
				exit();

			}else{

				echo "<script>
						alert('Invalid Username or Password')
						window.location.href='userlogin.php';
					</script>";

			}
		}

    }

   }
	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Hospital DSS | User Login Page</title>

	<meta charset="utf-8">
    <meta http-equipv= " X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

	<?php


	?>
	<div class="wrapper">
		<form action="">
			<h2>User Login</h2>

			<div class="input-box">
				<label>Username</label>
				<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
				<i class='bx bxs-user'></i>

			</div>
			<div class="input-box">
				<label>Password</label>
				<input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
				<i class='bx bxs-lock-alt' ></i>
			</div>

			<div class="remember-forgot">
				<label><input type="checkbox"> Remember me</label>
				<a href="#">Forgot Password?</a>
			</div>

				<input type="submit" name="login" class="btn btn-success my-2" value="Login">
				<br>
				<button type="reset" class="btn btn-info">Reset</button>	

		</form>
	</div>

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	</div>


</body>
</html>


