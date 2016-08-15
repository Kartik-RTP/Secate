<?php

function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

function find_admin_email($email,$connection){
	$query = "SELECT email FROM usr_details WHERE email = '{$email}' AND role = 2 ";
	$result = mysqli_query($connection,$query);

	if($user = mysqli_fetch_array($result)){
		return $user[0];
	}
	else{
		return NULL;
	}
}

function find_student_email($email,$connection){
	$query = "SELECT email FROM usr_details WHERE email = '{$email}' AND role = 1 ";
	$result = mysqli_query($connection,$query);

	if($user = mysqli_fetch_array($result)){
		return $user[0];
	}
	else{
		return NULL;
	}
}
function find_admin_password($email,$connection){
	$query = "SELECT password from usr_details where email = '{$email}' AND role = 2 ";
	$result = mysqli_query($connection,$query);

	if($user = mysqli_fetch_array($result)){
		return $user[0];
	}
	else{
		return NULL;
	}
}

function find_student_password($email,$connection){
	$query = "SELECT password from usr_details where email = '{$email}' AND role = 1 ";
	$result = mysqli_query($connection,$query);

	if($user = mysqli_fetch_array($result)){
		return $user[0];
	}
	else{
		return NULL;
	}
}

function password_encryption($password){
	$options = [
		'cost' => 10,
	];

	$hashed_password = password_hash($password, PASSWORD_DEFAULT, $options);
	return $hashed_password;
}

function password_check($input_password,$password_in_db){

	//$hashed_input_password = password_encryption($input_password);

	if(password_verify($input_password,$password_in_db)){
		return true;
	}
	else{
		return false;
	}
}

?>