<?php

  namespace model;
  class HelpDatabase extends AbstractDatabase {

    public function getHelp() {
        return $this->fetchAll($this->_db->query("SELECT * FROM Help"));
    }
  }
?>