<?php

namespace model;


class DeveloperDatabase extends AbstractDatabase
{
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
		$taskDb = new \model\TaskDatabase;
		$taskDb->removeTasksFromDeveloper($id);

		$req = $this->_db->prepare("DELETE FROM Developers WHERE devId = ?");
		$req->execute(array($id));
		$req->closeCursor();
	}
	
	
	// Bindings with tasks.
	
	public function getDeveloperByTask($taskId)
	{
		$req = $this->_db->prepare("SELECT * FROM Developers WHERE devId in
										(SELECT devId FROM Tasks WHERE taskId = ?)");
		$req->execute(array($taskId));
		return $this->fetch($req);
	}
}