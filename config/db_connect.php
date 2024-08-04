<?php 

	// connect  db
	$conn = mysqli_connect('localhost','ahnaf','test123','ninja_pizza');

	// check 
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>