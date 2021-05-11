<?php

function connection($user_name, $password) {

	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('SELECT id, password FROM user WHERE user_name = :user_name');
	$req->execute(array(
		'user_name' => $user_name));
	$resultat = $req->fetch();

	$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

	if (!$resultat)	{
		echo 'Mauvais identifiant ou mot de passe !';
	} else {
		if ($isPasswordCorrect) {
			session_start();
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['user_name'] = $user_name;
			echo 'Vous êtes connecté !';
		} else {
			echo 'Mauvais identifiant ou mot de passe !';
		}
	}
}