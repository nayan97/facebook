<?php 
require_once "autoload.php";

// check user login

if( userLogin() == false){

header("Location:index.php");

}else{
	$pro_data = showLoginUser('users', $_SESSION['id']);
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

</head>
<body>     
	<!-- nav start here -->

	    <?php require_once "templetes/menu.php" ?>

	<!-- nav end here -->

	<section class="user-profile">

		<?php if ( isset($pro_data -> photo)) : ?>
			<img class="shadow" src="media/users/<?php echo $pro_data-> photo; ?>" alt="">
		<?php elseif ($pro_data -> gender == 'Male' ):?>
			<img class="shadow" src="assets/media/img/pp_photo/pp-1.webp" alt="">
		<?php elseif ($pro_data-> gender== 'Female' ):?>
			<img class="shadow" src="assets/media/img/pp_photo/pp-2.jpg" alt="">
		<?php endif;?>


		<h3 class="text-center display-4 py-3"><?php echo $_SESSION['name']?></h3>

		<div class="card shadow">
			<div class="card-body">
				<table class="table table-striped">
					<tr>
						<td>Name</td>
						<td><?php echo $pro_data -> name ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $pro_data -> email ?></td>
					</tr><tr>
						<td>Cell</td> 
						<td><?php echo $pro_data -> cell ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $pro_data -> gender ?></td>
					</tr>
					<tr>
						<td>User Name</td>
						<td><?php echo $pro_data -> uname ?></td>
					</tr>
				</table>
		
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