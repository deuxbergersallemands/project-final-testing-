<?php

class Database
{
    private $_host = "localhost";
    private $_dbname = "rjorel";
    private $_username = "rjorel";
    private $_passwd = "truc";
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

    public function addTask($identifier, $desc, $expectedDuration = 0)
    {
        $req = $this->_db->prepare("INSERT INTO Tasks(taskIdentifier, taskDescription,
                                                            taskExpectedDuration)
                                                VALUES(?, ?, ?)");
        $req->execute(array($identifier, $desc, $expectedDuration));
        $req->closeCursor();
    }

    public function updateTask($id, $identifier, $desc, $expectedDuration = 0)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET taskIdentifier = ?, taskDescription = ?,
                                                            taskExpectedDuration = ?
                                                WHERE taskId = ?");
        $req->execute(array($identifier, $desc, $expectedDuration, $id));
        $req->closeCursor();
    }

    public function delTask($id)
    {
        $req = $this->_db->prepare("DELETE FROM Tasks WHERE taskId = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }

    public function setTaskComment($id, $comment)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET taskComment = ? WHERE taskId = ?");
        $req->execute(array($comment, $id));
        $req->closeCursor();
    }

    public function setTaskState($id, $state)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET taskState = ? WHERE taskId = ?");
        $req->execute(array($state, $id));
        $req->closeCursor();
    }

    public function setTaskDuration($id, $duration)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET taskDuration = ? WHERE taskId = ?");
        $req->execute(array($duration, $id));
        $req->closeCursor();
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

    public function addSprint($identifier, $desc, $duration = 7)
    {
        $req = $this->_db->prepare("INSERT INTO Sprints(sprintIdentifier, sprintDescription,
                                                            sprintDuration)
                                                VALUES(?, ?, ?)");
        $req->execute(array($identifier, $desc, $duration));
        $req->closeCursor();
    }

    public function updateSprint($id, $identifier, $desc, $duration = 7)
    {
        $req = $this->_db->prepare("UPDATE Sprints SET sprintIdentifier = ?, sprintDescription = ?,
                                                            sprintDuration = ?
                                                WHERE sprintId = ?");
        $req->execute(array($identifier, $desc, $duration, $id));
        $req->closeCursor();
    }

    public function delSprint($id)
    {
        $req = $this->_db->prepare("DELETE FROM Sprints WHERE sprintId = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }

    public function setSprintComment($id, $comment)
    {
        $req = $this->_db->prepare("UPDATE Sprints SET sprintComment = ? WHERE sprintId = ?");
        $req->execute(array($comment, $id));
        $req->closeCursor();
    }

    public function setSprintState($id, $state)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET sprintState = ? WHERE sprintId = ?");
        $req->execute(array($state, $id));
        $req->closeCursor();
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
    
    public function addDevelopper($name, $fname)
    {
        $req = $this->_db->prepare("INSERT INTO Developpers(devName, devFirstName)
                                                VALUES(?, ?)");
        $req->execute(array($name, $fname));
        $req->closeCursor();
    }

    public function updateDevelopper($id, $name, $fname)
    {
        $req = $this->_db->prepare("UPDATE Sprints SET devName = ?, devFirstName = ?
                                                WHERE devId = ?");
        $req->execute(array($name, $fname, $id));
        $req->closeCursor();
    }

    public function delDevelopper($id)
    {
        $req = $this->_db->prepare("DELETE FROM Developpers WHERE devId = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }

    public function setDevelopperComment($id, $comment)
    {
        $req = $this->_db->prepare("UPDATE Developpers SET devComment = ? WHERE devId = ?");
        $req->execute(array($comment, $id));
        $req->closeCursor();
    }

}
