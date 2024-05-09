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
   <link rel="stylesheet" href="/css/style.css">
<style>
   @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

* {
   font-family: 'Poppins', sans-serif;
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   outline: none;
   border: none;
   text-decoration: none;
 }
 
 .container,
 .form-container {
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding: 20px;
   padding-bottom: 60px;
   background-color: #fce4e4; /* Pastel pink background */
 }

.container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
}

.container .content{
   text-align: center;
}

.container .content h3{
   font-size: 30px;
   color:#333;
}

.container .content h3 span{
   background: rgb(203, 103, 190);
   color:#f8fdfe;
   border-radius: 5px;
   padding:0 15px;
}

.container .content h1{
   font-size: 50px;
   color:#333;
}

.container .content h1 span{
   color:rgb(203, 103, 190);
}

.container .content p{
   font-size: 25px;
   margin-bottom: 20px;
}

.container .content .btn{
   display: inline-block;
   padding:10px 30px;
   font-size: 20px;
   background: #333;
   color:#fff;
   margin:0 5px;
   text-transform: capitalize;
}

.container .content .btn:hover{
   background: rgb(235, 113, 137);
}

.form-container{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-bottom: 10px;
   color:#333;
}

.form-container form input,
.form-container form select{
   width: 100%;
   padding:10px 15px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
}

.form-container form select option{
   background: #fff;
}

.form-container form .form-btn{
   background: #fbd0d9;
   color:rgb(237, 115, 139);
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
}

.form-container form .form-btn:hover{
   background: rgb(133, 0, 138);
   color:#fff;
}

.form-container form p{
   margin-top: 10px;
   font-size: 20px;
   color:#333;
}

.form-container form p a{
   color:rgb(196, 56, 84);
}

.form-container form .error-msg{
   margin:10px 0;
   display: block;
   background: rgb(204, 100, 166);
   color:#fff;
   border-radius: 5px;
   font-size: 20px;
   padding:10px;
}
</style>
</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Salut, <span>Administrateur</span></h3>
      <h1>Bienvenue <span><?php echo $_SESSION['nom']; ?></span> <span><?php echo $_SESSION['prenom']; ?></span></h1>

      <p>ceci est une page d'administrateur</p>
      <a href="indexx.php" class="btn">se connecter </a>
      <a href="edit3.php" class="btn">edit profile </a>
      
      
   </div>

</div>

</body>
</html>


