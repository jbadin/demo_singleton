<?php
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/transaction.php';
require_once 'models/usersModel.php';
require_once 'models/clientsModel.php';
require_once 'controllers/indexController.php';



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Démo Singleton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <form action="index.php" method="POST">
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="lastname">Nom de famille</label>
                    <input type="text" name="lastname" id="lastname" placeholder="DUPONT" class="form-control" value="<?= @$_POST['lastname'] ?>" />
                </div>
                <div class="mb-3 col-6">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Jean" class="form-control" value="<?= @$_POST['firstname'] ?>" />
                </div>
                <div class="mb-3 col-6">
                    <label for="birthdate">Date de naissance</label>
                    <input type="date" name="birthdate" id="birthdate" class="form-control" value="<?= @$_POST['birthdate'] ?>" />
                </div>
                <div class="mb-3 col-6">
                    <label for="mail">Adresse mail</label>
                    <input type="email" name="mail" id="mail" placeholder="jean.dupont@mail.fr" class="form-control" value="<?= @$_POST['mail'] ?>" />
                </div>
                <div class="mb-3 col-6">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="********" class="form-control" value="<?= @$_POST['password'] ?>" />
                </div>
                <div class="mb-3 col-6">
                    <label for="confirmPassword">Confirmation du mot de passe</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="********" class="form-control" value="<?= @$_POST['confirmPassword'] ?>" />
                </div>
                <div class="mb-3 col-6">
                    <input type="submit" value="Enregistrer" class="btn btn-success" />
                </div>
            </div>
        </form>
    </div>
</body>

</html>