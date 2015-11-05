<?php

namespace model;


class SprintDatabase extends AbstractDatabase
{
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
	
	
	// Bindings with us.
	
	public function getSprintsByUserstory($usId)
	{
		$req = $this->_db->prepare("SELECT * FROM Sprints WHERE sprintId in
										(SELECT taskId FROM UserStoriesToSprints WHERE usId = ?)");
		$req->execute(array($usId));
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