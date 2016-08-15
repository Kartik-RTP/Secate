<?php
	session_start();
	include("includes/connection.php");
	include("includes/functions.php");
?>

<?php
	if(isset($_SESSION['admin'])){
		$_SESSION['email'] = NULL;
		redirect_to('index.php');
	}
	elseif(isset($_SESSION['student'])){
		$_SESSION['entry_number'] = NULL;
		redirect_to('index.php');
	}
	
?>