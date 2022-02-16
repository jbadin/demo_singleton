<?php
class clients extends database
{
    private $db;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $id_users;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertClient()
    {
        $query = 'INSERT INTO `clients` (`lastname`, `firstname`, `birthdate`, `id_users`)
        VALUES (:lastname, :firstname, :birthdate, :id_users);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryPrepare->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryPrepare->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryPrepare->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);

        return $queryPrepare->execute();
    }
}
