
## Accès à la gestion des sprints

Afin que le site soit redirigé vers la gestion des sprints, une variable d'URL
est définie. Cette variable est 'sprints'.


## Interface des sprints

Les différentes vues pour la gestion des sprints sont :
* ajout,
* modification,
* suppression,
* feuille de détails d'un sprint.


### Lister les sprints
Les sprints sont preséntées sous forme de tableau.
on affichera que l'identifiant et la durée des sprints dans le tableau.
chaque ligne aura comme name l'id du sprint


L'ajout et la modification nécessite un formulaire.


### Champs HTML pour l'ajout

Pour aller sur la vue d'ajout d'un sprint, 'add' doit être défini dans l'URL.

Les champs pour l'ajout d'un sprint sont :

* new_sprint_identifier -> identifiant du sprint (requis),
* new_sprint_duration -> durée du sprint(requis),
* new_sprint_description -> commentaire 

### Champs HTML pour modification

Pour aller sur la vue de modification du sprint, 'edit' doit être défini dans l'URL
et doit valoir l'id du sprint à modifier.

Les champs pour la modification d'un sprint sont :

* edit_sprint_id-> id du sprint (requis),
* edit_sprint_identifier-> identifiant du sprint (requis),
* edit_sprint_duration -> durée du sprint(requis),
* edit_sprint_description -> commentaire 

Ces variables sont passées par formulaire, en POST.


### Champs HTML pour la visualisation d'un sprint 

Pour visualiser un sprint, 'view' doit être définie dans l'URL et doit valoir
l'id du sprint souhaité.

### Suppression

Pour la suppression, une variable 'del' est définie dans l'URL, suivie 
de l'id du sprint à supprimer (ceci ne nécessite pas de formulaire).


### Communication vue/contrôleur

Via le context, la vue et le contrôleur peuvent communiquer.
La vue se chargeant du listage, doit recevoir une liste de sprints, celles s'occupant
de la modification ou l'affichage d'un sprint, doivent en recevoir une seule.

### Kanban
Le kanban s'affiche sur la vue d'un sprint.  Il s'agit d'une table avec quatres colonnes: "Task", "To Do", "In Progress", et "Completed".  Tous les détails importants des tâches du sprint s'affichent en dessous de la colonne "Task": le titre de la tâche, le développeur auquel la tâche est affectée, etc.  Selon l'état actuel de la tâche, une image (un 'X' rouge dans la colonne "To Do", une clé à molette dans la colonne "In Progress", ou un check vert dans la colonne "Completed") dans la colonne pertinente.  

Chaque rang a un bouton qui dirige l'utilisateur vers la vue de la tâche pertinente.  


###GANTT
Pour aller sur la vue du diagramme de Gantt, il faudra appuyer  sur le bouton "Generate GANTT Diagram" sur la page d'un sprint.
'gantt' doit être défini dans l'URL et doit valoir l'id du sprint.
le diagramme sera représenter par un tableau. 
le controleur devra envoyé un tableau 'duration' qui contiendra les heures travaillés sur le sprint par exemple array(1,2,3,4,5,6,7)
ainsi que un tableau 'developers' qui contiendra des tableaux, chaque tableau contiendra le nom + prénom développeur et les identifier des tâches qu'il lui sont affectées
par exemple
array (
    array('Amira Touati', 'spa', 'cc', 'cc', 'tc', 'tc'),
    array('tristan Campbell', 'sp', 'vc', 'vc', 'vd', 'vd'),
    array('raphael jorel', 'sp', 'bdd', 'cd', 'cd', 'td')
)

### PERT

Le diagramme de PERT sera généré automatiquement quand l'utilisateur appuie sur le bouton "Generate PERT Diagram" sur la page d'un sprint.  En appuyant sur le bouton on est renvoyé vers une nouvelle page en passant l'indentifiant du sprint comme paramètre.  Ou utilise l'identifiant du sprint pour générer le digramme sur la nouvelle page.  

Une class de noeuds représent une tâche dans le diagramme de PERT.  Chaque noued est composé des champs suivants: "identifier", "max_duration", "min_duration", et "duration_task" aussi bien que les deux listes "prerequisite_tasks" et "following_tasks".  

Pour l'affichage, une bibliothèque externe pourrait être utiliser, telle Graphviz et son binding PHP avec PEAR.
Cette bibliothèque permet de créer des images, donc il faudra un fichier particulier dans lequel afficher l'image et
l'inclure dans le site web.
