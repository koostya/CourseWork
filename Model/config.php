<?php 

	require_once 'connection.php'; 

	$conn = mysqli_connect($host, $user, $password, $database) 
    	or die("Ошибка " . mysqli_error($conn));
 
 ?>