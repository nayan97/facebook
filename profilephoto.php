<?php 
require_once "autoload.php";

// check user login

if( userLogin() == false){

header("Location:index.php");

}


?>

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
						<li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Friends</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Edit Profile</a></li>
						<li class="nav-item"><a class="nav-link" href="profilephoto.php">Edit Photo</a></li>
						<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<section class="user-profile">

		<?php if ( isset($_SESSION['photo']) !== NULL) : ?>
			<img class="shadow" src="media/users/<?php echo $_SESSION['photo']; ?>" alt="">
		<?php elseif ($_SESSION['gender'] == 'Male' ):?>
			<img class="shadow" src="assets/media/img/pp_photo/pp-1.webp" alt="">
		<?php elseif ($_SESSION['gender'] == 'Female' ):?>
			<img class="shadow" src="assets/media/img/pp_photo/pp-2.jpg" alt="">
		<?php endif;?>


		<h3 class="text-center display-4 py-3"><?php echo $_SESSION['name']?></h3>


		<?php 
		

		if(isset($_POST['change'])){
			$user_id = $_SESSION['id'];
			$file = move($_FILES['photo'], 'media/users/');

			update("UPDATE users SET photo='$file' WHERE id='$user_id'");

			header("Location:profile.php");

		}
		
		
		?>


		<div class="card shadow">
			<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="file" name="photo">
					<input type="submit" value="Upload" name="change">
				</form>
		
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