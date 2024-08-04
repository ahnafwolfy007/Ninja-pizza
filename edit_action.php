<?php

	include('config/db_connect.php');
	
	$email = $title = $ingredients = '';
	$errors = array('email' => '', 'title' => '', 'ingredients' => '');
	

	
	if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM pizza WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $pizzass = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    
}

	if(isset($_POST['submit_edit'])){
		
		
		if(empty($_POST['edit_email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['edit_email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		
		if(empty($_POST['edit_title'])){
			$errors['title'] = 'A title is required';
		} else{
			$title = $_POST['edit_title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}

		
		if(empty($_POST['edit_ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required';
		} else{
			$ingredients = $_POST['edit_ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}

		if(array_filter($errors)){
			
		} else {
			
			$email = mysqli_real_escape_string($conn, $_POST['edit_email']);
			$title = mysqli_real_escape_string($conn, $_POST['edit_title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['edit_ingredients']);



			

			if (isset($_POST['id_to_edit'])){

			$id_to_edit = mysqli_real_escape_string($conn,$_POST['id_to_edit']);
			
			$sql = "UPDATE pizza  SET title='$title', email='$email', ingredients='$ingredients' WHERE id =  $id_to_edit";

			
				if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
				} else {
				echo 'query error: '. mysqli_error($conn);
			}

			}

			}
			

			
		}

	

?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

<section class="container grey-text">
		<h4 class="center">Edit Pizza</h4>
		<form class="white" action="edit_action.php" method="POST">
			<label>Edit Your Email</label>
			<input type="text" name="edit_email" value="<?php echo isset($pizzass) ? htmlspecialchars($pizzass['email']) : ''; ?>" required>
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Edit Pizza Title</label>
			<input type="text" name="edit_title" value="<?php echo isset($pizzass) ? htmlspecialchars($pizzass['title']) : ''; ?>"required>
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label>Edit Ingredients </label>
			<input type="text" name="edit_ingredients" value="<?php echo isset($pizzass) ? htmlspecialchars($pizzass['ingredients']) : ''; ?>"required>
			<div class="red-text"><?php echo $errors['ingredients']; ?></div>
			
			
		    <div class="center">
				<form action="edit_action.php" method="POST">
					<input type = "hidden" name="id_to_edit" value = "<?php echo $pizzass['id'] ;?> ">
					<input type="submit" name="submit_edit" value="Done!" class="btn brand z-depth-0">
				</form>
			</div>
		</form>
	</section>

	

	


<?php include('templates/footer.php'); ?>
</html>