<?php
	require '../Model/config.php';

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$post_id = $_GET['post_id'];
		mysqli_query($conn, "DELETE FROM staff WHERE id = {$post_id}");
		header('Location: /');
		// print(mysql_error($conn));
	}
?>