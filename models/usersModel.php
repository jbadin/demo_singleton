<?php
class users extends database
{
    private $db;
    public $id;
    public $mail;
    public $password;

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function insertUser()
    {
        $query = 'INSERT INTO `users` (`mail`, `password`)
        VALUES (:mail, :password);';
        $queryPrepare = $this->db->prepare($query);
        $queryPrepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryPrepare->bindValue(':password', $this->password, PDO::PARAM_STR);

        return $queryPrepare->execute();
    }
}
