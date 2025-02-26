<?php
require_once __DIR__ . '/Model/TravelOffer.php';
require_once __DIR__ . '/Controller/TravelOfferController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offer = new TravelOffer(
        uniqid(),
        $_POST['title'],
        $_POST['destination'],
        $_POST['departure'],
        $_POST['return'],
        $_POST['price'],
        $_POST['category']
    );

    echo "<h2>Debug var_dump :</h2>";
    var_dump($offer);

    echo "<h2>Affichage contrôlé :</h2>";
    $controller = new TravelOfferController();
    $controller->showTravelOffer($offer);
}
?>