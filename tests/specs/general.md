
# Spécification générale de l'outil

L'outil se base sur le pattern MVC.
* la partie modèle sera essentiellement l'accès à la base de données,
* la partie contrôleur contiendra tous les traitements à faire,
* la partie vue sera ce que verra l'utilisateur, et sa possibilité d'interaction.


## Organisation des fichiers

Afin de bien structurer l'outil, plusieurs sous-dossiers doivent être présents :
* model,
* view,
* controller,
* assets -> contiendra tous les fichiers utiles, images, scripts, feuilles de styles CSS.

Idéalement, les vues seront composées de deux ou plus pages HTML. Typiquement, la structure
générale d'une page peut être défini dans un fichier, dans lequel sera inclue la partie changeante
en fonction des pages désirées.


## Structure et objet

Pour une bonne communication, et une bonne intégration, le nom des variables d'inclusion de pages,
ainsi que celles qui contiendront les données, doivent être définies pour chaque nouvelle vue.
Ce sera les tests d'intégration.
Mais il y a des variables qui seront communes, par exemple le nom de la page, son identifiant, etc...

Pour cela, nous définissons un objet de type Context, qui contiendra les variables et les méthodes
pratiques pour une communication adéquate.

Cette classe Context devra permettre de récupérer et modifier l'adresse de la vue à afficher,
le titre de la page, l'identifiant de la page, etc... voir le fichier correspondant pour plus de détails.

## Aide

Dans la barre de navigation va se trouver un bouton "Help" qui renvoie vers une nouvelle page.  Sur cette page va s'afficher beaucoup d'astuces, définitions, etc.  Ce bouton (dans le même style que les liens qui renvoie vers les pages des sprints, user story, etc.) est accessible à tout moment pour aider les utilisateurs à comprendre le processus scrum. 

## Descriptions

Également, sur chaque page (Sprint, User Story, etc.) un petit bouton (un 'i' encadré) va se trouver à côté du titre des pages.  En appuyant sur le bouton, un petit récapitulatif va s'afficher.  Exemple: Sur la page "Sprint", à côté du header, si on appuie sur le 'i' encadré un texte comme celui suivant va s'afficher... "A sprint is a...".  

On va rajouter une colonne dans les vues des toutes les tables suivantes: User Story, Sprint, Task.  Dans cette colonne va s'afficher le même 'i' encadré d'au dessus.  En appuyant sur le bouton, la déscription du/de la (tâche, sprint, user story) va s'afficher.

Dans les deux cas au dessus, appuyant sur le 'i' encadré lance un Bootstrap Popover.  