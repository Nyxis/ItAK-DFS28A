# Programmation orientée objet - Php/Python

Dans le but d'animer une soirée de JdR, un Game Master emmène un ensemble de matériel pour gérer les tirages aléatoires conséquents aux choix des joueurs.

À chaque action, le Game Master choisira au hasard l'un des éléments en sa possession pour tirer la valeur.
Cette valeur pourra être une réussite, un échec, une réussite critique ou un fumble. Selon l'action, le taux de réussite, de critique et de fumble sera variable.

1/ Modéliser une classe qui représente un résultat de tirage aléatoire.

2/ Modéliser un comportement correspondant au tirage de ces valeurs aléatoires.

3/ Le GM a à sa disposition 3 types de matériels. Créez et implémentez les classes correspondantes en Php, en utilisant le comportement créé précédemment.
 - le dé : il peut être créé avec un nombre de face. Il génère une valeur correspondante à l'une de ses faces lors du tirage
 - une pièce : elle ne peut renvoyer que deux valeurs, mais est dépendante d'un nombre de lancés : la génération ne renverra 1 que si les x lancés valent 1 (tips: utilisez une fonction récursive)
 - un deck de cartes : il est dépendant d'un nombre de couleurs et de valeurs, sa méthode de génération renvoie une valeur entre 1 et nombre couleurs * nombres valeurs, après deux tirages le premier sur la couleur, le second sur la valeur.

4/ Créez maintenant la méthode de tirage aléatoire pour chacun des éléments précédents. Selon l'élément, le statut du lancé doit être calculé à partir du résultat de la fonction aléatoire.

5/ Créez maintenant une classe GameMaster.
 - Un GameMaster dispose d'un nombre de dés conséquents de différents types, de deux decks de cartes l'un de trois couleurs de et 18 valeurs, le deuxième de 4 couleurs de 13 valeurs, et de deux pièces.
 - un GameMaster peut effectuer des tirages via la méthode `pleaseGiveMeACrit`. Le GameMaster sélectionne l'une des instances de Dice / Deck et Coin au hasard et renvoie une constante correspondant au type de résultat. Les valeurs de succès / critique / fumble sont pour le moment fixées à 40% / 15% / 5%.

5/ Afin d'observer l'exécution de votre programme, proposez une implémentation d'une classe et d'une ou plusieurs méthodes pour écrire des messages dans la ligne de commande depuis vos classes, au lieu d'utiliser directement `echo` ou `var_dump`. L'implémentation devra permettre de choisir le comportement adéquat en fonction du contexte.
Proposition : une fonction `log(string $message) : void` doit être ajoutée à chacune des classes.
Attention : vous devez trouver un moyen d'utiliser cette classe dans vos objets sans pour autant le passer en paramètre à la construction.

6/ Améliorez votre fichier d'amorçage (`main.php`) pour qu'il prenne en paramètre les taux de succès / critique / fumble pour cette exécution, et qu'il renvoie le résultat du lancer en code de retour.
