<?php

include '../config.php';
include '../model/Matiere.php';

class MatiereC
{ 
    // Fonction pour ajouter une matière
    function addMatiere($matiere)
    {
        $sql = "INSERT INTO matieres (nom, niveau, description) VALUES (:nom, :niveau, :description)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $matiere->getNom(),
                'niveau' => $matiere->getNiveau(),
                'description' => $matiere->getDescription(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Fonction pour mettre à jour une matière
    function updateMatiere($matiere, $idm)
    {
        $sql = "UPDATE matieres SET nom = :nom, niveau = :niveau, description = :description WHERE idm = :idm";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idm' => $idm, //auto increment
                'nom' => $matiere->getNom(),
                'niveau' => $matiere->getNiveau(),
                'description' => $matiere->getDescription()
            ]);
    
            if ($query->rowCount() > 0) {
                header('Location: listMatiere.php');
                exit();
            } else {
                echo "No records were updated.";
            }
        } catch (PDOException $e) {
            echo 'Error updating matiere: ' . $e->getMessage();
        }
    }
    
    
    // Fonction pour supprimer une matière
    function deleteMatiere($idm)
    {
        $sql = "DELETE FROM matieres WHERE idm = :idm";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindParam(':idm', $idm);

        try {
            $query->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Fonction pour récupérer la liste des matières
    function listMatieres()
    {
        $sql = "SELECT * FROM matieres";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $matieres = $query->fetchAll(PDO::FETCH_ASSOC);
            return $matieres;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
   
    // Fonction pour afficher une matière
    function showMatiere($idm)
    {
        $sql = "SELECT * FROM matieres WHERE idm = :idm";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idm', $idm);
            $query->execute();
            $matiere = $query->fetch();
            return $matiere;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>