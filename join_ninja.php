<?php

	include('config/db_connect.php');

	$email = $cell = $name ='';
	$errors = array('email' => '', 'name' => '', 'cell' => '');

	if(isset($_POST['submit'])){
		
		
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		// check title
		if(empty($_POST['name'])){
			$errors['name'] = 'Your name is required';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'Name must be letters and spaces only';
			}
		}

		
		if(empty($_POST['cell'])){
			$errors['cell'] = 'Phone no. is required';
		} else{
			$cell = $_POST['cell'];
			if(!preg_match('/^(\(\d{2,}\) ((\d{4}-\d{4})|(9\d{4}-\d{4})))|(\d{2})((9\d{8})|(\d{8}))$/', $cell)){
				$errors['cell'] = 'enter valid phone number ';
			}
		}

		if(array_filter($errors)){
			
		} else {
			
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$cell = mysqli_real_escape_string($conn, $_POST['cell']);

			
			$sql = "INSERT INTO ninjas(name,email,Phone) VALUES('$name','$email','$cell')";

			
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: join_preview.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			
		}

	} 

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container ">
		<h4 class="center">Become a NINJA!</h4>
		<form class="White" action="join_ninja.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Your Name</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Phone no.</label>
			<input type="text" name="cell" value="<?php echo htmlspecialchars($cell) ?>">
			<div class="red-text"><?php echo $errors['cell']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>