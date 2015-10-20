
# Spécification générale de l'outil

L'outil se base sur le pattern MVC.
    - la partie modèle sera essentiellement l'accès à la base de données,
    - la partie contrôleur contiendra tous les traitements à faire,
    - la partie vue sera ce que verra l'utilisateur, et sa possibilité d'interaction.


## Organisation des fichiers

Afin de bien structurer l'outil, plusieurs sous-dossiers doivent être présents :
    - model,
    - view,
    - controller,
    - assets -> contiendra tous les fichiers utiles, images, scripts, feuilles de styles CSS.
                - images,
                - css,
                - js,
                - ...

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
