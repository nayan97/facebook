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
<?php if (isset($_POST['pwc'])){

	$old_pass = $_POST['old'];
	$new_pass = $_POST['new'];
	$connew_pass = $_POST['connew'];

  	$hash_pass = makeHash($new_pass);

	if(empty($old_pass) || empty($new_pass) || empty($connew_pass)){
		echo $msg = validate('all fields are required');
	} else if($new_pass != $connew_pass){
		echo $msg = validate('password not match');
	}else if(password_verify($old_pass, $pro_data->password) == false){
		echo $msg = validate('Invalid Old Password');
	}else{
		update("UPDATE users SET password='$hash_pass' WHERE id='$pro_data->id'");
		session_destroy();

		header("Location:index.php");
	}
}



?>



		<div class="card shadow">
			<div class="card-body">

		
			

				<form action="" method="POST">
					<div class="form-group">
						<input name="old" class="form-control" type="password" placeholder="Old Password">
					</div>
					<div class="form-group">
						<input name="new" class="form-control" type="password" placeholder="New Password">
					</div>
					<div class="form-group">
						<input name="connew" class="form-control" type="password" placeholder="confirm Password">
					</div>
					<div class="form-group">
						<input name="pwc" class="btn btn-primary" type="submit" value="Update">
					</div>
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