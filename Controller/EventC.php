<?php

require_once 'C:\xampp\htdocs\edugrow\config.php'; // Include the config.php file

class EventC
{
    public function ListeEvent() 
    {
        $sql = "SELECT event.*, category.Titre as category_title
                FROM event 
                LEFT JOIN category ON event.category = category.idC";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $res = $query->fetchAll();
            return $res;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    public function searchEventByNom($nom) {
        $db = config::getConnexion();
        $sql = "SELECT * FROM event WHERE Nom LIKE :Nom";
        $stmt = $db->prepare($sql);
        $nom = '%' . $nom . '%';
        $stmt->bindParam(':Nom', $nom, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }




    


    public function getCategories() 
    {
        $sql = "SELECT idC, Titre FROM category";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $categories = $query->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    


    public function addEvent($Event)
{
    $sql = "INSERT INTO event (Nom, Date, Location, img, category) 
            VALUES (:Nom, :Date, :Location, :img, :category)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'Nom' => $Event->getNom(),
            'Date' => $Event->getDate(),
            'Location' => $Event->getLocation(),
            'img' => $Event->getImg(), // Assuming getImg() method exists
            'category' => $Event->getCategory(), // Assuming getCategory() method exists
        ]);
        $Event->setIdE($db->lastInsertId()); // Assuming setIdE() method exists
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

    

    public function getEventById($idE)
    {
        $sql = "SELECT * FROM event WHERE idE=:idE";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idE' => $idE]);
            $result = $query->fetch();
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    
    public function modifyEvent($Event)
{
    $sql = "UPDATE event SET Nom=:Nom, Date=:Date, Location=:Location WHERE idE=:idE"; // Remove 'img=:img' from the SQL query
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'idE' => $Event->getIdE(),
            'Nom' => $Event->getNom(),
            'Date' => $Event->getDate(),
            'Location' => $Event->getLocation(), 
            // Remove 'img' from the array, as it's not needed in the query
        ]);
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
    

    

    public function deleteEvent($idE)
    {
        $sql = "DELETE FROM event WHERE idE=:idE";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idE' => $idE]);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

?>
