<?php
include 'C:\xampp\htdocs\koukou\yass\controller\utilisateurC.php';
include 'C:\xampp\htdocs\koukou\yass\model\Utilisateur.php';

    // Handle the search when the form is submi tted
   
    $yassC=new UtilisateurC();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn'])) {
        $rôle = isset($_POST['rôle']) ? $_POST['rôle'] : '';
        $tab = $yassC->searchUser($rôle);

        // Display the search result
        
    }
    ?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Afficher un utilisateur</title>
    
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edugrow</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<style>
 body {
            background-image: url('header-bg.jpg'); /* Replace 'path_to_your_image.jpg' with the actual path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Ensures the background image stays fixed in place */
        }
table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table th,
        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #e6e6fa; /* Mauve clair */
            color: #8a2be2; /* Mauve foncé */
            text-align: left;
        }

        table tr:nth-child(even) {
            background-color: #ffe4e1; /* Rose clair */
        }

        table tr:nth-child(odd) {
            background-color: #f8f0fc; /* Mauve rose */
        }
</style>
<body >

    <h1>Afficher un utilisateur</h1>

    <table>
  <thead>
    <tr>
     
      <th>Nom</th>
      <th>Prenom</th>
      <th>Age</th>
      
      <th>Tel</th>
      <th>Role</th>
      <th>Email</th>
      <th>password</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($tab as $yass):?>
      <tr>
        
        <td><?php echo $yass['nom'];?></td>
        <td><?php echo $yass['prenom'];?></td>
        <td><?php echo $yass['age'];?></td>
        <td><?php echo $yass['tel'];?></td>
        <td><?php echo $yass['rôle'];?></td>
        <td><?php echo $yass['email'];?></td>
        <td><?php echo $yass['pwd'];?></td>
        
        
        

      </tr>
      
    <?php endforeach;?>
  </tbody>
 
  
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>



</body>






</html>