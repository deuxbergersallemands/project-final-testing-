
# Spécification des tables et de la classe Database

La classe Database gère les accès à la base de données. Elle comportera
donc des méthodes pour récupérer ou modifier des données dedans. Cette classe
sera donc étoffée au fur et à mesure de l'avancement du projet.



## UserStories
### Table

Nom: UserStories
Champs:
* usId -> int (identifiant unique en base de données)
* usIdentifier -> string (identifiant pour le backlog),
* usDescription -> string (courte description de l'US),
* usPriority -> int (priorité de l'US),
* usDifficulty -> int (diffulté de l'US),
* usState -> int (état d'avancement de l'US),
* usComment -> text (description et commentaire de l'US).

### Méthodes

* getUserStories()
* getUserStory(id)
* addUserStory(identifier, desc)
* updateUserStory(id, identifier, desc)
* delUserStory(id)

* setUserStoryComment(id, desc)
* setUserStoryPriority(id, prio)
* setUserStoryDifficulty(id, diff)


## Tâches
### Table

Nom: Tasks
Champs:
* taskId -> int,
* taskIdentifier -> string
* taskDescription -> string,
* taskState -> int,
* taskComment -> text.

### Méthodes

* getTasks()
* getTask(id)
* addTask(identifier, desc)
* updateTask(id, identifier, desc)
* delTask(id)

* setTaskComment(id, desc)


## Sprints
### Tables

Nom: Sprints
Champs:
* sprintId -> int,
* sprintName -> string,
* sprintDuration -> int (nom de jours pour un sprint),
* sprintState -> int,
* sprintComment.

### Méthodes

* getSprints()
* getSprint(id)
* addSprint(identifier, desc)
* updateSprint(id, identifier, desc)
* delSprint(id)

* setSprintComment(id, desc)


## Développeurs
### Tables

Noms: Developpers
Champs:
* devId -> int,
* devName -> string,
* devFirstName -> string,
* devComment -> text.

### Méthodes

* getDeveloppers()
* getDevelopper(id)
* addDevelopper(name, fname)
* updateDevelopper(id, name, fname)
* delDevelopper(id)

* setDevelopperComment(id, desc)
