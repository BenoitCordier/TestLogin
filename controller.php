<?php

require('model_connection.php');

connection($user_name, $password);

require('model_inscription.php');

inscription($user_name, $password, $e_mail, $);

require('view.php');
