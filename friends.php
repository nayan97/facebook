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


	<section class="users">
		<div class="container">
			<div class="row">

			<?php 
				$all_users = all('users');

				while ( $user = $all_users -> fetch_object()) :
			
			
			
			?>
				<?php if ($user->id != $_SESSION['id']) : ?>
					<div class="col-md-3">
						<div class="user-item">
							<div class="card shadow-sm">
								<div class="card-body">
									<img src="media/users/<?php echo $user -> photo ?>" alt="">
									<h4><?php echo $user -> name ?></h4>
									<a href="profile.php?user_id=<?php echo $user->id;?>" class="btn btn-primary btn-sm">View Profile</a>
								</div>
							</div>
						</div>
					</div> 
				<?php endif; ?>	
			<?php endWhile ?>	
				
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