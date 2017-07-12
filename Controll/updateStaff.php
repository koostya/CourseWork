<?php

require_once '../Model/config.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['post_id'])){
		$post_id = $_GET['post_id'];
		$sql_result = mysqli_query($conn, "SELECT * FROM staff WHERE id = {$post_id}");
		if($sql_result){
			print(json_encode(mysqli_fetch_assoc($sql_result)));
		} else {
			print '[]';
		}
	}
} else {
	$post_id = $_POST['post_id'];
	$name_s = $_POST['name_s'];
	$surname = $_POST['surname'];
	$sursurname = $_POST['sursurname'];
	$telephone = $_POST['telephone'];
	$praise = $_POST['praise'];
	$rebuke = $_POST['rebuke'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$id_mus = $_POST['id_mus'];
	mysqli_query($conn, "UPDATE staff SET name_s = '{$name_s}', surname = '{$surname}', sursurname = '{$sursurname}', telephone = '{$telephone}', praise = '{$praise}', rebuke = '{$rebuke}', login = '{$login}', password = '{$password}', id_mus = '{$id_mus}' WHERE id = {$post_id}");
	

}

?>