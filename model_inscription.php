<?php

$user_name = !empty($_POST['user_name']) ? $_POST['user_name'] : NULL;
$password = !empty($_POST['password']) ? $_POST['password'] : NULL;
$e_mail = !empty($_POST['e_mail']) ? $_POST['e_mail'] : NULL;
$first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : NULL;
$last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : NULL;

function inscription($user_name, $password, $e_mail, $first_name, $last_name) {
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');

		$pass_hache = password_hash($password, PASSWORD_DEFAULT); 

		$req = $bdd->prepare('INSERT INTO user(user_name, first_name, last_name, e_mail, password, function) VALUES(:user_name, :first_name, :last_name, :e_mail, :password, "user")');
		$req->bindParam(':user_name', $user_name);
		$req->bindParam(':first_name', $first_name);
		$req->bindParam(':last_name', $last_name);
		$req->bindParam(':e_mail', $e_mail);
		$req->bindParam(':password', $pass_hache);
		
		$req->execute();

		echo "Bienvenue " . $user_name . " ! Vous êtes enregistré !";
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}	
	
}

inscription($user_name, $password, $e_mail, $first_name, $last_name);