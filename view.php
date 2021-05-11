<!DOCTYPE html>

<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Test</title>
</head>

<body>
    <h1>Page de connection</h1>

    <div>
        <h2>Se connecter</h2>
        <form method="POST" action="/Test/model_connection.php">
            <label for="user_login">Login :</label>
            <input id="user_login" type="text" name="login" />
            <label for="user_login">Password :</label>
            <input id="user_password" type="text" name="password" />
            <input type="submit" value="Connection" />
        </form>
    </div>

    

    <div>
        <h2>S'enregistrer</h2>
        <form method="POST" action="/Test/model_inscription.php">
            <label for="new_login">Login :</label>
            <input id="new_login" type="text" name="new_login" />
            <label for="new_firstname">Prénom :</label>
            <input id="new_firstname" type="text" name="new_firstname" />
            <label for="new_lastname">Nom :</label>
            <input id="new_lastname" type="text" name="new_lastname" />
            <label for="new_email">E-mail :</label>
            <input id="new_email" type="text" name="new_email" />
            <label for="new_password">Mot de passe :</label>
            <input id="new_password" type="text" name="new_password" />
            <label for="confirmation_password">Confirmez votre mot de passe :</label>
            <input id="confirmation_password" type="text" name="confirmation_password" />
            <input type="submit" value="S'enregistrer">
        </form>
    </div>
</body>

</html>