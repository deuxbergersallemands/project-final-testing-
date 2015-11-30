<?php

  namespace model;

  class GithubDatabase extends AbstractDatabase {

    public function setGithubData($author, $repository) {
    	$req = $this->_db->prepare("UPDATE Github SET author=?, repository=? WHERE idGithub=1");
    	$req->execute(array($author, $repository));
		$req->closeCursor();
    }

    public function getGithubData() {

    	$req = $this->_db->prepare("SELECT * FROM Github WHERE idGithub = ?");
		$req->execute(array(1));
		return $this->fetch($req);

    }
  }