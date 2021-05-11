<?php

function inscription($user_name, $password, $e_mail) {
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$user_name = !empty($_POST['user_name']) ? $_POST['user_name'] : NULL;
	$password = !empty($_POST['password']) ? $_POST['password'] : NULL;
	$first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : NULL;
	$last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : NULL;
	$e_mail = !empty($_POST['e_mail']) ? $_POST['e_mail'] : NULL;

	$pass_hache = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : NULL; 

	$req = $bdd->prepare('INSERT INTO user(user_name, first_name, last_name, e_mail, password) VALUES(:user_name, :first_name, :last_name, :e_mail, :password');
	$req->execute(array(
		'user_name' => $user_name,
		'first_name'  => $first_name,
		'last_name' => $last_name,
		'e_mail' => $e_mail,
		'password' => $pass_hache));
}