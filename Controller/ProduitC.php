<?php
include_once("../../config.php");
include("../../Model/produit.php");

class ProduitC {
    function afficherProduit() {
        $sql = "SELECT * FROM produit";
        $conn = new Config();
        $db = $conn->getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function getProduitsByIds($ids) {
        if (empty($ids)) {
            return []; 
        }

        $idsString = implode(',', $ids);
        $sql = "SELECT * FROM produit WHERE id IN ($idsString)";
        $conn = new Config();
        $db = $conn->getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function calculateTotalAmount($listeProduitPanier) {
        $totalAmount = 0;
        foreach ($listeProduitPanier as $produit) {
            $totalAmount += $produit['prix'];
        }
        return $totalAmount;
    }
    function ajouterProduit($produit) {
        $sql = "INSERT INTO produit (nom, prix, description, image, category) 
                VALUES (:nom, :prix, :description, :image, :category)";
        $db = new config();
        $conn = $db->getConnexion();
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),
                'description' => $produit->getDescription(),
                'image' => $produit->getImage(),
                'category' => $produit->getCategory()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    function supprimerProduit($id) {
        $conn = new config();
        $db = $conn->getConnexion();
    
        // First, delete related commands
        $sqlDeleteCommands = "DELETE FROM commande WHERE produits = :id";
        $stmtDeleteCommands = $db->prepare($sqlDeleteCommands);
        $stmtDeleteCommands->bindValue(':id', $id);
    
        // Then, delete the product
        $sqlDeleteProduct = "DELETE FROM produit WHERE id = :id";
        $stmtDeleteProduct = $db->prepare($sqlDeleteProduct);
        $stmtDeleteProduct->bindValue(':id', $id);
    
        try {
            $db->beginTransaction();
    
            // Delete related commands
            $stmtDeleteCommands->execute();
    
            // Delete the product
            $stmtDeleteProduct->execute();
    
            $db->commit();
        } catch (Exception $e) {
            $db->rollBack();
            die('Erreur: ' . $e->getMessage());
        }
    }
    
    function recupererProduit($id) {
        $sql = "SELECT * FROM produit WHERE id= :id";
        $conn = new config();
        $db = $conn->getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            $produit = $req->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifierProduit($produit, $idProduit) {
        try {
            $conn = new Config();
            $db = $conn->getConnexion();
            $query = $db->prepare(
                "UPDATE produit SET 
                    nom = :nom,
                    prix = :prix,
                    description = :description,
                    image = :image,
                    category = :category
                 WHERE id = :id"
            );
            $query->execute([
                'nom' => $produit->getNom(),
                'prix' => $produit->getPrix(),
                'description' => $produit->getDescription(),
                'image' => $produit->getImage(),
                'category' => $produit->getCategory(),
                'id' => $idProduit
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
}
}
?>
