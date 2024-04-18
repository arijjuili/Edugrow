<?php

require_once 'C:\xampp\htdocs\edugrow\config.php'; // Include the config.php file

class EventC
{
    public function ListeEvent() 
    {
        $sql = "SELECT * FROM event";
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


    
    public function addEvent($Event)
    {
        $sql = "INSERT INTO event (Nom, Date, Location, img) VALUES (:Nom, :Date, :Location, :img)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'Nom' => $Event->getNom(),
                'Date' => $Event->getDate(),
                'Location' => $Event->getLocation(),
                'img' => $Event->getImg(), // Assuming getImg() method exists
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
        $sql = "UPDATE event SET Nom=:Nom, Date=:Date, Location=:Location, img=:img WHERE idE=:idE";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'idE' => $Event->getIdE(),
                'Nom' => $Event->getNom(),
                'Date' => $Event->getDate(),
                'Location' => $Event->getLocation(),
                'img' => $Event->getImg(), // Assuming getImg() method exists
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
