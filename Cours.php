<?php

class Cours {
   
    private $idc;
    private $nom;
    private $niveau;
    private $description;
    private $matiere_id;


    public function __construct($idc, $nom, $niveau, $description, $matiere_id) {
        $this->idc = $idc;
        $this->nom = $nom;
        $this->niveau = $niveau;
        $this->description = $description;
        $this->matiere_id = $matiere_id;
    }

  
    public function getIdc() {
        return $this->idc;
    }

    public function setIdc($idc) {
        $this->idc = $idc;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNiveau() {
        return $this->niveau;
    }

    public function setNiveau($niveau) {
        $this->niveau = $niveau;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getMatiereId() {
        return $this->matiere_id;
    }

    public function setMatiereId($matiere_id) {
        $this->matiere_id = $matiere_id;
    } 
}