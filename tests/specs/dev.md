
## Accès à la gestion des développeurs

Afin que le site soit redirigé vers la gestion des développeurs, une variable d'URL
est définie. Cette variable est 'developpers'.


## Interface des développeurs

Les différentes fonctionnalité pour la gestion des développeurs sont :
* listage
* ajout,
* modification,
* suppression.


### Lister les développeurs
Les développeurs sont preséntés sous forme de tableau.
on affichera que le nom et prénom des développeurs dans le tableau.
chaque ligne aura comme name l'id du développeurs


L'ajout et la modification nécessite un formulaire.


### Champs HTML pour l'ajout

Pour aller sur la vue d'ajout d'un développeur, 'add' doit être défini dans l'URL.

Les champs pour l'ajout d'un développeur sont :

* new_dev_name -> prénom du développeur (requis),
* new_dev_first_name -> nom du développeur (requis) ,
* new_dev_description -> commentaire 

### Champs HTML pour modification

Pour aller sur la vue de modification du développeur, 'edit' doit être défini dans l'URL
et doit valoir l'id du développeur à modifier.

Les champs pour la modification d'un développeur sont :

* edit_dev_name -> prénom du développeur (requis),
* edit_dev_first_name -> nom du développeur (requis) ,
* edit_dev_description -> commentaire 

Ces variables sont passées par formulaire, en POST.

### Suppression

Pour la suppression, une variable 'del' est définie dans l'URL, suivie 
de l'id du développeur à supprimer (ceci ne nécessite pas de formulaire).


### Communication vue/contrôleur

Via le context, la vue et le contrôleur peuvent communiquer.
La vue se chargeant du listage, doit recevoir une liste de développeurs, celles s'occupant
de la modification ou l'affichage d'un développeur, doivent en recevoir une seule.
