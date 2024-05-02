<?php
class Commande {
    private $id;
    private $nom;
    private $adresse;
    private $numTel;
    private $montant;
    private $produits;

    function __construct($nom, $adresse, $numTel, $montant, $produits) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->numTel = $numTel;
        $this->montant = $montant;
        $this->produits = $produits;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getNumTel() {
        return $this->numTel;
    }

    function getMontant() {
        return $this->montant;
    }

    function getProduits() {
        return $this->produits;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setAdresse($adresse): void {
        $this->adresse = $adresse;
    }

    function setNumTel($numTel): void {
        $this->numTel = $numTel;
    }

    function setMontant($montant): void {
        $this->montant = $montant;
    }

    function setProduits($produits): void {
        $this->produits = $produits;
    }
}
?>
