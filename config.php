<?php
$regex = [
    'name' => '/^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$/',
    'date' =>  '/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
];

define('MAIL_ERROR_EMPTY', 'Veuillez renseigner votre adresse mail.');
define('MAIL_ERROR_INVALID', 'Votre adresse est incorecte.');

define('PASSWORD_ERROR_EMPTY', 'Veuillez renseigner votre mot de passe.');
define('PASSWORD_ERROR_INVALID', 'Votre mot de passe doit comporter au minimum une majuscule, une minuscule, un caractère spécial et au minimum contenir 8 caractères.');
define('PASSWORD_ERROR_DIFFERENT', 'Votre mot de passe et sa confirmation sont différents.');
define('PASSWORD_ERROR_CONFIRMATION_EMPTY', 'Veuillez confirmer votre mot de passe.');

define('LASTNAME_ERROR_EMPTY', 'Veuillez renseigner votre nom de famille.');
define('LASTNAME_ERROR_INVALID', 'Votre nom de famille doit commencer par une majuscule et ne peut contenir que des lettres, tirets, apostrophes et espaces.');

define('FIRSTNAME_ERROR_EMPTY', 'Veuillez renseigner votre prénom.');
define('FIRSTNAME_ERROR_INVALID', 'Votre prénom doit commencer par une majuscule et ne peut contenir que des lettres, tirets, apostrophes et espaces.');

define('BIRTHDATE_ERROR_EMPTY', 'Veuillez renseigner votre date de naissance.');
define('BIRTHDATE_ERROR_INVALID', 'Votre date de naissance doit être au format jj/mm/aaaa.');
