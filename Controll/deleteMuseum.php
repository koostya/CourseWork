<?php
	require '../Model/config.php';

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$post_id = $_GET['post_id'];
		mysqli_query($conn, "DELETE FROM museum WHERE id = {$post_id}");
		mysqli_query($conn, "DELETE FROM staff WHERE id_mus = {$post_id}");
		header('Location: /');
	}
?>