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

6/ Afin d'observer l'exécution de votre programme, proposez une implémentation d'une classe et d'une ou plusieurs méthodes pour écrire des messages dans la ligne de commande depuis vos classes, au lieu d'utiliser directement `echo` ou `var_dump`. L'implémentation devra permettre de choisir le comportement adéquat en fonction du contexte.
Proposition : une fonction `log(string $message) : void` doit être ajoutée à chacune des classes.
Attention : vous devez trouver un moyen d'utiliser cette classe dans vos objets sans pour autant le passer en paramètre à la construction.

7/ Améliorez votre fichier d'amorçage (`main.php`) pour qu'il prenne en paramètre les taux de succès / critique / fumble pour cette exécution, et qu'il renvoie le résultat du lancer en code de retour.
```php
// main.php

[$_, $arg1, $arg2, $arg3, ...$others] = /* .... */;

return $code;
```

Lors de parties de jeux de rôle, les tirages qu'effectuent le GameMaster sont dépendants d'un contexte : une action peut-être plus ou moins difficile et un attribut du personnage plus ou moins efficace pour cette action.
Nous allons maintenant modéliser ce contexte dans une application en Python.

8/ Modélisez et implémentez une classe Personnage qui dispose de statistiques de base (Force / Rapidité / Intelligence / Vitalité). Il sera également d'une classe (Guerrier / Archer / Magicien), et possèdera un ou plusieurs équipements. La classe et les équipements seront des modificateurs pour les statistiques de base. Implémentez une méthode qui donne les valeurs de chacune des statistiques du Personnage.

9/ Modélisez une classe Rencontre qui représente une étape du scénario. Chaque rencontre a 4 issues (Critique / Succès / Echec / Fumble) avec un taux de base associé à chaque issue. La Rencontre disposera également de modificateurs sur ces taux, basés sur les statistique du Personnage qui tentera cette Rencontre (exemple : Rapidité à 5 ou mois, +5% de fumble / Force à 10 ou plus, +5% de critique). Une Rencontre a enfin une perte de vitalité de base et un équipement bonus en cas de réussite critique.
Implémentez une méthode qui donne les taux de Critique / Succès / Echec / Fumble en prenant un Personnage en paramètre.

10/ Modélisez le comportement d'un GameMaster (`pleaseGiveMeACrit`), puis implémentez ce comportement en utilisant votre script Php.
Tips :

```python
import subprocess

result = subprocess.run([.....], capture_output=True, text=True)
```

11/ Créez la classe Scenario qui référence une liste de Rencontres. Le Scénario se lance en prenant en paramètre un Personnage et un GameMaster.
Chaque Rencontre est proposée au hasard parmi celles qui n'ont pas encore été terminées. Après calcul des taux de chaque issues, elles sont ensuite envoyées au GameMaster qui va faire le tirage du résultat.
Chaque Rencontre va modifier le Personnage en fonction de l'issue :
- Fumble : perte de vitalité doublée
- Echec : perte de vitalité
- Succès : gain de vitalité + la rencontre sort de la liste des Rencontres du Scénario
- Critique : gain de vitalité + le Personnage gagne l'équipement de la rencontre + la rencontre sort de la liste des Rencontres du Scénario
Le scénario se termine dans deux cas : le personnage n'a plus de Vitalité ou toutes les rencontres ont été effectuées avec succès.
