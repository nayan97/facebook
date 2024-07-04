<?php require_once "autoload.php"; ?>

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

		<!-- login process -->

		<?php
			if(isset($_POST['signin'])){
				$login = $_POST['login'];
				$password = $_POST['password'];

				if(empty($login) || empty($password)){
					$msg = validate('Please enter your profile info and password', 'warning');
				}else{
					 $login_user_data = authCheck('users', 'email', $login); 

					if($login_user_data !== false){

						if(password_varify($password, $login_user_data->password)){

							$_SESSION['id'] = $login_user_data->id;
							$_SESSION['name'] = $login_user_data->name;
							$_SESSION['email'] = $login_user_data->email;
							$_SESSION['cell'] = $login_user_data->cell;
							$_SESSION['uname'] = $login_user_data->uname;
							$_SESSION['gender'] = $login_user_data->gender;


							header('Location:profile.php');

						}else{
							$msg = validate('Wrong password', 'warning');
						}
					}else{
						$msg = validate('Invalid username or password', 'warning');
					}
				}
			}
			
	
		
		?>

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Login</h2>

				<?php
				if (isset($msg)) {
					echo $msg;
				}
				?>

				<form action="" autocomplete="off" method="POST">
					<div class="form-group">
						<label for="">Email or Cell</label>
						<input name="login" class="form-control" type="text" value="<?php old('login')?>">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="password" class="form-control" type="password">
					</div>
					<div class="form-group">
						<input name="signin" class="btn btn-primary" type="submit" value="Login">
					</div>
					<div class="form-group">
						<a href="reg.php">create an account</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>