<?php
if (count($_POST) > 0) {

    $formErrors = [];
    $user = new users;
    $client = new clients;
    $transaction = new transaction;

    if (!empty($_POST['lastname'])) {
        if (preg_match($regex['name'], $_POST['lastname'])) {
            $client->lastname = $_POST['lastname'];
        } else {
            $formErrors['lastname'] = LASTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['lastname'] = LASTNAME_ERROR_EMPTY;
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($regex['name'], $_POST['firstname'])) {
            $client->firstname = $_POST['firstname'];
        } else {
            $formErrors['firstname'] = FIRSTNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['firstname'] = FIRSTNAME_ERROR_EMPTY;
    }

    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['date'], $_POST['birthdate'])) {
            $client->birthdate = $_POST['birthdate'];
        } else {
            $formErrors['birthdate'] = BIRTHDATE_ERROR_INVALID;
        }
    } else {
        $formErrors['birthdate'] = BIRTHDATE_ERROR_EMPTY;
    }

    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $user->mail = $_POST['mail'];
        } else {
            $formErrors['mail'] = MAIL_ERROR_INVALID;
        }
    } else {
        $formErrors['mail'] = MAIL_ERROR_EMPTY;
    }

    if (!empty($_POST['password'])) {
        if (preg_match($regex['password'], $_POST['password'])) {

            if (!empty($_POST['confirmPassword'])) {
                if ($_POST['password'] == $_POST['confirmPassword']) {
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                } else {
                    $formErrors['password'] = PASSWORD_ERROR_DIFFERENT;
                }
            } else {
                $formErrors['password'] = PASSWORD_ERROR_EMPTY;
            }
        } else {
            $formErrors['password'] = PASSWORD_ERROR_INVALID;
        }
    } else {
        $formErrors['password'] = PASSWORD_ERROR_EMPTY;
    }

    try {
        $transaction->beginTransaction();
        $user->insertUser();
        $client->id_users = $transaction->lastInsertId();
        $client->insertClient();
        $transaction->commit();
    } catch (Exception $e) {
        $transaction->rollBack();
    }
}
