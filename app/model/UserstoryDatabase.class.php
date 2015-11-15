<?php

namespace model;


class UserstoryDatabase extends AbstractDatabase
{
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
    
    
    // Bindings with tasks.
    
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
    
     public function removeTasksFromUserstory($usId)
    {
        $req = $this->_db->prepare("DELETE FROM TasksToUserStories
                                        WHERE usId = ?");
        $req->execute(array($usId));
        $req->closeCursor();
    }
	
	   public function removeUserstoryFromTasks($taskId)
    {
        $req = $this->_db->prepare("DELETE FROM TasksToUserStories
                                        WHERE taskId = ?");
        $req->execute(array($taskId));
        $req->closeCursor();
    }
	
	
    // Bindings with sprints.
    
    public function getUserstoriesBySprint($sprintId)
    {
        $sql = "SELECT * FROM `userstories` WHERE usId 
						in (SELECT usId FROM userstoriestosprints WHERE sprintId= ?)";
        $req = $this->_db->prepare($sql);
        $req->execute(array($sprintId));
        return $this->fetchAll($req);
    }
}
