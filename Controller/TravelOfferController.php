<?php
require_once __DIR__ . '/../Model/TravelOffer.php';;

class TravelOfferController {
    public function showTravelOffer($offer) {
        echo "<div class='offer-details'>
                <h3>{$offer->getTitre()}</h3>
                <p>Destination : {$offer->getDestination()}</p>
                <p>Dates : {$offer->getDateDepart()->format('d/m/Y')} - 
                          {$offer->getDateRetour()->format('d/m/Y')}</p>
                <p>Prix : {$offer->getPrix()} €</p>
                <p>Catégorie : {$offer->getCategorie()}</p>
              </div>";
    }
}
?>