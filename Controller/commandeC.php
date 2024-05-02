<?php
include_once("../../config.php");
include("../../Model/commande.php");

class CommandeC {
    function ajouterCommande($commande) {
        $sql = "INSERT INTO commande (nom, adresse, numTel, montant, produits) 
                VALUES (:nom, :adresse, :numTel, :montant, :produits)";
        $db = new config();
        $conn = $db->getConnexion();
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'nom' => $commande->getNom(),
                'adresse' => $commande->getAdresse(),
                'numTel' => $commande->getNumTel(),
                'montant' => $commande->getMontant(),
                'produits' => $commande->getProduits()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherCommande() {
        $sql = "SELECT * FROM commande";
        $conn = new config();
        $db = $conn->getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerCommande($id) {
        $sql = "DELETE FROM commande WHERE id= :id";
        $conn = new config();
        $db = $conn->getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererCommande($id) {
        $sql = "SELECT * FROM commande WHERE id= :id";
        $conn = new config();
        $db = $conn->getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            $commande = $req->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifierCommande($commande, $idCommande) {
        try {
            $conn = new Config();
            $db = $conn->getConnexion();
            $query = $db->prepare(
                "UPDATE commande SET 
                    nom = :nom,
                    adresse = :adresse,
                    numTel = :numTel,
                    montant = :montant,
                    produits = :produits
                 WHERE id = :id"
            );
            $query->execute([
                'nom' => $commande->getNom(),
                'adresse' => $commande->getAdresse(),
                'numTel' => $commande->getNumTel(),
                'montant' => $commande->getMontant(),
                'produits' => $commande->getProduits(),
                'id' => $idCommande
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
}
}
?>
