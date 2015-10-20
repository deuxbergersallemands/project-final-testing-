<?php

class Database
{
    private $_host = "localhost";
    private $_dbname = "raphael_m4a1";
    private $_username = "raphael_m4a1";
    private $_passwd = "wfusdfcf";
    private $_db;


    public function __construct()
    {
        try {
            $this->_db = new PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_username, $this->_passwd);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    // Util functions to fetch and close queries.

    public function fetch($req)
    {
        if (!$req) return false;

        $data = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }

    public function fetchAll($req)
    {
        if (!$req) return false;

        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }

    
    // UserStories handling.

    public function getUserStories() {
        $this->fetchAll($this->_db->query("SELECT * FROM UserStories"));
    }

    public function getUserStory($id)
    {
        $req = $this->_db->prepare("SELECT * FROM UserStories WHERE usId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }

    public function addUserStory($identifier, $desc, $prio = 0, $diff = 0)
    {
        $req = $this->_db->prepare("INSERT INTO UserStories(usIdentifier, usDescription,
                                                            usPriority, usDifficulty)
                                                VALUES(?, ?, ?, ?)");
        $req->execute(array($identifier, $desc, $prio, $diff));
        $req->closeCursor();
    }

    public function updateUserStory($id, $identifier, $desc, $prio = 0, $diff = 0)
    {
        $req = $this->_db->prepare("UPDATE UserStories SET usIdentifier = ?, usDescription = ?,
                                                            usPriority = ?, usDifficulty = ?
                                                WHERE usId = ?");
        $req->execute(array($identifier, $desc, $prio, $diff, $id));
        $req->closeCursor();
    }

    public function delUserStory($id)
    {
        $req = $this->_db->prepare("DELETE FROM UserStories WHERE usId = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }

    public function setUserStoryComment($id, $comment)
    {
        $req = $this->_db->prepare("UPDATE UserStories SET usComment = ? WHERE usId = ?");
        $req->execute(array($comment, $id));
        $req->closeCursor();
    }

    public function setUserStoryState($id, $state)
    {
        $req = $this->_db->prepare("UPDATE UserStories SET usState = ? WHERE usId = ?");
        $req->execute(array($state, $id));
        $req->closeCursor();
    }

    public function setUserStoryDuration($id, $duration)
    {
        $req = $this->_db->prepare("UPDATE UserStories SET usDuration = ? WHERE usId = ?");
        $req->execute(array($duration, $id));
        $req->closeCursor();
    }


    // Tasks handling.

    public function getTasks() {
        $this->fetchAll($this->_db->query("SELECT * FROM Tasks"));
    }

    public function getTask($id)
    {
        $req = $this->_db->prepare("SELECT * FROM Tasks WHERE taskId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }


    // Sprints handling.
    
    public function getSprints() {
        $this->fetchAll($this->_db->query("SELECT * FROM Sprints"));
    }

    public function getSprint($id)
    {
        $req = $this->_db->prepare("SELECT * FROM Sprints WHERE sprintId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }


    // Developpers handling.

    public function getDeveloppers() {
        $this->fetchAll($this->_db->query("SELECT * FROM Developpers"));
    }

    public function getDevelopper($id)
    {
        $req = $this->_db->prepare("SELECT * FROM Developpers WHERE devId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }
}
