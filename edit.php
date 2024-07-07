<?php 
require_once "autoload.php";

// check user login

if( userLogin() == false){

header("Location:index.php");

}else{
	if (isset($_GET['user_id'])){

		$pro_data = showLoginUser('users', $_GET['user_id']);
	}else{

		$pro_data = showLoginUser('users', $_SESSION['id']);
	}
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

	<?php


// reg form ISSSET

if(isset($_POST['update'])){
	

	$name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$uname = $_POST['uname'];
	$edu = $_POST['edu'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$user_id = $pro_data-> id;
	$updated_at = date('Y-m-d H:m:s');

 
	//   validation

	  if(empty($name) || empty($email) || empty($cell) || empty($uname)){
		$msg = validate('All fildes are required');

	  }else if(emailCheck($email) == false){
		$msg = validate('invalid email');
		    
	  }else if(cellCheck($cell) == false){
		$msg = validate('invalid cell number');

	  }else{
		update("UPDATE users SET name='$name', email='$email', cell='$cell', uname='$uname',gender='$gender', age='$age', edu='$edu', updated_at='{$updated_at}' WHERE id='{$user_id}'");
		setMsg('success','Successfully updated');
		header('Location:edit.php');
	
	
	  }
	
	
}
showMsg('success')
?>



		<div class="card shadow">
			<div class="card-body">
			<?php
				if (isset($msg)) {
					echo $msg;
				}
				?>

			
            <form action="" method="POST">
					<div class="form-group">
                        <label for="">Name</label>
						<input value="<?php echo $pro_data -> name ?>" name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
                        <label for="">Email</label>
                        <input value="<?php echo $pro_data -> email ?>" name="email" class="form-control" type="email">
                    </div>
					<div class="form-group">
                        <label for="">cell</label>
                        <input value="<?php echo $pro_data -> cell ?>" name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
                        <label for="">User Name</label>
                        <input value="<?php echo $pro_data -> uname ?>" name="uname" class="form-control" type="text">
					</div>
                    <div class="form-group">
                        <label for="">Age</label>
                        <input value="<?php echo $pro_data -> age ?>" name="age" class="form-control" type="text">
					</div>
                    <div class="form-group">
                        <label for="">Education</label>
                        <input value="<?php echo $pro_data -> edu ?>" name="edu" class="form-control" type="text">
					</div>
                    <div class="form-group">
						<label for="">Gender</label><br>
						<input name="gender" <?php echo ($pro_data->gender == 'Male') ? 'checked' : ''; ?> value="Male" class="" type="radio" id="Male"><label for="Male">Male</label>
						<input name="gender" <?php echo ($pro_data->gender == 'Female') ? 'checked' : ''; ?>  value="Female" class="" type="radio" id="Female"><label for="Female">Female</label>
					</div>
                    <div class="form-group">
                        <input value="Update" name="update" class="btn btn-sm btn-primary" type="submit">
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