<?php

function inscription($login, $password, $e_mail) {
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$req = $bdd->prepare('INSERT INTO user(user_name, first_name, last_name, e_mail, password) VALUES(:user_name, :first_name, :last_name, :e_mail, :password');
	$req->execute(array(
		'user_name' => $user_name,
		'first_name'  => $first_name,
		'last_name' => $last_name,
		'e_mail' => $e_mail,
		'password' => $pass_hache));
}