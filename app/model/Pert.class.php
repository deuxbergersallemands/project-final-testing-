<?php 

  namespace model;

  class Pert {
    public $nodes = array();

    public function __construct() {
    	$node = new TaskNode();
      $node->setId(0);
      $node->setIdentifier("Initial");
      $node->setDurationTask(0);
      $this->nodes[$node->getId()] = $node;
    }

    public function buildNodes($collection, $dependencies) {
      $this->addNodes($collection);
      $this->buildDependencies($dependencies);
    }

    public function addNodes($collection) {

      foreach ($collection as $task) {
        $node = new TaskNode();
        $node->setId($task->taskId);
        $node->setIdentifier($task->taskIdentifier);
        $node->setDurationTask($task->taskExpectedDuration);
        $node->setDurationMax(99999999);
        $this->nodes[$node->getId()] = $node;
      }
    }
 
    public function getNodeById($id) {
      return $this->nodes[$id];
    }

    public function buildDependencies($dependencies) {
      
      foreach ($dependencies as $dependency)  {
          $previousNode = $this->getNodeById($dependency->tsDependentId);
          $followingNode = $this->getNodeById($dependency->taskId);
          $this->linkNodes($previousNode, $followingNode);
        } 
      $this->connectInitialNode();
      $this->addFinalNode();
      $this->determineMinimumDuration($this->getNodeById(0));
      $this->determineMaximumDuration($this->getNodeById(999999999));
    } 

    public function connectInitialNode() {
      $initialNode = $this->getNodeById(0);

      foreach ($this->getAllNodes() as $node) {
        if (($node->getId() != 0) && (count($node->getPrerequisiteTasks()) == 0))
          $this->linkNodes($initialNode, $node);
       }
     }

    public function addFinalNode() {
    	$finalNode = new TaskNode(); 
      $finalNode->setId(999999999);
      $finalNode->setIdentifier("Final");
      $finalNode->setDurationTask(0);   

      foreach($this->getAllNodes() as $node) {
        if (count($node->getFollowingTasks()) == 0)
    	    $this->linkNodes($node, $finalNode);
       } 
     $this->nodes[$finalNode->getId()] = $finalNode;

    }
    
    function getAllNodes() {
    	return $this->nodes;
    }
    
    function linkNodes($previousNode, $newNode) {
      $newNode->addPrerequisiteTask($previousNode);
      $previousNode->addFollowingTask($newNode);
    }
    
  
    // DFS - forward
    // Provide the initial node
    function determineMinimumDuration($node) {
      if ($node->getIndentifier() == "Initial") {
        foreach ($node->getFollowingTasks() as $followingTask) {
        	$followingTask->setDurationMin($followingTask->getTaskDuration());
          $followingTask->setDurationMax($followingTask->getTaskDuration());

        	$this->determineMinimumDuration($followingTask);
        }
      } 
      else {
        if (count($node->getFollowingTasks() > 0)) {
      	  foreach ($node->getFollowingTasks() as $followingTask) {
      		  if($node->getIndentifier() == "Final") {
      			  if ($followingTask->getMinDuration() < $node->getMinDuration()) {
      			    $followingTask->setDurationMin($node->getMinDuration());
                $followingTask->setDurationMax($node->getMinDuration());
              }
      			  return;
      		  }
            if ($followingTask->getMinDuration() < ($node->getMinDuration() + $followingTask->getTaskDuration())) {
              $followingTask->setDurationMin($node->getMinDuration() + $followingTask->getTaskDuration());
              $followingTask->setDurationMax($node->getMinDuration() + $followingTask->getTaskDuration());

               $this->determineMinimumDuration($followingTask);

      	    } 
          }
      } 
    } 
  }  

    // DFS -- backward
    // Provide the final node 
    function determineMaximumDuration($node) {
      if ($node->getIndentifier() == "Final") {
      	foreach ($node->getPrerequisiteTasks() as $prerequisiteTask) {
      		$prerequisiteTask->setDurationMax($node->getMaxDuration());
      		$this->determineMaximumDuration($prerequisiteTask);
      	}
      } 
      else {
        if (count($node->getPrerequisiteTasks() > 0)) {
          foreach ($node->getPrerequisiteTasks() as $prerequisiteTask) {
        	  if ($node->getIndentifier() == "Initial")
              return;
        	  if ($prerequisiteTask->getMaxDuration() > ($node->getMaxDuration() - $node->getTaskDuration()) ) {
        		  $prerequisiteTask->setDurationMax($node->getMaxDuration() - $node->getTaskDuration());
        	    $this->determineMaximumDuration($prerequisiteTask);
            } 
          }
        }
      } 
    } 
  } 

?>