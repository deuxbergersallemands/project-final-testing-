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
                                                VALUES(?, ?, ?, ?, ?)");
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

    public function addSprint($identifier, $duration = 7, $desc = "")
    {
        $req = $this->_db->prepare("INSERT INTO Sprints(sprintIdentifier,
                                                            sprintDuration, sprintDescription)
                                                VALUES(?, ?, ?)");
        $req->execute(array($identifier, $duration, $desc));
        $req->closeCursor();
    }

    public function updateSprint($id, $identifier, $duration = 7, $desc = "")
    {
        $req = $this->_db->prepare("UPDATE Sprints SET sprintIdentifier = ?,
                                                            sprintDuration = ?, sprintDescription = ?
                                                WHERE sprintId = ?");
        $req->execute(array($identifier, $duration, $desc, $id));
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
        $req = $this->_db->prepare("UPDATE Sprints SET sprintState = ? WHERE sprintId = ?");
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


    // Bindings for tasks and developers.

    public function getDeveloperByTask($taskId)
    {
        $req = $this->_db->prepare("SELECT * FROM Developers WHERE devId in 
        								(SELECT devId FROM Tasks WHERE taskId = ?)");
        $req->execute(array($taskId));
        return $this->fetch($req);
    }
    
    public function getTasksByDeveloper($devId)
    {
    	$req = $this->_db->prepare("SELECT Tasks WHERE devId = ?");
    	$req->execute(array($devId));
    	return $this->fetchAll($req);
    }

    public function setDeveloperToTask($devId, $taskId)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET devId = ? WHERE taskId = ?");
        $req->execute(array($devId, $taskId));
        $req->closeCursor();
    }

    public function removeDeveloperFromTask($taskId)
    {
    	$req = $this->_db->prepare("UPDATE Tasks SET devId = null WHERE taskId = ?");
    	$req->execute(array($taskId));
    	$req->closeCursor();
    }
    
    
    // Bindings for tasks and us.
    
    public function getTasksByUserstory($usId)
    {
    	$req = $this->_db->prepare("SELECT * FROM Tasks WHERE taskId in
    									(SELECT taskId FROM TasksToUserStories WHERE usId = ?)");
    	$req->execute(array($usId));
    	return $this->fetchAll($req);
    }
    
    public function getUserstoriesByTask($taskId)
    {
    	$req = $this->_db->prepare("SELECT * FROM UserStories WHERE usId in
    								(SELECT usId FROM TasksToUserStories WHERE taskId = ?)");
    	$req->execute(array($taskId));
    	return $this->fetchAll($req);
    }
    
    public function addTaskToUserstory($taskId, $usId)
    {
    	$req = $this->_db->prepare("INSERT INTO TasksToUserStories(taskId, usId)
    									VALUES(?, ?)");
    	$req->execute(array($taskId, $usId));
    	$req->closeCursor();
  	}
    
    public function removeTaskFromUserstory($taskId, $usId)
    {
    	$req = $this->_db->prepare("DELETE FROM TasksToUserStories
    									WHERE taskId = ? AND usId = ?");
    	$req->execute(array($taskId, $usId));
    	$req->closeCursor();
    }
    
    
    // Bindings for sprints and us.
    
    public function getSprintsByUserstory($usId)
    {
    	$req = $this->_db->prepare("SELECT * FROM Sprints WHERE sprintId in
    									(SELECT taskId FROM UserStoriesToSprints WHERE usId = ?)");
    	$req->execute(array($usId));
    	return $this->fetchAll($req);
    }
    
    public function getUserstoriesBySprint($sprintId)
    {
    	$req = $this->_db->prepare("SELECT * FROM UserStories WHERE usId in
    									(SELECT usId FROM UserStoriesToSprints WHERE sprintId = ?)");
    	$req->execute(array($sprintId));
    	return $this->fetchAll($req);
    }
    
    public function addUserstoryToSprint($usId, $sprintId)
    {
    	$req = $this->_db->prepare("INSERT INTO UserStoriesToSprints(usId, sprintId)
    									VALUES(?, ?)");
    	$req->execute(array($usId, $sprintId));
    	$req->closeCursor();
    }
    
    public function removeUserstoryToSprint($usId, $sprintId)
    {
    	$req = $this->_db->prepare("DELETE FROM UserStoriesToSprints
    									WHERE usId = ? AND sprintId = ?");
    	$req->execute(array($usId, $taskId));
    	$req->closeCursor();
    }
}
