<?php
namespace GameMaster;
include('Classe/De.php');
include('Classe/Piece.php');
include('Classe/DeckDeCartes.php');
include('Classe/GameMaster.php');

// PREPARER LE MATERIEL POUR GM
$lMaterielGM = [];
//Un GameMaster dispose d'un nombre de dés conséquents de différents types
$lNbrDeDes = rand(1,5);
//var_dump($lNbrDeDes);
$lTypesDes = [];
$i = 0;
while($i < $lNbrDeDes)
{
    //Choisir un nbr des faces de de a creer
    do 
    {
        $lFace = rand(1, 20);
    } 
    //Ne double pas les des de meme nombre de face
    while (array_search($lFace, $lTypesDes) != false);
    array_push($lTypesDes, $lFace);
    //Creer le nouveau de a l'ajouter au array du materiel du GM
    $lDeTemp = new De($lFace);
    array_push($lMaterielGM, $lDeTemp);
    $i++;
}
//Un GameMaster dispose de deux decks de cartes l'un de trois couleurs de et 18 valeurs, le deuxième de 4 couleurs de 13 valeurs
$deckCard1 = new DeckDeCartes(3, 18);
array_push($lMaterielGM, $deckCard1);
$deckCard2 = new DeckDeCartes(4, 13);
array_push($lMaterielGM, $deckCard2);
//Un GameMaster dispose de deux pièces.
$piece1 = new Piece();
array_push($lMaterielGM, $piece1);
$piece2 = new Piece(5);
array_push($lMaterielGM, $piece2);
//print_r($lMaterielGM);

// EXECUTER UNE TIRAGE
$lGameMaster = new GameMaster($lMaterielGM);
//echo "About to do giveMeACrit";
$lResultObjet = $lGameMaster -> pleaseGiveMeACrit();
$lResultString = $lResultObjet -> getResultatFinal();
echo $lResultString;