<?php

require_once '../Model/config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['post_id'])){
		$post_id = $_GET['post_id'];
		$sql_result = mysqli_query($conn, "SELECT * FROM museum WHERE id = {$post_id}");
		if($sql_result){
			print(json_encode(mysqli_fetch_assoc($sql_result)));
		} else {
			print '[]';
		}
	}
} else {
	$post_id = $_POST['post_id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	mysqli_query($conn, "UPDATE museum SET name = '{$name}', description = '{$description}' WHERE id = {$post_id}");
	var_dump("UPDATE museum SET name = '{$name}', description = '{$description}' WHERE id = {$post_id}");
}