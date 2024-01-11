<?php

namespace Libs\Database;
use PDO;
use PDOException;

class MySQL{
    private $db = null;
    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpass;

    public function __construct(
    $dbhost = "localhost",
     $dbname = "project",
     $dbuser = "root",
    $dbpass = "")//can use class parameter property promotion
    {
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
    }

    public function connect(){
        try{
            $this->db = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname",
        $this->dbuser,
        $this->dbpass,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        return $this->db;
        }
        catch(PDOException $e){//$e is error object
            echo $e->getMessage();
            exit;
        }
    }
}   