<?php

/**
 ** Ce qu'on a déjà vu :
 * La classe database me permet de stocker la connexion à la base de données et de pouvoir la réutiliser pour ne pas répéter le même code.
 * Chaque autre classe qui aura besoin de se connecter à la base de données étendra cette classe pour pouvoir se connecter.
 ** Ce qui change :
 * On ne se connecte plus bêtement et simplement à la base de données, on regarde d'abord si on est déjà connecté à celle-ci.
 * Jusque-là quand nous appelions un objet, nous créions une nouvelle connexion à la base ce qui réinitialisait tout dans la base 
 * (l'historique des requêtes par exemple).
 * Avec ce "pattern" qu'on appelle le Singleton, on se connecte qu'une seule fois mais on récupère cette connexion à chaque fois.
 * Bien sûr cette connexion s'arrête au bout d'un moment, mais les actions nécessitant le singleton s'éxecute en quelques secondes, 
 * c'est bien assez rapide pour ne pas poser problème.
 * Nous nous servirons du Singleton pour 2 choses : les transactions et le lastInsertId - voir le fichier transactions.php
 */
class database
{
    /**
     * On donne à l'attribut db une valeur nulle au départ. 
     * C'est une valeur par défaut, elle ne redevient pas nulle si on l'a attribuée plus tard.
     */
    private $db = NULL;

    protected function __construct()
    {
        /**
         * Si l'attribut db est null (première fois qu'on appelle la classe database et donc première fois qu'on se sert de la 
         * base de données)
         */
        if (is_null($this->db)) {
            try {
                /**
                 * Je crée un objet PDO avec ma phrase de connexion qui contient le nom de ma base de données, le nom de mon serveur,
                 * mon nom d'utilisateur et mon mot de passe
                 */
                $this->db = new PDO('mysql:dbname=demo_singleton;host=localhost', 'root', 'WiikiiW0nd3r');
                /**
                 * Petite nouveauté : on donne à l'attribut db (qui est un objet PDO) le mode d'erreur exception
                 * ça veut dire que chaque erreur deviendra une exception
                 * Une exception est un objet qui décrit une erreur avec précision
                 * Cet objet contient des méthodes qui permettent de récupérer les messages d'erreurs par exemple
                 * ! Toutes les erreurs pdo vont devenir des exceptions
                 * Voir $error juste en dessous
                 */
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $error) {
                /**
                 * Ici $error est un objet exception qui contient une méthode getMessage qui récupère le message d'erreur qui a déclenché l'exception.
                 */
                die($error->getMessage());
            }
        }
        // On return objet PDO configuré pour pouvoir l'utiliser ailleurs (dans les classes enfants)
        return $this->db;
    }
}
