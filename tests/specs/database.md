
# Spécification des tables et de la classe Database

La classe Database gère les accès à la base de données. Elle comportera
donc des méthodes pour récupérer ou modifier des données dedans. Cette classe
sera donc étoffée au fur et à mesure de l'avancement du projet.



## UserStories
### Table

Nom: UserStories
Champs:
* usId -> int (identifiant unique en base de données)   [obligatoire]
* usIdentifier -> string (identifiant pour le backlog), [obligatoire]
* usSummary -> string (courte summription de l'US), [obligatoire]
* usPriority -> int (priorité de l'US),
* usDifficulty -> int (diffulté de l'US),
* usState -> string (état d'avancement de l'US),
* usDuration -> int (temps effectif en hj pour achever la tâches)
* usDescription -> text (summription et commentaire de l'US).

### Méthodes

* getUserStories()
* getUserStory(id)
* addUserStory(identifier, summ, prio, diff, desc)
* updateUserStory(id, identifier, summ, prio, diff, desc)
* delUserStory(id)

* setUserStoryState(id, state)
* setUserStoryDuration(id, dur)


## Tâches
### Table

Nom: Tasks
Champs:
* taskId -> int,                [obligatoire]
* taskIdentifier -> string,     [obligatoire]
* taskSummary -> string,    [obligatoire]
* taskExpectedDuration -> int (nombre d'hj attendu pour la tâche)
* taskDuration -> int (nombre d'hj réel)
* taskState -> state,
* taskDescription -> text,
* devId -> int (id du developpeur chargé de la tâche).

### Méthodes

* getTasks()
* getTask(id)
* addTask(identifier, summ, expDur, desc)
* updateTask(id, identifier, summ, expDur, desc)
* delTask(id)

* setTaskState(id, state)
* setTaskDuration(id, dur)


## Sprints
### Tables

Nom: Sprints
Champs:
* sprintId -> int,              [obligatoire]
* sprintIdentifier -> string    [obligatoire],
* sprintDuration -> int (nombre de jours pour un sprint) [obligatoire],
* sprintState -> state,
* sprintDescription.

### Méthodes

* getSprints()
* getSprint(id)
* addSprint(identifier, dur, desc)
* updateSprint(id, identifier, dur, desc)
* delSprint(id)

* setSprintState(id, state)


## Développeurs
### Tables

Nom: Developers
Champs:
* devId -> int,             [obligatoire]
* devName -> string,        [obligatoire]
* devFirstName -> string,   [obligatoire]
* devDescription -> text.

### Méthodes

* getDeveloppers()
* getDevelopper(id)
* addDevelopper(name, fname, desc)
* updateDevelopper(id, name, fname, desc)
* delDevelopper(id)


## Association Tâches et Développeur

### Description

Pas besoin de table en plus, car le champs devId des tâches
est suffisant.

### Méthodes

* getDeveloppeurByTask(taskId)
* getTaskByDeveloppeur(devId)
* setDeveloppeurToTask(devId, taskId)
* removeTaskFromDeveloppeur(taskId)

### Remarques

La fonction de suppression ne sera pas très utile, car l'affectation d'un
nouveau développeur entrainera la suppression de l'ancien
dévellopeur associé.


## Association Tâches et US

### Description

Cette table fait la liaison entre tâches et US. Un US peut comporter plusieurs
tâches, mais il est possible qu'une tâche fasse partie de plusieurs US. Afin de ne
pas limiter l'utilisateur, nous permettons de cette manière une gestion souple des tâches.

### Table

Nom: TasksToUserStories
Champs:

* taskId
* usId

### Méthodes

* getTasksByUserstory(usId)
* getUserstoriesByTask(taskId)
* addTaskToUserstory(usId, taskId)
* removeTaskFromUserstory(usId, taskId)


## Association Sprints et US

### Description

Cette table fait la liaison entre sprints et US. Elle permet d'affecter plusieurs
US à un ou plusieurs sprints. Ceci se révélera surement nécessaire, si un US se déroule
sur plusieurs sprints. L'idée est de contraindre le moins possible l'utilisateur.

### Table

Nom: UserStoriesToSprints
Champs:

* sprintId
* usId

### Méthodes

* getUserstoriesBySprint(sprintId)
* getSprintsByUserstories(usId)
* addUserstoryToSprint(sprintId, usId)
* removeUserstoryFromSprint(sprintId, usId)
