<?php


// Start the session
session_start();

// Check if the user is logged in
if(!isset($_SESSION['email'])){
   // Redirect to the login page if not logged in
   header('location:C:\xampp\htdocs\koukou\yass\Frontoffice\login.php');
   exit(); // Terminate the script to prevent further execution
}

// Include the database connection file
require_once('C:\xampp\htdocs\koukou\yass\View\Frontoffice\config2.php');

// Check if 'nom' and 'prenom' session variables are not set, then retrieve them from the database
if (!isset($_SESSION['nom']) || !isset($_SESSION['prenom'])) {
   // Fetch user's name and surname from the database based on the email
   $email = $_SESSION['email']; // Assuming email is the unique identifier

   try {
      // Prepare and execute SQL query to fetch user's name and surname from the database
      $query = $pdo->prepare("SELECT nom, prenom FROM user WHERE email = ?");
      $query->execute([$email]);
      $user = $query->fetch(PDO::FETCH_ASSOC);

      // Check if the user exists in the database
      if ($user) {
         // Set 'nom' and 'prenom' session variables with the user's actual name and surname
         $_SESSION['nom'] = $user['nom'];
         $_SESSION['prenom'] = $user['prenom'];
      } else {
         // Set default values if user not found in the database
         $_SESSION['nom'] = "Default Nom";
         $_SESSION['prenom'] = "Default prenom";
      }
   } catch (PDOException $e) {
      // Handle database errors here
      echo "Error: " . $e->getMessage();
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Salut, <span>Étudiant</span></h3>
      <h1>Bienvenue <span><?php echo $_SESSION['nom']; ?></span> <span><?php echo $_SESSION['prenom']; ?></span></h1>
      <p>ceci est une page d'étudiant</p>
      <a href="login.php" class="btn">se connecter </a>
      <a href="edit.php" class="btn">edit profile </a>
      <a href="logout.php" class="btn">Sortir</a>
      
   </div>

</div>

</body>
</html>





