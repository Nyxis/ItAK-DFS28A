# ItAK-DFS31C

Dépôt support aux rendus d'exercice pour la session DFS28C de l'IT-Akademy

Dans ce dépôt, vous trouverez les ressources utiles évoquées en cours ainsi que les consignes des différents exercices.

Chaque devoir à rendre devra se faire sur ce dépôt en utilisant une pull-request depuis un fork sur votre espace personnel.

## Sommaire des exercices

  - [POO - Php - Python](POO_Php_Python/README.md)
  - [Php - Design Patterns](Php_DesignPattern/README.md)

## Déposer son travail

1/ Effectuez un fork de ce dépôt en utilisant votre compte @it-students :
- Fork ⏷
- Create a new fork
Vous disposez maintenant de votre propre dépôt dans lequel vous pouvez déposer tout votre code.

2/ Clonez votre dépôt sur votre machine. Le protocole SSH est recommandé.
- <> Code ⏷
- SSH
- Copiez l'adresse git@github.com:xxxxxxxx/ItAK-DFSyyyyyy.git)

```shell
git clone -b main <url copiée>
cd <dossier créé>
git remote add upstream git@github.com:Nyxis/ItAK-DFS28C.git
```

3/ Effectuez les exercices

4/ Créez un commit avec vos modifications, puis envoyez le à votre dépôt.
```shell
git add .
git commit -m "<message de commit>"
git pull --rebase upstream main
# résolvez les éventuels conflits
git push origin main --force
```

5/ Dans votre dépôt, créez une Pull Request à partir de la branche que vous venez de déposer
- Pull Requests
- New Pull Request
- "compare accross forks"
- base repository : `Nyxis/ItAK-DFS28C` / base : `main` / head repository : `<votre fork>` / compare : `main`
- Create pull request
- Title : `Nom Prenom - Titre exercice`

