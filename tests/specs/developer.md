
## Accès à la gestion des développeurs

Afin que le site soit redirigé vers la gestion des développeurs, une variable d'URL
est définie. Cette variable est 'dev'.


## Interface des développeurs

Les différentes vues pour la gestion des développeurs sont :
* ajout/modification,
* suppression,
* feuille de détails d'un développeur.

Les développeurs sont preséntés sous forme de tableau.


L'ajout et la modification nécessite un formulaire.  Le même formulaire 
va être utilisé pour les deux fonctions.  Si on veut ajouter un nouvel
développeur, on appuie sur le bouton "Add a team member" (ou un bouton avec
un nom comme çela).  Si on veut modifier les détails d'un développeur, en 
appuyant sur un bouton à côté du nom du développeur "Modify details" on est dirigé vers le
même formulaire avec un GET (qui récupère les données du dév) 
où les détails du développeur vont s'afficher automatiquement 
dans les champs du formulaire.  Ainsi, on fait un "Update" et mettre à jour 
la BDD.  

Un champs caché dans le formulaire, "dev_type_post" est affecté "update"
si arrive sur la page avec on get (i.e. après avoir appuyé sur "modify details").
Çela indique qu'on va modifier les champs d'un développeur déjà présent dans la BDD.
Sinon, le champs est affecté "add", qui indique qu'on va ajouter un nouvel
développeur.  

Le côté serveur, selon la valeur de "dev_type_post", va soit ajouté le nouvel 
développeur soit mettre à jour les détails d'un développeur déjà présent dans la BDD.  


### Champs HTML pour l'ajout / modification

Les champs pour l'ajout/modification d'un développeur sont :

* dev_form_name -> identifiant du développeur (requis),
* dev_form_email -> email du développeur (requis),
* dev_form_id -> champs caché, le ID du dév (non-requis, affecté uniquement en cas du GET [afin de modifier les détails])
* dev_type_post -> champs caché, déterminé par (requis)


Ces variables sont passées par formulaire, en POST.


### Visualisation d

La vue doit rajouter dans l'URL 'id=' et l'id du dév.


### Suppression

Pour la suppression, une variable 'del' est définie dans l'URL, suivie 
de l'id du développeur à supprimer (ceci ne nécessite pas de formulaire).


### Communication vue/contrôleur

Via le context, la vue et le contrôleur peuvent communiquer.
La vue se chargeant du listage, doit recevoir une liste de développeurs, celles s'occupant
de la modification ou l'affichage d'un développeur, doivent en recevoir une seule.
