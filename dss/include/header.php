<!DOCTYPE html>
<?php 
	include 'connection.php';
 ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5>Dental Clinic Management System</h5>

		<div class="mr-auto"></div>

		<ul class="navbar-nav">
			<?php

			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

			$loggedin = true;

			 $userId = $_SESSION['userId'];

			 $query =  " SELECT * FROM users WHERE id='$userId'";

			 $result = mysqli_query($connect,$query);

			 $row = mysqli_fetch_assoc($result);

			 $role = $row["role"];

			 $username = $row["username"];

			  if (isset($_SESSION['userId'])) {

			  	$user = $_SESSION['userId'];
			  		echo '
			<li class="nav-item"><a href="admin/index.php" class="nav-link text-white">'.$username.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>
			  		';
			  }else if(isset($_SESSION['userId'])){
			  		$user = $_SESSION['userId'];
			  	   echo' 
			  	<li class="nav-item"><a href="doctor/index.php" class="nav-link text-white">'.$username.' </a></li>
			  	<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>';

			  }else if(isset($_SESSION['patient'])) {
			  	
			  		$user = $_SESSION['patient'];
			  	   echo' 
			  	<li class="nav-item"><a href="patient/index.php" class="nav-link text-white">'.$username.' <i class="fa fa-id-card" aria-hidden="true"></i></a></li>
			  	<li class="nav-item"><a href="../patient/logout.php" class="nav-link text-white">logout</a></li>';

			  }else if(isset($_SESSION['userId'])) {
			  	
			  		$user = $_SESSION['userId'];
			  	   echo' 
			  	<li class="nav-item"><a href="registration/index.php" class="nav-link text-white">'.$username.'<i class="fa fa-id-card-o" aria-hidden="true"></i></a></li>
			  	<li class="nav-item"><a href="registration/logout.php" class="nav-link text-white">logout</a></li>';

			   }else if(isset($_SESSION['userId'])) {
			  	
			  		$user = $_SESSION['userId'];
			  	   echo' 
			  	<li class="nav-item"><a href="pharmacy/index.php" class="nav-link text-white">'.$username.'<i class="fa fa-id-card-o" aria-hidden="true"></i></a></li>
			  	<li class="nav-item"><a href="patient/logout.php" class="nav-link text-white">logout</a></li>';
			  }
			}

			else {
				$loggedin =false;
				$userId = 0;

				echo '
			  	<li class="nav-item"><a href="index.php" class="nav-link text-white na">Home<i class="fa fa-home fa-3x my-4" style="color: white;"></i></a></li>
			  	<li class="nav-item"><a href="userlogin.php" class="nav-link text-white na">User Login<i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
			  		</a></li>
			  	';
			}


			  

			 ?>

		</ul>
		
	</nav>


</body>
</html>