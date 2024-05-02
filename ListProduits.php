<?php
session_start();

// Initialize cart session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

include("../../Controller/produitC.php");

$produitC = new produitC();
$listeProduit = $produitC->afficherProduit();

if (isset($_POST['submit'])) {
    $listeProduit = $produitC->afficherProduit();
}

if (isset($_POST['ajout'])) {
    header('Location:../reclamation/add.php');
}

if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];

    // Check if the product ID is already in the cart
    if (!in_array($productId, $_SESSION['cart'])) {
        // Add the product ID to the cart session
        $_SESSION['cart'][] = $productId;
    }
}

if (isset($_POST['clear_cart'])) {
    // Clear the cart session
    unset($_SESSION['cart']);
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
    <style>
 /* Styles for the search input */
 #searchInput {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 8px;
    width: 100%;
    box-shadow: 0 0 10px yellow; /* Yellow shadow */
  }

  /* Adjust search input width for larger screens */
  @media (min-width: 992px) {
    #searchInput {
      width: 200px; /* Adjust width for larger screens */
    }
  }
</style>

  </head>
  <body>
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
      <section>
	  <a href="cart.php" id="cart-link"><i class="fas fa-shopping-cart"></i> Cart (<span id="cart-counter"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>)</a>
   
    <form id="searchForm" class="">
  <input id="searchInput" class="form-control me-2" type="search" placeholder="Search by name" aria-label="Search" />
</form>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', function () {
      const searchText = searchInput.value.trim().toLowerCase();

      const productCards = document.querySelectorAll('.card');

      productCards.forEach(card => {
        const productName = card.querySelector('.font-sans-serif').textContent.trim().toLowerCase();

        if (productName.includes(searchText)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none'; 
        }
      });
    });
  });
</script>

    <div class="container">
  <div class="row">
    <h1 class="text-center mb-5"> Our Products</h1>
      

    <div class="row">
      <?php foreach ($listeProduit as $produit) { ?>
        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <img src="../upload/<?php echo $produit['image']; ?>" class="card-img-top" alt="Product Image">
            <div class="card-body">
              <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1"><?php echo $produit['nom']; ?></h5>
              <p><?php echo $produit['description']; ?></p>
              <p>Prix: <?php echo $produit['prix']; ?></p>
              <p>Category: <?php echo $produit['category']; ?></p>
              <form method="post" action="">
                <input type="hidden" name="product_id" value="<?php echo $produit['id']; ?>">
                <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>


          </div>
        </div>
        <!-- end of .container-->
		<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cartCounter = document.getElementById('cart-counter');
    
    // Function to update the cart counter
    function updateCartCounter() {
      // Retrieve the cart items from the session
      const cartItems = <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>;
      cartCounter.textContent = cartItems;
    }

    // Call the function initially to display the initial cart count
    updateCartCounter();
  });
</script>


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