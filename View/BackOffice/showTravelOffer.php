<?php require_once '../../Model/TravelOffer.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Afficher Offre</title>
</head>
<body>
    <?php
    // Création d'une offre test
    $offer = new TravelOffer(
        1,
        "Week-end romantique à Paris",
        "Paris",
        "2024-02-14",
        "2024-02-16",
        299.99,
        "Couples' Trips"
    );
    
    echo "<h2>Debug avec var_dump :</h2>";
    var_dump($offer);
    
    echo "<h2>Affichage avec show() :</h2>";
    $offer->show();
    ?>
</body>
</html>