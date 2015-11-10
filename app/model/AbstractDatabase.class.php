<?php

namespace model;


abstract class AbstractDatabase
{
    protected $_host = "localhost";
    protected $_dbname = "rjorel";
    protected $_username = "root";
    protected $_passwd = "wfusdfcf";
    protected $_db;


    public function __construct()
    {
        try {
            $this->_db = new \PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_username, $this->_passwd);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
    // Util functions to fetch and close queries.
    
    protected function fetch($req)
    {
        if (!$req) return false;
    
        $data = $req->fetch(\PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
    
    protected function fetchAll($req)
    {
        if (!$req) return false;
    
        $data = $req->fetchAll(\PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
}