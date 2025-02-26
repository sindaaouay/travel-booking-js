<?php
class TravelOffer {
    private $id;
    private $titre;
    private $destination;
    private $date_depart;
    private $date_retour;
    private $prix;
    private $disponible;
    private $categorie;

    public function __construct($id, $titre, $destination, $date_depart, $date_retour, $prix, $categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->destination = $destination;
        $this->date_depart = new DateTime($date_depart);
        $this->date_retour = new DateTime($date_retour);
        $this->prix = (float)$prix;
        $this->disponible = true;
        $this->categorie = $categorie;
    }

    public function show() {
        echo "<table border='1'>
                <tr>
                    <th>Titre</th>
                    <th>Destination</th>
                    <th>Date Départ</th>
                    <th>Date Retour</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                </tr>
                <tr>
                    <td>{$this->titre}</td>
                    <td>{$this->destination}</td>
                    <td>{$this->date_depart->format('d/m/Y')}</td>
                    <td>{$this->date_retour->format('d/m/Y')}</td>
                    <td>{$this->prix} €</td>
                    <td>{$this->categorie}</td>
                </tr>
              </table>";
    }

    // Getters
    public function getId() { return $this->id; }
    public function getTitre() { return $this->titre; }
    public function getDestination() { return $this->destination; }
    public function getDateDepart() {
        return $this->date_depart;
    }

    public function getDateRetour() {
        return $this->date_retour;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getCategorie() {
        return $this->categorie;
    }
}
?>