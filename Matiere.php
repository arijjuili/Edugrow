<?php


class Matiere
{
    private $idm;
    private $nom;
    private $niveau;
    private $description;

    public function __construct($idm, $nom, $niveau, $description)
    {
        $this->idm = $idm;
        $this->nom = $nom;
        $this->niveau = $niveau;
        $this->description = $description;
    }

    public function getIdm()
    {
        return $this->idm;
    }

    public function setIdm($idm)
    {
        $this->idm = $idm;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }

    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}
?>
