<?php
        require_once '../../Controller/commandeC.php'; 
        require_once '../../Model/commande.php';

    $error = "";
        // create an instance of the controller
        $commandeC = new commandeC();
        if (
        isset($_POST["nom"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["numTel"]) &&
    isset($_POST["montant"]) &&
    isset($_POST["produits"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["numTel"]) &&
        !empty($_POST["montant"]) &&
        !empty($_POST["produits"])
    ) {
        $commande = new Commande(
            $_POST['nom'],
            $_POST['adresse'],
            $_POST['numTel'],
            $_POST['montant'],
            $_POST['produits']
        );
            $commandeC->modifierCommande($commande, $_GET['id']);
      header ('Location:listCommande.php');
        }
        else
            $error = "Missing information";
    } 
    ?>
    

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EduGrow</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/public/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/public/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/public/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/public/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="assets/public/assets/css/theme.css" rel="stylesheet" />

  </head>
  <body>
  <?php 
											if (isset($_GET['id'])){
												$commande = $commandeC->recupererCommande($_GET['id']);
										?>
    <main class="main" id="top">

      <nav class="navbar navbar-expand-lg navbar-light sticky-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/public/assets/img/gallery/edugrow.png" height="55" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="pricing.html">Cours</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="web-development.html">Events</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="user-research.html">Reclamation</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="listCommande.php">Commandes</a></li>
			  <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="listProduits.php">Shop</a></li>            </ul><a class="btn btn-primary order-1 order-lg-0" href="#!">Sign Up</a>
            <form class="d-flex my-3 d-block d-lg-none">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <div class="dropdown d-none d-lg-block">
              <button class="btn btn-outline-light ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-800"></i></button>
              <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton1" style="top:55px">
                <form>
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                </form>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <section class="pb-11 pt-7 bg-600">

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mb-6">Pass Your Commande</h1>
      <form class="row g-3" id="form" name="form" method="POST" action="">
        <div class="col-sm-6 col-md-3">
          <label class="form-label" for="inputCategories">nom</label>
          <input value="<?PHP echo $commande['nom']; ?>" type="text" class="form-control" id="nom" name="nom" aria-describedby="idHelp">
        </div>
        <div class="col-sm-6 col-md-3">
          <label class="form-label" for="inputCategories">Adresse</label>
          <input value="<?PHP echo $commande['adresse']; ?>" type="text" class="form-control" id="adresse" name="adresse" aria-describedby="idHelp">
        </div>
        <div class="col-sm-6 col-md-3">
          <label class="form-label" for="inputCategories">NumTel</label>
          <input value="<?PHP echo $commande['numTel']; ?>" type="text" class="form-control" id="numTel" name="numTel" aria-describedby="idHelp">
        </div>
        <div class="col-sm-6 col-md-3">
          <label class="form-label" for="inputCategories">Total Amount</label>
          <input value="<?PHP echo $commande['montant']; ?>" type="text" class="form-control" id="montant" name="montant" aria-describedby="idHelp">
        </div>
        <div class="col-sm-6 col-md-3">
          <label class="form-label" for="inputCategories">Products </label>
          <input value="<?PHP echo $commande['produits']; ?>" type="number" class="form-control" id="produits" name="produits" aria-describedby="idHelp">
        </div>
        <div class="col-auto z-index-2">
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
      <?php
											}
										?>    
    </div>
  </div>
</div>
<!-- end of .container-->

</section>

      </section>
      <section class="py-0" style="margin-top: -5.8rem;">
        <div class="container bg-primary">
          <div class="row justify-content-md-between justify-content-evenly py-4">
            <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
              <p class="fs--1 my-2 fw-bold">All rights Reserved &copy; Your Company, 2021</p>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="fs--1 my-2 text-center text-md-end"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#EB6453" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="fw-bold text-900" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/public/assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  </body>

</html>
