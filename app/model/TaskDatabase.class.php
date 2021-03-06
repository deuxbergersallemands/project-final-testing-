<?php
namespace model;


class TaskDatabase extends AbstractDatabase
{
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


    // Bindings with developers.
    public function getTasksByDeveloper($devId)
    {
        $req = $this->_db->prepare("SELECT * FROM Tasks WHERE devId = ?");
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
    
    public function removeTasksFromDeveloper($devId)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET devId = null WHERE devId = ?");
        $req->execute(array($devId));
        $req->closeCursor();
    }
	
     public function removeDeveloperFromTasks($taskId)
    {
        $req = $this->_db->prepare("UPDATE Tasks SET devId = null WHERE taskId = ?");
        $req->execute(array($taskId));
        $req->closeCursor();
    }


    // Bindings with us.
    public function getTasksByUserstory($usId)
    {
        $req = $this->_db->prepare("SELECT * FROM Tasks WHERE taskId in
                                        (SELECT taskId FROM TasksToUserStories WHERE usId = ?)");
        $req->execute(array($usId));
        return $this->fetchAll($req);
    }


    // Bindings with sprints.
	 public function getTasksBySprint($sprintId)
    {
        $req = $this->_db->prepare("SELECT * FROM Tasks WHERE taskId in
                                        (SELECT taskId FROM TasksToUserStories WHERE usId in
										(SELECT usId FROM UserStoriesToSprints WHERE sprintId= ?)
										 )");
        $req->execute(array($sprintId));
        return $this->fetchAll($req);
    }


	 // Dependencies handling
    public function getAllTaskDependencies()
    {
        $sql = "SELECT * from TasksToTasks";
        $req = $this->_db->prepare($sql);
        $req->execute(array());
        return $this->fetchAll($req);
    }

    public function getDependentTasks($taskId)
    {
        $sql = "SELECT * FROM Tasks WHERE taskId 
						in (SELECT tsDependentId FROM TasksToTasks WHERE taskId = ?)";
        
        $req = $this->_db->prepare($sql);
        $req->execute(array($taskId));
        return $this->fetchAll($req);
    }
    
    public function getDependOnTasks($taskId)
    {
        $sql = "SELECT * FROM Tasks WHERE taskId
                    in (SELECT taskId FROM TasksToTasks WHERE tsDependentId = ?)";
        
        $req = $this->_db->prepare($sql);
        $req->execute(array($taskId));
        return $this->fetchAll($req);
    }
    
    public function addDependentTask($tsDependentId, $taskId)
    {
        $sql = "INSERT INTO TasksToTasks(taskId, tsDependentId)
                  VALUES(?, ?)";
        
        $req = $this->_db->prepare($sql);
        $req->execute(array($taskId, $tsDependentId));
        $req->closeCursor();
    }
    
    public function removeDependentTask($tsDependentId, $taskId)
    {
        $sql = "DELETE FROM TasksToTasks
                WHERE taskId = ? AND tsDependentId = ?";
        
        $req = $this->_db->prepare($sql);
        $req->execute(array($taskId, $tsDependentId));
        $req->closeCursor();
    }
    
    public function removeDependentTasks($taskId)
    {
        $sql = "DELETE FROM TasksToTasks WHERE taskId = ?";
        
        $req = $this->_db->prepare($sql);
        $req->execute(array($taskId));
        $req->closeCursor();
    }
    
    public function removeDependOnTasks($taskId)
    {
        $sql = "DELETE FROM TasksToTasks WHERE tsDependentId = ?";
        
        $req = $this->_db->prepare($sql);
        $req->execute(array($taskId));
        $req->closeCursor();
    }
}
