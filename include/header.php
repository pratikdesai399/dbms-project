<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<title></title>
</head>
<body>


	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5 class="text-white">HOSPITAL MANAGEMENT SYSTEM</h5>

		<div class="mr-auto"></div>

		<ul class="navbar-nav">
			<?php
			if(isset($_SESSION['admin'])){
				$user = $_SESSION['admin'];
					echo '
						<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">Log Out</a></li>
					';
			}
			else if(isset($_SESSION['doctor'])){
				$user = $_SESSION['doctor'];
					echo '
						<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">Log Out</a></li>
					';
			}else if (isset($_SESSION['patient'])) {
				$user = $_SESSION['patient'];
					echo '
						<li class="nav-item"><a href="" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">Log Out</a></li>
					';
			}
			else{
				echo '
					<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
					<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">ADMIN</a></li>
					<li class="nav-item"><a href="./	doctorlogin.php" class="nav-link text-white">DOCTOR</a></li>
					<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">PATIENT</a></li>';
			}
			?>
		</ul>
	</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
</body>
</html>