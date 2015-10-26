<?php

class Database
{
    private $_host = "localhost";
    private $_dbname = "rjorel";
    private $_username = "root";
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
        return $this->fetchAll($this->_db->query("SELECT * FROM UserStories"));
    }

    public function getUserStory($id)
    {
        $req = $this->_db->prepare("SELECT * FROM UserStories WHERE usId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }

    public function addUserStory($identifier, $summ, $prio = 0, $diff = 0, $desc = "")
    {
        $req = $this->_db->prepare("INSERT INTO UserStories(usIdentifier, usSummary,
                                                            usPriority, usDifficulty, usDescription)
                                                VALUES(?, ?, ?, ?)");
        $req->execute(array($identifier, $summ, $prio, $diff, $desc));
        $req->closeCursor();
    }

    public function updateUserStory($id, $identifier, $summ, $prio = 0, $diff = 0, $desc = "")
    {
        $req = $this->_db->prepare("UPDATE UserStories SET usIdentifier = ?, usSummary = ?,
                                                            usPriority = ?, usDifficulty = ?,
                                                            usDescription = ?
                                                WHERE usId = ?");
        $req->execute(array($identifier, $summ, $prio, $diff, $desc, $id));
        $req->closeCursor();
    }

    public function delUserStory($id)
    {
        $req = $this->_db->prepare("DELETE FROM UserStories WHERE usId = ?");
        $req->execute(array($id));
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
        return $this->fetchAll($this->_db->query("SELECT * FROM Tasks"));
    }

    public function getTask($id)
    {
        $req = $this->_db->prepare("SELECT * FROM Tasks WHERE taskId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }

    public function addTask($identifier, $summ, $expectedDuration = 0, $desc = "")
    {
        $req = $this->_db->prepare("INSERT INTO Tasks(taskIdentifier, taskSummary,
                                                            taskExpectedDuration, taskDescription)
                                                VALUES(?, ?, ?, ?)");
        $req->execute(array($identifier, $summ, $expectedDuration, $desc));
        $req->closeCursor();
    }

    public function updateTask($id, $identifier, $summ, $expectedDuration = 0, $desc = "")
    {
        $req = $this->_db->prepare("UPDATE Tasks SET taskIdentifier = ?, taskSummary = ?,
                                                            taskExpectedDuration = ?, taskDescription = ?
                                                WHERE taskId = ?");
        $req->execute(array($identifier, $summ, $expectedDuration, $desc, $id));
        $req->closeCursor();
    }

    public function delTask($id)
    {
        $req = $this->_db->prepare("DELETE FROM Tasks WHERE taskId = ?");
        $req->execute(array($id));
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
        return $this->fetchAll($this->_db->query("SELECT * FROM Sprints"));
    }

    public function getSprint($id)
    {
        $req = $this->_db->prepare("SELECT * FROM Sprints WHERE sprintId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }

    public function addSprint($identifier, $summ, $duration = 7, $desc = "")
    {
        $req = $this->_db->prepare("INSERT INTO Sprints(sprintIdentifier, sprintSummary,
                                                            sprintDuration, sprintDescription)
                                                VALUES(?, ?, ?)");
        $req->execute(array($identifier, $summ, $duration, $desc));
        $req->closeCursor();
    }

    public function updateSprint($id, $identifier, $summ, $duration = 7, $desc = "")
    {
        $req = $this->_db->prepare("UPDATE Sprints SET sprintIdentifier = ?, sprintSummary = ?,
                                                            sprintDuration = ?, sprintDescription = ?
                                                WHERE sprintId = ?");
        $req->execute(array($identifier, $summ, $duration, $desc, $id));
        $req->closeCursor();
    }

    public function delSprint($id)
    {
        $req = $this->_db->prepare("DELETE FROM Sprints WHERE sprintId = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }

    public function setSprintState($id, $state)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET sprintState = ? WHERE sprintId = ?");
        $req->execute(array($state, $id));
        $req->closeCursor();
    }


    // Developers handling.

    public function getDevelopers() {
        return $this->fetchAll($this->_db->query("SELECT * FROM Developers"));
    }

    public function getDeveloper($id)
    {
        $req = $this->_db->prepare("SELECT * FROM Developers WHERE devId = ?");
        $req->execute(array($id));
        return $this->fetch($req);
    }
    
    public function addDeveloper($name, $fname, $desc = "")
    {
        $req = $this->_db->prepare("INSERT INTO Developers(devName, devFirstName, devDescription)
                                                VALUES(?, ?, ?)");
        $req->execute(array($name, $fname, $desc));
        $req->closeCursor();
    }

    public function updateDeveloper($id, $name, $fname, $desc = "")
    {
        $req = $this->_db->prepare("UPDATE Developers SET devName = ?, devFirstName = ?, devDescription = ?
                                                WHERE devId = ?");
        $req->execute(array($name, $fname, $desc, $id));
        $req->closeCursor();
    }

    public function delDeveloper($id)
    {
        $req = $this->_db->prepare("DELETE FROM Developers WHERE devId = ?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}
