<?php require_once "autoload.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<style>
		* {
			font-family: 'Poppins', sans-serif;
}
		.profile-menu {
			background-color: #fff !important;
			padding: 10px 0;
		}
		.user-profile {
			width: 680px;
			margin:50px auto 100px;
		}
		.user-profile img {
			width: 250px;
			height: 250px;
			display: block;
			margin: auto;
			border: 10px solid #fff;
			border-radius: 50%;
		}
	</style>
</head>
<body>     
	
	<nav class="profile-menu shadow">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-1">
					<ul class="nav nav-tab justify-content-center d-flex">
						<li class="nav-item"><a class="nav-link" href="#">My Profile</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Friends</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Edit Profile</a></li>
						<li class="nav-item"><a class="nav-link" href="#"></a></li>
						<li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<section class="user-profile">
		<img class="shadow" src="assets/media/img/pp_photo/pp-1.jpg" alt="">
		<h3 class="text-center display-4 py-3"><?php echo $_SESSION['name']?></h3>

		<div class="card shadow">
			<div class="card-body">
				<table class="table table-striped">
					<tr>
						<td>Name</td>
						<td><?php echo $_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $_SESSION['email']?></td>
					</tr><tr>
						<td>Cell</td>
						<td><?php echo $_SESSION['cell']?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $_SESSION['gender']?></td>
					</tr>
					<tr>
						<td>User Name</td>
						<td><?php echo $_SESSION['uname']?></td>
					</tr>
		
			</div>
		</div>
	</section>
	
	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>