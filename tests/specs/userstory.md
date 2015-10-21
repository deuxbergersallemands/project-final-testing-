
## Accès à la gestion des User Story

Afin que le site soit redirigé vers la gestion des User Story, une variable d'URL
est définie. Cette variable est 'user_story'.


## Interface des User Story

Les différentes vues pour la gestion des User Story sont :
* ajout/modification,
* suppression,
* feuille de détails d'une User Story.

Les User Story sont preséntés sous forme de tableau.


L'ajout et la modification nécessite un formulaire.  Le même formulaire 
va être utilisé pour les deux fonctions.  Si on veut ajouter une nouvelle
User Story, on appuie sur le bouton "Add User Story" (ou un bouton avec
un nom comme çela).  Si on veut modifier les détails d'une User Story déjà établie, en 
appuyant sur un bouton à côté du nom de la User Story "Modify details" on est dirigé vers le
même formulaire avec un GET (qui récupère les données de la User Story) 
où les détails de la User Story vont s'afficher automatiquement 
dans les champs du formulaire.  Ainsi, on fait un "Update" et mettre à jour 
la User Story dans la BDD.  

Un champs caché dans le formulaire, "user_story_type_post" est affecté "update"
si arrive sur la page avec on get (i.e. après avoir appuyé sur "modify details").
Çela indique qu'on va modifier les champs d'une User Story déjà présente dans la BDD.
Sinon, le champs est affecté "add", qui indique qu'on va ajouter une nouvelle
User Story.  

Le côté serveur, selon la valeur de "user_story_type_post", va soit ajouté la nouvelle 
User Story à la BDD soit mettre à jour les détails d'une User Story déjà présente dans la BDD.  

### Champs HTML pour l'ajout / modification

Les champs pour l'ajout/modification d'un développeur sont :

* user_story_form_identifiant ->  identifiant pour le backlog (requis),
* user_story_form_summary -> Description courte de l'US (requis),
* user_story_form_state -> L'état d'avancement de l'US (requis),
* user_story_form_priority -> La priorité de la US,
* user_story_form_difficulty -> La difficulté de l'US,
* user_story_form_description -> Description de l'US, 
* user_story_form_id -> champs caché, le ID de la US (non-requis, affecté uniquement en cas du GET [afin de modifier les détails])
* user_story_duration -> **** Nom à changer ("remaining_effort" peut-être) - temps effectif en hj,
* user_story_type_post -> (requis)


Ces variables sont passées par formulaire, en POST.


### Visualisation des US

La vue doit rajouter dans l'URL 'id=' et l'id de l'US.


### Suppression

Pour la suppression, une variable 'del' est définie dans l'URL, suivie 
de l'id de l'US à supprimer (ceci ne nécessite pas de formulaire).


### Communication vue/contrôleur

Via le context, la vue et le contrôleur peuvent communiquer.
La vue se chargeant du listage, doit recevoir une liste des US, celles s'occupant
de la modification ou l'affichage d'une US, doivent en recevoir une seule.
