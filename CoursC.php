<?php

include '../config.php';
include '../model/Cours.php'; 

class CoursC
{
    function addCours($cours)
    {
        $sql = "INSERT INTO cours (idc, nom, niveau, description, matiere_id) VALUES (:idc, :nom, :niveau, :description, :matiere_id)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idc' => $cours->getIdC(),
                'nom' => $cours->getNom(),
                'niveau' => $cours->getNiveau(),
                'description' => $cours->getDescription(),
                'matiere_id' => $cours->getMatiereId()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCours($cours, $id)
    {
        $sql = "UPDATE cours SET nom = :nom, niveau = :niveau, description = :description, matiere_id = :matiere_id WHERE idc = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'nom' => $cours->getNom(),
                'niveau' => $cours->getNiveau(),
                'description' => $cours->getDescription(),
                'matiere_id' => $cours->getMatiereId()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleteCours($idc)
    {
        $sql = "DELETE FROM cours WHERE idc = :idc";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindParam(':idc', $idc);

        try {
            $query->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function listCours()
    {
        $sql = "SELECT * FROM cours";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $cours = $query->fetchAll(PDO::FETCH_ASSOC);
            return $cours;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showCours($id)
    {
        $sql = "SELECT * FROM cours WHERE idc = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id', $id);
            $query->execute(); 
            $cours = $query->fetch(PDO::FETCH_ASSOC); 
            return $cours; 
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false; 
        }
    }
    
}
?>
