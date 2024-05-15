<?php
class Category {
    private $idC;
    private $Titre;
    private $Description;
    private $Nbr_events;

    // Getters
    public function getIdC() {
        return $this->idC;
    }

    public function getTitre() {
        return $this->Titre;
    }

    public function getDescription() {
        return $this->Description;
    }

    public function getNbr_events() {
        return $this->Nbr_events;
    }

    // Setters
    public function setIdC($idC) {
        $this->idC = $idC;
    }

    public function setTitre($Titre) {
        $this->Titre = $Titre;
    }

    public function setDescription($Description) {
        $this->Description = $Description;
    }

    public function setNbr_events($Nbr_events) {
        $this->Nbr_events = $Nbr_events;
    }
}
?>
