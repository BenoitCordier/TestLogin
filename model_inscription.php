<?php

$user_name = !empty($_POST['user_name']) ? $_POST['user_name'] : NULL;
$password = !empty($_POST['password']) ? $_POST['password'] : NULL;
$confirmation_password = !empty($_POST['confirmation_password']) ? $_POST['confirmation_password'] : NULL;
$e_mail = !empty($_POST['e_mail']) ? $_POST['e_mail'] : NULL;
$first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : NULL;
$last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : NULL;

function inscription($user_name, $password, $e_mail, $first_name, $last_name, $confirmation_password) {
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');

		if ($user_name === NULL)
		{
			echo "Veuillez saisir un nom d'utilisateur valide.";
		}
		elseif($password === NULL)
		{
			echo "Veuillez saisir un mot de passe.";
		}
		elseif($confirmation_password !== $password || $confirmation_password === NULL)
		{
			echo "Veuillez confirmer votre mot de passe.";
		}
		elseif ($e_mail === NULL || !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['e_mail']))
		{
			echo "Veuillez saisir une adresse e-mail valide.";
		}
		elseif ($first_name === NULL || $last_name === NULL)
		{
			echo "Veuillez indiquer vos noms et prénoms.";
		}
		else
		{
			$pass_hache = password_hash($password, PASSWORD_DEFAULT); 

			$req = $bdd->prepare('INSERT INTO user(user_name, first_name, last_name, e_mail, password, function) VALUES(:user_name, :first_name, :last_name, :e_mail, :password, "user")');
			$req->bindParam(':user_name', $user_name);
			$req->bindParam(':first_name', $first_name);
			$req->bindParam(':last_name', $last_name);
			$req->bindParam(':e_mail', $e_mail);
			$req->bindParam(':password', $pass_hache);
			
			$req->execute();

			echo "Bienvenue " . $first_name . " " . $last_name . " ! Vous vous êtes enregistré sous le pseudonyme " . $user_name . " !";
		}
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}	
	
}

inscription($user_name, $password, $e_mail, $first_name, $last_name, $confirmation_password);