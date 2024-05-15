<?php

class Event
{
    private $idE;
    private $Nom;
    private $Responsable;
    private $Date;
    private $Location;
    private $img;
    private $category;

    // Getter and Setter for idE
    public function getIdE() {
        return $this->idE;
    }

    public function setIdE($idE) {
        $this->idE = $idE;
    }

    // Getter and Setter for Nom
    public function getNom() {
        return $this->Nom;
    }

    public function setNom($Nom) {
        $this->Nom = $Nom;
    }

        // Getter and Setter for Responsable
        public function getResponsable() {
            return $this->Responsable;
        }
        
    
        public function setResponsable($Responsable) {
            $this->Responsable = $Responsable;
        }

    // Getter and Setter for Date
    public function getDate() {
        return $this->Date;
    }

    public function setDate($Date) {
        $this->Date = $Date;
    }

    // Getter and Setter for Location
    public function getLocation() {
        return $this->Location;
    }

    public function setLocation($Location) {
        $this->Location = $Location;
    }



    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }



}


?>
