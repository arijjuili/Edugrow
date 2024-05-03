<?php
class CategoryC
{




    public function ListeCategory()
    {
        $sql = "SELECT * FROM category";
        try {
            $db = config::getConnexion();
            $query = $db->prepare($sql);
            $query->execute();
            $res = $query->fetchAll();
            return $res;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }





    public function addCategory($Category)
    {
        $sql = "INSERT INTO category (Titre, Description, Nbr_events) VALUES (:Titre, :Description, :Nbr_events)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Titre' => $Category->getTitre(),
                'Description' => $Category->getDescription(),
                'Nbr_events' => $Category->getNbr_events(),
            ]);
            $Category->setIdC($db->lastInsertId()); // Assuming setIdC() method exists
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    





    public function getCategoryById($idC)
    {
        $sql = "SELECT * FROM category WHERE idC=:idC";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idC' => $idC]);
            $result = $query->fetch();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function modifyCategory($Category)
    {
        $sql = "UPDATE category SET Titre=:Titre, Description=:Description, Nbr_events=:Nbr_events WHERE idC=:idC";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idC' => $Category->getIdC(),
                'Titre' => $Category->getTitre(),
                'Description' => $Category->getDescription(),
                'Nbr_events' => $Category->getNbr_events(),
            ]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function deleteCategory($idC)
    {
        $sql = "DELETE FROM category WHERE idC=:idC";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idC' => $idC]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

?>