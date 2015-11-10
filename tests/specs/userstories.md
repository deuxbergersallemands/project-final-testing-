
## Accès à la gestion des user stories

Afin que le site soit redirigé vers la gestion des tâches, une variable d'URL
est définie. Cette variable est 'userstories'.


## Interface des user stories

Les différentes vues pour la gestion des user stories sont :
* ajout,
* modification,
* suppression,
* feuille de détails d'une user story.


### Lister les user stories
Les user stories sont preséntées sous forme de tableau.
on affichera que l'identifiant et la description des user stories dans le tableau.
chaque ligne aura comme name l'id de la user story


L'ajout et la modification nécessite un formulaire.


### Champs HTML pour l'ajout

Pour aller sur la vue d'ajout d'une user story, 'add' doit être défini dans l'URL.

Les champs pour l'ajout d'une user story sont :

* new_us_identifier -> identifiant de la user story (requis),
* new_us_summary -> description de la user story (requis),
* new_us_priority -> priorité de la user story ,
* new_us_difficulty -> difficulté de la user story ,
* new_us_description -> commentaire 

### Champs HTML pour modification

Pour aller sur la vue de modification de la user story, 'edit' doit être défini dans l'URL
et doit valoir l'id de l'user story à modifier.

Les champs pour la modification d'une user story sont :

* edit_us_id -> id de la user story (requis),
* edit_us_identifier -> identifiant de la user story (requis),
* edit_us_summary -> description de la user story (requis),
* edit_us_priority -> priorité de la user story ,
* edit_us_difficulty -> difficulté de la user story ,
* edit_us_description -> commentaire 

Ces variables sont passées par formulaire, en POST.


### Visualisation d'une user story

Pour visualiser une user story, 'view' doit être définie dans l'URL et doit valoir
l'id de la user story souhaitée. 
les champs pour la visualisation sont : 

* view_us_identifier -> identifiant de la user story (requis),
* view_us_summary -> description de la user story (requis),
* view_us_priority -> priorité de la user story ,
* view_us_difficulty -> difficulté de la user story ,
* view_us_state -> l'etat de la user story ,
* view_us_duration -> le temps de réalisation de la user story (s'affichera si la user story est validée)  ,
* view_us_description -> commentaire

La description d'une US doit également faire apparaître les sprints et les tâches auxquelles elle
est rattachée.

### Suppression

Pour la suppression, une variable 'del' est définie dans l'URL, suivie 
de l'id de la user story à supprimer (ceci ne nécessite pas de formulaire).


### Communication vue/contrôleur

Via le context, la vue et le contrôleur peuvent communiquer.
La vue se chargeant du listage, doit recevoir une liste de user stories, celles s'occupant
de la modification ou l'affichage d'une user story, doivent en recevoir une seule.


### Validation de userstory

Pour qu'une US soit considérée comme validée, il faut que toutes les tâches qui lui sont
associées soient terminées. Si l'US n'a aucun tâche affectée, alors elle est considérée comme
non accompli.
Quand l'une de ses tâches est en cours de traitement, l'US est considérée également en cours
de traitement.
Cette partie est donc gérée automatiquement, l'état d'une US peut être visionné dans sa vue détaillée.

### Affectation de tâches.

Dans la vue de modificaiton d'un US, il est possible de lui affecter des tâches. Pour ce faire,
toutes les tâches doivent être listées, et disponibles sous la forme de cases à cocher.
Si une tâches est déjà affectée, il est évident que la case sera déjà cochée.

Le début des champs correspondants aux tâches sont de la forme

userstory_task_, suivi de l'id de la tâche. Il sera nécessaire de récupérer dans la variable $_POST
tous les champs commençant par cette expression, et extraire les ids des tâches assosiés.
