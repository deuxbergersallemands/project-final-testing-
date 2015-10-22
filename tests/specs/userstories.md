
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

* edit_us_identifier -> identifiant de la user story (requis),
* edit_us_summary -> description de la user story (requis),
* edit_us_priority -> priorité de la user story ,
* edit_us_difficulty -> difficulté de la user story ,
* edit_us_description -> commentaire 

Ces variables sont passées par formulaire, en POST.


### Champs HTML pour la visualisation d'une user story

Pour visualiser une user story, 'view' doit être définie dans l'URL et doit valoir
l'id de la user story souhaitée. 
les champs pour la visualisation sont : 

* view_us_identifier -> identifiant de la user story (requis),
* view_us_summary -> description de la user story (requis),
* view_us_priority -> priorité de la user story ,
* view_us_difficulty -> difficulté de la user story ,
* view_us_State -> l'etat de la user story ,
* view_us_duration -> le temps de réalisation de la user story (s'affichera si la user story est validée)  ,
* view_us_description -> commentaire 

### Suppression

Pour la suppression, une variable 'del' est définie dans l'URL, suivie 
de l'id de la user story à supprimer (ceci ne nécessite pas de formulaire).


### Communication vue/contrôleur

Via le context, la vue et le contrôleur peuvent communiquer.
La vue se chargeant du listage, doit recevoir une liste de user stories, celles s'occupant
de la modification ou l'affichage d'une user story, doivent en recevoir une seule.
