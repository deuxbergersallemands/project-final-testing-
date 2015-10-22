
## Accès à la gestion des tâches

Afin que le site soit redirigé vers la gestion des tâches, une variable d'URL
est définie. Cette variable est 'task'.


## Interface des tâches

Les différentes vues pour la gestion des tâches sont :
* ajout,
* modification,
* suppression,
* feuille de détails d'une tâche.

Les tâches sont preséntées sous forme de tableau.


L'ajout et la modification nécessite un formulaire.


### Champs HTML pour l'ajout / modification

Les champs pour l'ajout d'une tâche sont :

* new_task_identifier -> identifiant de la tâche (requis),
* new_task_summary -> description courte de la tâche (requis),
* new_task_expected_duration -> temps attendu (en hj) pour la tâche,
* new_task_description -> description et commentaire.


Les champs pour la modification d'une tâche sont :

* edit_task_id -> id de la tâche (requis),
* edit_task_identifier -> identifiant de la tâche (requis),
* edit_task_summary -> description courte de la tâche (requis),
* edit_task_expected_duration -> temps attendu (en hj) pour la tâche,
* edit_task_description.

Ces variables sont passées par formulaire, en POST.


### Visualisation d'une tâche

La vue doit rajouter dans l'URL 'id=' et l'id de la tâche à utiliser.


### Suppression

Pour la suppression, une variable 'del' est définie dans l'URL, suivie 
de l'id de la tâche à supprimer (ceci ne nécessite pas de formulaire).


### Pour les autres valeurs (plus tard)

Il sera possible ensuite de mettre le temps effectif qu'a duré la tâche,
un tout petit formulaire sur la page de visualisation de la tâche est souhaitable.
Le champs destiné sera 'set_task_duration'.

De même, il sera possible d'avoir plusieurs état pour une tâche. Un formulaire
avec un champs de nom 'set_task_state' sera présent.

Pour permettre une meilleure compréhension de la tâche, l'utilisateur doit aussi
pouvoir rajouter une description, ceci se fera grâce à un formulaire et un champs
'set_task_comment'


### Communication vue/contrôleur

Via le context, la vue et le contrôleur peuvent communiquer.
La vue se chargeant du listage, doit recevoir une liste de tâches, celles s'occupant
de la modification ou l'affichage d'une tâche, doivent en recevoir une seule.
