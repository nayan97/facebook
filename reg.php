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

</head>
<body>

<?php


// reg form ISSSET

if(isset($_POST['add_product'])){
	

	$name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$uname = $_POST['uname'];
	$password = $_POST['password'];
	$cpass = $_POST['cpass'];
	$gender = NULL;

	if(isset($_POST['gender'])){
		$gender = $_POST['gender'];
	}
	// MAKE PASSWORD HASH

		$hash_pass = makeHash($password);
	 
	//   validation

	  if(empty($name) || empty($email) || empty($cell) || empty($uname) || empty($password) || empty($gender)){
		$msg = validate('All fildes are required');

	  }else if(emailCheck($email) == false){
		$msg = validate('invalid email');
		    
	  }else if(cellCheck($cell) == false){
		$msg = validate('invalid cell number');

	  }else if(passCheck($password, $cpass) == false){
		$msg = validate('password not match');
	  
	  }else if(checkData('users', 'email', $email) == false){
		$msg = validate('Your email address is allready exists', 'warning');

	  }else if(checkData('users', 'cell', $cell) == false){
		$msg = validate('Your phone number is allready exists', 'warning');

	  }else if(checkData('users', 'uname', $uname) == false){
		$msg = validate('Your user name is allready taken', 'warning');

	  }else{
		create("INSERT INTO users (name, email, cell, uname, password, gender) VALUES ('$name', '$email', '$cell', '$uname', '$hash_pass', '$gender')");
		$msg = validate('Your account created successfully', 'success');
		formClean();
	
	  }

	
}

?>

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Create an Account</h2>
				<?php
				if (isset($msg)) {
					echo $msg;
				}
				?>

				<form action="" autocomplete="off" method="POST">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text" value="<?php old('name'); ?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text" value="<?php old('email'); ?>">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text" value="<?php old('cell'); ?>">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text" value="<?php old('uname'); ?>">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="password" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input name="cpass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Gender</label><br>
						<input name="gender" value="Male" class="" type="radio" id="Male"><label for="Male">Male</label>
						<input name="gender" value="Female" class="" type="radio" id="Female"><label for="Female">Female</label>
					</div>
					<div class="form-group">
						<input name="add_product" class="btn btn-primary" type="submit" value="Sign UP">
					</div>
					<div class="form-group">
						<a href="index.php">You have an account?</a>
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