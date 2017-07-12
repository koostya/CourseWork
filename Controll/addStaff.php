<?php
	require '../Model/config.php';

	

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name_s = $_POST['name_s'];
		$surname = $_POST['surname'];
		$sursurname = $_POST['sursurname'];
		$telephone = $_POST['telephone'];
		$praise = $_POST['praise'];
		$rebuke = $_POST['rebuke'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$id_mus = $_POST['id_mus'];

		mysqli_query($conn, "INSERT INTO staff (name_s, surname, sursurname, telephone, praise, rebuke, login, password, id_mus) VALUES ('{$name_s}', '{$surname}', '{$sursurname}', '{$telephone}', {$praise}, {$rebuke}, '{$login}', '{$password}', {$id_mus})");
		
	}
?>