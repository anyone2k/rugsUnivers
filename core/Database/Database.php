<?php

namespace Core\Database;

use \PDO;
use \PDOException;

/**
 * Class Database
 */
class Database
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $db_name;
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $db_user;
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $db_pass;
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $db_host;
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $pdo;

    /**
     * ConnecterBd constructor
     *
     * @param [type] $db_name
     * @param [type] $db_user
     * @param [type] $db_pass
     * @param [type] $db_host
     */
    public function __construct($db_name, $db_user, $db_pass, $db_host)
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * Data base connection establishin function
     *
     * @return PDO
     */
    public function getPDO()
    {
        try {
            if ($this->pdo == null) {
                $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
                echo "<script>console.log('Connection Established');</script>";
            }
            return $this->pdo;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
    /**
     * Fetch function
     *
     * @param string $statement
     * @return array
     */
    public function query($statement, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($statement);

        if (is_null($class_name)) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }
    /**
     * 
     *
     * @param string $statement
     * @param array $attributes
     * @param string $class_name
     * @param boolean $one
     * @return array
     */
    public function prepare($statement, $attributes, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);

        if (is_null($class_name)) {
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if ($one) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        return $data;

    }


}