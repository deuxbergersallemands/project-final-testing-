
# Spécification des tables et de la classe Database

La classe Database gère les accès à la base de données. Elle comportera
donc des méthodes pour récupérer ou modifier des données dedans. Cette classe
sera donc étoffée au fur et à mesure de l'avancement du projet.



## UserStories
### Table

Nom: UserStories
Champs:
<<<<<<< HEAD
* usId -> int (identifiant unique en base de données)
* usIdentifier -> string (identifiant pour le backlog),
* usDescription -> string (courte description de l'US),
* usPriority -> int (priorité de l'US),
* usDifficulty -> int (diffulté de l'US),
* usState -> int (état d'avancement de l'US),
* usComment -> text (description et commentaire de l'US).
=======
* usId -> int (identifiant unique en base de données)   [obligatoire]
* usIdentifier -> string (identifiant pour le backlog), [obligatoire]
* usSummary -> string (courte summription de l'US), [obligatoire]
* usPriority -> int (priorité de l'US),
* usDifficulty -> int (diffulté de l'US),
* usState -> string (état d'avancement de l'US),
* usDuration -> int (temps effectif en hj pour achever la tâches)
* usDescription -> text (summription et commentaire de l'US).
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0

### Méthodes

* getUserStories()
* getUserStory(id)
<<<<<<< HEAD
* addUserStory(identifier, desc)
* updateUserStory(id, identifier, desc)
* delUserStory(id)

* setUserStoryComment(id, desc)
* setUserStoryPriority(id, prio)
* setUserStoryDifficulty(id, diff)
=======
* addUserStory(identifier, summ, prio, diff, desc)
* updateUserStory(id, identifier, summ, prio, diff, desc)
* delUserStory(id)

* setUserStoryState(id, state)
* setUserStoryDuration(id, dur)
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0


## Tâches
### Table

Nom: Tasks
Champs:
<<<<<<< HEAD
* taskId -> int,
* taskIdentifier -> string
* taskDescription -> string,
* taskState -> int,
* taskComment -> text.
=======
* taskId -> int,                [obligatoire]
* taskIdentifier -> string,     [obligatoire]
* taskSummary -> string,    [obligatoire]
* taskExpectedDuration -> int (nombre d'hj attendu pour la tâche)
* taskDuration -> int (nombre d'hj réel)
* taskState -> state,
* taskDescription -> text,
* devId -> int (id du developpeur chargé de la tâche).
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0

### Méthodes

* getTasks()
* getTask(id)
<<<<<<< HEAD
* addTask(identifier, desc)
* updateTask(id, identifier, desc)
* delTask(id)

* setTaskComment(id, desc)
=======
* addTask(identifier, summ, expDur, desc)
* updateTask(id, identifier, summ, expDur, desc)
* delTask(id)

* setTaskState(id, state)
* setTaskDuration(id, dur)
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0


## Sprints
### Tables

Nom: Sprints
Champs:
<<<<<<< HEAD
* sprintId -> int,
* sprintName -> string,
* sprintDuration -> int (nom de jours pour un sprint),
* sprintState -> int,
* sprintComment.
=======
* sprintId -> int,              [obligatoire]
* sprintIdentifier -> string    [obligatoire],
* sprintDuration -> int (nombre de jours pour un sprint) [obligatoire],
* sprintState -> state,
* sprintDescription.
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0

### Méthodes

* getSprints()
* getSprint(id)
<<<<<<< HEAD
* addSprint(identifier, desc)
* updateSprint(id, identifier, desc)
* delSprint(id)

* setSprintComment(id, desc)
=======
* addSprint(identifier, dur, desc)
* updateSprint(id, identifier, dur, desc)
* delSprint(id)

* setSprintState(id, state)
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0


## Développeurs
### Tables

Nom: Developers
Champs:
<<<<<<< HEAD
* devId -> int,
* devName -> string,
* devFirstName -> string,
* devComment -> text.
=======
* devId -> int,             [obligatoire]
* devName -> string,        [obligatoire]
* devFirstName -> string,   [obligatoire]
* devDescription -> text.
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0

### Méthodes

* getDeveloppers()
* getDevelopper(id)
<<<<<<< HEAD
* addDevelopper(name, fname)
* updateDevelopper(id, name, fname)
* delDevelopper(id)

* setDevelopperComment(id, desc)
=======
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
>>>>>>> 9bdde0c43bca4bbeef3da6557490abee327507b0
