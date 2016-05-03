<?php
class Model_class {
    protected $db;
    private $DB_DSN = 'mysql:host=localhost;dbname=camagru;charset=utf8';
    private $DB_USER = 'root';
    private $DB_PASSWORD = '';
    function __construct()
    {
        try
        {
            $this->db = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
        }
        catch(Exception $e)
        {
            die('PDO Erreur : '.$e->getMessage());
        }
    }
}
?>