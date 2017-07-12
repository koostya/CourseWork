<?php 
	require '../Model/config.php';

	

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		$description = $_POST['description'];
		$img_catalog = 'img/';
		$destination = '../img';
		$img_filename = $_POST['img'];
		$img_file = $_POST['file'];
		mysqli_query($conn, "INSERT INTO museum (name, description, img_catalog, img_filename) VALUES ('{$name}', '{$description}', '{$img_catalog}', '{$img_file}')");
		
	}

 ?>