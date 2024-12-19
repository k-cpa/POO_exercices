<?php 
    include ('Voiture.php');
    include ('pokedex.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PO</title>
</head>
<body>
    <?php 
        $zx = new Voiture();
    $zx->rouler(300);
    $zx->afficherTableauDeBord();
    $zx->allumerPhares();
    $zx->rouler(400);
    $zx->afficherTableauDeBord();
    $zx->faireLePlein();
    $zx->rouler(100);
    $zx->afficherTableauDeBord();

    echo "-------------------------------------------------------------------------------------------------------------------POKEMON--------------------------------------------------------------------------------------------------------------------------------------------------------</br>";

    $pikachu = new Pokemon('Pikachu', 15, 'electric', 100);
    $squirtle = new Pokemon('Squirtle', 30, 'water', 100);

    $pikachu->pokedex();
    $squirtle->pokedex();

    echo "--------------------ATTACK FUNCTION + DAMAGE RECAP--------------------</br>";
    $pikachu->attack($squirtle);
    echo "</br>---------------------------------------------------------------------------------------------</br>";
    $arena = new Arena($pikachu, $squirtle);
    $arena->fight();
    // reprendre en ajoutant un autre pokemon et tester une attaque

        
        // $zx->couleur = 'bleu';
        // $zx->nbPortes = 100;

        // Rappelle des CONSTRUCT fait dans Voiture.php -> Comme dans les include SCSS booy
        // $yaris = new Voiture('rouge', 5);
        // $yaris->couleur = 'rouge';
        // $yaris->nbPortes = 25;

        // echo "Ma voiture est de couleur " . $yaris->couleur . " et possède " . $yaris->nbPortes . " portes.";
        // echo $zx->couleur . '</br>' . $yaris->couleur;
        
        // $zx->setCouleur('rouge');
        
    ?>
</body>
</html>