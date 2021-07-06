<?php

require 'model_user.php';

require 'model_db.php';

require 'view.php';


/*function signIn() {
    $bdd = dbConnection();

    $userManager = new UserManager($bdd);

    $user_name = 'Tom';
    $password = '1234';
    $e_mail = 'abab@gmail.com';
    $last_name = 'dupont';
    $first_name = 'tom';

    $req = $userManager->signIn($user_name, $password, $e_mail, $first_name, $last_name);
}

signIn();*/

// method login et signin avec les vérifications

function logIn() {
    $user_name = !empty($_POST['user_name']) ? $_POST['user_name'] : NULL;
    $password = !empty($_POST['password']) ? $_POST['password'] : NULL;

	$isPasswordCorrect = !empty($_POST['password']) ? password_verify($_POST['password'], $resultat['password']) : NULL;

	if (!$resultat)	{
		echo 'Mauvais identifiant ou mot de passe !';
	} else {
		if ($isPasswordCorrect) {
			session_start();
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['user_name'] = $user_name;
			echo "Bonjour " . $user_name . ". Vous êtes connecté !";
		} else {
			echo 'Mauvais identifiant ou mot de passe !';
		}
	}
}

function signIn() {
    $db = dbConnection();

    $userManager = new UserManager($db);
    
    $user_name = !empty($_POST['user_name']) ? $_POST['user_name'] : NULL;
    $password = !empty($_POST['password']) ? $_POST['password'] : NULL;
    $confirmation_password = !empty($_POST['confirmation_password']) ? $_POST['confirmation_password'] : NULL;
    $e_mail = !empty($_POST['e_mail']) ? $_POST['e_mail'] : NULL;
    $first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : NULL;
    $last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : NULL;

    $check_user = $userManager->checkUser($user_name);
    $check_email = $userManager->checkEmail($e_mail);


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
    elseif ($check_user)
    {
        echo "Pseudonyme déjà utilisé, veuillez en choisir un autre.";
    }
    elseif ($check_email)
    {
        echo "Adresse mail déjà utilisée, veuillez en choisir un autre.";
    }
    else
    {
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);

        $req = $userManager->signIn($user_name, $password, $e_mail, $first_name, $last_name);

        echo "Bienvenue " . $first_name . " " . $last_name . " ! Vous vous êtes enregistré sous le pseudonyme " . $user_name . " !";
    }
}
