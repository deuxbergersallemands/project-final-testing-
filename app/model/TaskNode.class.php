<?php

namespace model;

class TaskNode {
    public $id;
    public $identifier;
    public $durationMax;
    public $durationMin;
    public $durationTask;
    public $prerequisiteTasks;
    public $followingTasks;

    public function __construct() {
        $this->id = 0;
        $this->identifier = "";
        $this->durationMax = 0; // Inconnu à l'instantiation...
        $this->durationMin = 0;
        $this->durationTask = 0;
        $this->prerequisiteTasks =  array();
        $this->followingTasks = array();
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDurationMin($durMin) {
        $this->durationMin = $durMin;
    }
    function setIdentifier($id) {
        $this->identifier = $id;
    }

    function setDurationMax($durMax) {
        $this->durationMax = $durMax;
    }

    function setDurationTask($durTask) {
        $this->durationTask = $durTask;
    }

    function addPrerequisiteTask($task) {
        $prev = $this->getPrerequisiteTasks();
        array_push($prev, $task);
        $this->prerequisiteTasks = $prev;
    }

    function addFollowingTask($task) {
        $post = $this->followingTasks;
        array_push($post, $task);
        $this->followingTasks = $post;
    }

    function getId() {
        return $this->id;
    }

    function getIndentifier() {
        return $this->identifier;
    }

    function getPrerequisiteTasks() {
        return $this->prerequisiteTasks;
    }

    function getFollowingTasks() {
        return $this->followingTasks;
    }

    function getMaxDuration() {
        return $this->durationMax;
    }

    function getMinDuration() {
        return $this->durationMin;
    }

    function getTaskDuration() {
        return $this->durationTask;
    }
}
