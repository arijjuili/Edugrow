
<?php
if (!class_exists('config')) {


class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=edu_grow',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
}
    

    class UtilisateurC
    {

        public static function listUsers()
        {
            $sql = "SELECT * FROM user";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
        }

        function deleteUser($ide)
        {
            $sql = "DELETE FROM user WHERE id = :id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $ide);

            try {
                $req->execute();
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
        } 
        function addUser($yass)
        {
            $sql = "INSERT INTO user
            VALUES (NULL, :nm,:pr, :ag,:te,:ro,:ma,:pw)";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    'nm' => $yass->getnom(),
                    'pr' => $yass->getprenom(),
                    'ag' => $yass->getage(),
                    'te' => $yass->gettel(),
                    'ro' => $yass->getrôle(),
                    'ma' => $yass->getemail(),
                    'pw' => $yass->getpwd()
                    
                ]);
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    
    
        function showUser($id)
        {
            $sql = "SELECT * from user where id= $id";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
                $yass = $query->fetch();
                return $yass;
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
        function showUserByEmail($email)
        {
            $sql = "SELECT * FROM user WHERE email = :email";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute([':email' => $email]);
                $yass = $query->fetch();
                return $yass;
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }


        function updateUser($yass, $id)
        {
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE user SET 
                        nom = :nom, 
                        prenom= :prenom, 
                        age = :age, 
                        tel = :tel,
                        rôle = :roole,
                        email = :email,
                        pwd = :pwd

                        
                    WHERE id= :id'
                );
                $query->execute([
                    'id' => $id,
                    'nom' => $yass->getnom(),
                    'prenom' => $yass->getprenom(),
                    'age' => $yass->getage(),
                    'tel' => $yass->gettel(),
                    'roole' => $yass->getrôle(),
                    'email' => $yass->getemail(),
                    'pwd' => $yass->getpwd()
    
                    
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
    }
    



    function userExists($email) {
        try {
            $db = config::getConnexion(); 
    
            $query = $db->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
    
            $result = $query->fetchColumn();
    
            return $result > 0;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateUserByemail($yass, $email)
        {
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE user SET 
                        nom = :nom, 
                        prenom= :prenom, 
                        age = :age, 
                        tel = :tel,
                        rôle = :roole,
                        email = :email,
                        pwd = :pwd

                        
                    WHERE email= :email'
                );
                $query->execute([
                    
                    'nom' => $yass->getnom(),
                    'prenom' => $yass->getprenom(),
                    'age' => $yass->getage(),
                    'tel' => $yass->gettel(),
                    'roole' => $yass->getrôle(),
                    'email' => $yass->getemail(),
                    'pwd' => $yass->getpwd()
    
                    
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
    }
    


    function getPasswordByEmail($email) {
        try {
            $db = config::getConnexion(); 
    
            $query = $db->prepare("SELECT pwd FROM user WHERE email = :email");
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
    
            return $query->fetchColumn();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getUserByEmail($email)
{
    $sql = "SELECT * FROM user WHERE email = :email";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();

        // Fetch en tant qu'assoc pour obtenir un tableau associatif
        $yass = $query->fetch(PDO::FETCH_ASSOC);

        return $yass;
    } catch (Exception $e) {
        // Gérer les erreurs (par exemple, journaliser l'erreur)
        // Vous pouvez également renvoyer un message d'erreur personnalisé si nécessaire
        return null;
    }
}
function trierusers(){
    $sql = "SELECT * FROM user ORDER BY age DESC";
    $educatous = config::getConnexion();
    try {
        $req = $educatous->query($sql);
        return $req;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}
function trieruser(){
    $sql = "SELECT * FROM user ORDER BY age ASC";
    $educatous = config::getConnexion();
    try {
        $req = $educatous->query($sql);
        return $req;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}
public  function searchUser($recherche) 
{
   $sql = "SELECT * FROM  user
           WHERE rôle  LIKE :recherche";
         
   $db = config::getConnexion();
   
   try {
       $query = $db->prepare($sql);
       $query->bindValue(':recherche', '%' . $recherche . '%');
       $query->execute();
       $yass = $query->fetchAll();
       return $yass;
   } catch (Exception $e) {
       die('Error: ' . $e->getMessage());
   }
}
}
?>