<?php

include "../../controller/utilisateurC.php";

include "../../model/Utilisateur.php";

$error = "";


$yass = null;


$yassC = new UtilisateurC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["age"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["rôle"]) &&
    isset($_POST["email"])&&
    isset($_POST["pwd"])
    

) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["age"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["rôle"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["pwd"]) 
        
       
    ) {
        $yass = new Utilisateur(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['age'],
            $_POST['tel'],
            $_POST['rôle'],
            $_POST['email'],
            $_POST['pwd']
    
        );


        $yassC->updateUser($yass, $_POST["id"]);
        header('Location:user.php');
    } else
        $error = "Missing information";
        
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Tableau de bord</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Edugrow </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Composantes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Composantes:</h6>
                        <a class="collapse-item" href="buttons.html">Boutons</a>
                        <a class="collapse-item" href="cards.html">Cartes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Écrans de connexion:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Se connecter</a>
                        <a class="collapse-item" href="forgot-password.html">Mot de passe oublié</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Page blanche</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Graphiques</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>users list</span></a>
            </li>

            <!-- Nav Item - Tables -->
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="
                            Rechercher..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="
                                            Rechercher..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Janvier 12,2024 </div>
                                        <span class="font-weight-bold">Un nouveau rapport mensuel est prêt à être téléchargé !</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">janvier 7, 2024</div>
                                        290,29 $ ont été déposés sur votre compte !
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">janvier 2, 2024</div>
                                        Alerte de dépenses : nous avons remarqué des dépenses inhabituellement élevées pour votre compte.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Afficher toutes les alertes</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                     Messagerie
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Bonjour ! Je me demande si vous pouvez m'aider avec un
                                            problème que j'ai eu.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">J'ai les photos que tu as commandées le mois dernier, comment
                                            Voudriez-vous qu'ils vous soient envoyés ?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Le rapport du mois dernier semble superbe, j'en suis très content
                                            les progrès jusqu’à présent, continuez votre bon travail !</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Suis-je un bon garçon ? La raison pour laquelle je demande, c'est parce que quelqu'un
                                            m'a dit qu'on dit ça à tous les chiens, même s'ils ne sont pas bons...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Lire plus de messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">ayoub aouadi</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile_3.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Paramètres
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Journal d'activité
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">mise à jour de l'utilisateur</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> exporter la liste</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                  
                    

                    <script>
        function validateForm() {
            // Get form elements
            var name = document.getElementById("nom");
            var prenom = document.getElementById("prenom");
            var age = document.getElementById("age");
            var tel = document.getElementById("tel");
            var role = document.getElementById("rôle");
            var email = document.getElementById("email");
            var pwd = document.getElementById("pwd");

            // Error messages
            var errorMessage = "";

            // Check for empty fields
            if (name.value.trim() === "") {
                errorMessage += "Nom est obligatoire.\n";
            }
            if (prenom.value.trim() === "") {
                errorMessage += "prenom est obligatoire.\n";
            }
            if (age.value.trim() === "") {
                errorMessage += "Age est obligatoire..\n";
            } else if (isNaN(age.value)) {
                errorMessage += "Age doit etre un nombre.\n";
            } // Add more validation for age range if needed
            if (tel.value.trim() === "") {
                errorMessage += "Telephone est obligatoire.\n";
            }
            if (role.value.trim() === "") {
                errorMessage += "Role est obligatoire.\n";
            }
            if (email.value.trim() === "") {
                errorMessage += "Email est obligatoire.\n";
            }// else if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email.value)) {
                //errorMessage += "Invalid email format.\n";
            
            if (pwd.value.trim() === "") {
                errorMessage += "Mot de passe est obligatoire.\n";
            } else if (pwd.value.length < 6) {
                errorMessage += "Mot de passe doit contient au moins 6 caeacteres\n";
            }

            // Display error message (if any) and prevent form submission
            if (errorMessage !== "") {
                alert(errorMessage);
                return false;
            }

            // Allow form submission if all checks pass
            return true;
        }
    </script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    h1 {
        color: #8a2be2; /* Mauve */
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #8a2be2; /* Mauve */
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="password"],
    select {
        width: calc(100% - 22px); /* Adjusted for button width */
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ff69b4; /* Rose */
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%238a2be2'%3E%3Cpath d='M10 12L4 6h12L10 12z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position-x: calc(100% - 10px);
        background-position-y: center;
    }

    .update-button {
        background-color: #ff69b4; /* Rose */
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .update-button:hover {
        background-color: #d34e85; /* Rose foncé au survol */
    }
    button a {
  color: #ff69b4; /* Rose color */
  text-decoration: none; /* Remove underline */
}

/* Add a hover effect for the button */
button:hover {
  background-color: #f0e6ea; /* Lighten the background on hover */
}
    
    

    .password-toggle {
        background-color: transparent;
        border: none;
        padding: 0;
        margin: 0;
        cursor: pointer;
        font-size: 20px;
        color: #8a2be2; /* Mauve */
        position: relative;
        top: -5px;
    }

    .password-toggle:focus {
        outline: none;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }
     /* Center the form */
  .registration.form {
    position: fixed; /* Position the form absolutely */
    top: 60%; /* Position it vertically from the top */
    left: 40%; /* Position it horizontally from the left */
    transform: translate(-50%, -50%); /* Center it using transform */
    max-width: 400px; /* Maintain form width */
    margin: 0 auto; /* Remove default margin */
  }
</style>
</style>
</head>
<body>
<button><a href="user.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <div class="registration form">
        <header>Update User</header>
        
        <form action="" method="POST" onsubmit="return validateForm()">

            <?php
            if (isset($_POST['id'])) {
                $yass = $yassC->showUser($_POST['id']);
            }
            ?>
  <input type="text" name="id" id="id" placeholder=" ID" readonly value= " <?php echo $yass['id']; ?>">
  <input type="text" name="nom" id="nom" placeholder="Enter your FirstName" value=" <?php echo $yass['nom']; ?>">
  <input type="text" name="prenom" id="prenom" placeholder="Enter your LastName"value=" <?php echo $yass['prenom']; ?>">
  <input type="text" name="age" id="age" placeholder="Enter your age"value=" <?php echo $yass['age']; ?>">
  <input type="text" name="tel" id="tel" placeholder="Enter your tel"value=" <?php echo $yass['tel']; ?>">
  <input type="text" name="rôle" id="rôle" placeholder="Enter your rôle"value=" <?php echo $yass['rôle']; ?>">
  <input type="text" name="email" id="email" placeholder="Enter your email "value=" <?php echo $yass['email']; ?>">
  <input type="text" name="pwd" id="pwd" placeholder="Enter your pwd "value=" <?php echo $yass['pwd']; ?>">
  <input type="submit" class="update-button" value="mise à jour">
</form>
    

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                      
                            
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez « Se déconnecter » ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="login.html">Se déconnecter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>