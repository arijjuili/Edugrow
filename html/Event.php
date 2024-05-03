<!-- Connexion au php en temps réel ( extraction de données à partir de la base de données MYSQL ) -->
<?php
include 'C:\xampp\htdocs\edugrow\Controller\EventC.php';
include 'C:\xampp\htdocs\edugrow\Controller\CategoryC.php';
require_once 'C:\xampp\htdocs\edugrow\Model\Event.php';
require_once 'C:\xampp\htdocs\edugrow\Model\Category.php';

// Include your Event and Category classes

$EventC = new EventC();
$ListeEvent = $EventC->ListeEvent();

$CategoryC = new CategoryC();
$ListeCategory = $CategoryC->ListeCategory();

// Define getCategories function here
function getCategories()
{
  $CategoryC = new CategoryC();
  return $CategoryC->ListeCategory();
}
?>

<!-- Your HTML code follows -->










<!DOCTYPE html>


<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>


<?php include 'Head.php'; ?>



  

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">EduGrow</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
          

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Events Managament</span></li>

            <!-- Tables -->
            <li class="menu-item active">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li>

            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
          </ul>
        </aside>

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            </div>


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Events </h4>
              <hr class="my-5" />

              <!-- Bootstrap Dark Table Evenets-->
              <div class="card">
                <h5 class="card-header">Events Table</h5>
                <button id="showEventFormBtn" class="btn btn-primary">Show Form</button>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Category</th>
  
                        <th>Actions</th>
                      </tr>
                    </thead>
                   


                    <tbody class="table-border-bottom-0">
  <?php foreach ($ListeEvent as $Event): ?>
      <tr>
        <td><strong><?php echo $Event['Nom']; ?></strong></td>
        <td><?php echo $Event['Date']; ?></td>
        <td><?php echo $Event['Location']; ?></td>
        <td>
                      <img src="<?php echo $Event['img']; ?>" alt="Post Image" width="50"> <!-- Display the image -->

        </td>
        <td><?php echo $Event['category_title']; ?></td>


        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
 
        
            <a href="edit_event.php?idE=<?php echo $Event['idE']; ?>" class="btn btn-sm btn-secondary me-2"
      data-toggle="tooltip" data-original-title="Edit">Edit</a>


              <a href="process_event.php?delete=<?php echo $Event['idE']; ?>"
                              class="btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete">Delete</a>


            </div>
          </div>
        </td>
      </tr>


    
  <?php endforeach; ?>
  
  
  

</tbody>

                  </table>
                </div>
              </div>
              <!--/ Bootstrap Dark Table -->


<!-- Bootstrap Dark Table Category -->
<div class="card">
    <h5 class="card-header">Category Table</h5>
    <button id="showCategoryFormBtn" class="btn btn-primary">Show Form</button>
    <div class="table-responsive text-nowrap">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Nombre d'événement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($ListeCategory as $Category): ?>
                      <tr>
                          <td><strong><?php echo $Category['Titre']; ?></strong></td>
                          <td><?php echo $Category['Description']; ?></td>
                          <td><?php echo $Category['Nbr_events']; ?></td>
                          <td>
                              <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">


                                  <a href="edit_category.php?idC=<?php echo $Category['idC']; ?>" class="btn btn-sm btn-secondary me-2"
      data-toggle="tooltip" data-original-title="Edit">Edit</a>

                                  <a href="process_category.php?delete=<?php echo $Category['idC']; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete">Delete</a>
                                  </div>
                              </div>
                          </td>
                      </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>






<!-- Add Form -->



<!-- Container for the form (initially hidden) -->
<div id="EventFormContainer" style="display: none;">


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-6">
          <!-- Form for adding a new event -->
          <form method="POST" action="process_event.php" onsubmit="return validateForm()" enctype="multipart/form-data">

<div class="mb-3">
    <label for="Nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="Nom" name="Nom" value="">
</div>


<div class="mb-3">
    <label for="Date" class="form-label">Date</label>
    <input type="Date" class="form-control" id="Date" name="Date" value="">
</div>

<div class="mb-3">
    <label for="Location" class="form-label">Location</label>
    <input type="text" class="form-control" id="Location" name="Location" value="">
</div>

<div class="mb-3">
    <label for="img" class="form-label">Image</label>
    <input type="file" class="form-control" id="img" name="img">
</div>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-select" id="category" name="category">
        <?php
        $categories = getCategories();
        foreach ($categories as $category) {
          echo "<option value=\"{$category['idC']}\">{$category['Titre']}</option>";
        }
        ?>
    </select>
</div>

<button type="submit" class="btn btn-primary" name="add">Add event</button>

</form>





            <!-- Script to toggle visibility of the form -->
<script>
  // Function to toggle visibility of the Event form
  function toggleEventForm() {
    var formContainer = document.getElementById("EventFormContainer");
    var button = document.getElementById("showEventFormBtn");

    // Toggle form visibility
    if (formContainer.style.display === "none") {
      formContainer.style.display = "block";
      button.textContent = "Hide Event Form";
    } else {
      formContainer.style.display = "none";
      button.textContent = "Show Event Form";
    }
  }

  // Add event listener to the button
  document.getElementById("showEventFormBtn").addEventListener("click", toggleEventForm);
</script>








            <script>
              function validateForm() {
                var Nom = document.getElementById("Nom").value;
                var Location = document.getElementById("Location").value;
                var DateInput = document.getElementById("Date").value;
                var errors = [];

                // Vérifie si tous les champs sont remplis
                if (Nom.trim() === "" || Location.trim() === "" || DateInput.trim() === "") {
                  errors.push("Veuillez remplir tous les champs.");
                }

                // Vérifie si le champ "Nom" contient 20 caractères ou moins
                if (Nom.length > 20) {
                  errors.push("Le champ Nom ne doit pas dépasser 20 caractères.");
                }
          

                // Vérifie si la date est postérieure à la date actuelle
                var currentDate = new Date();
                var selectedDate = new Date(DateInput);

                // Convertir les dates en timestamp UNIX pour la comparaison
                var currentTimestamp = currentDate.getTime();
                var selectedTimestamp = selectedDate.getTime();

                if (selectedTimestamp <= currentTimestamp) {
                  errors.push("La date doit être ultérieure à la date actuelle.");
                }

                // Afficher toutes les erreurs détectées
                if (errors.length > 0) {
                  var errorMessage = errors.join("\n");
                  alert(errorMessage);
                  return false; // Empêche la soumission du formulaire
                }

                // Si toutes les conditions sont remplies, le formulaire est soumis
                return true;
              }
            </script>


<!-- Add Form category-->


                      <!-- Script to toggle visibility of the form -->
   <script>
    // Function to toggle visibility of the Category form
    function toggleCategoryForm() {
      var formContainer = document.getElementById("CategoryFormContainer");
      var button = document.getElementById("showCategoryFormBtn");

      // Toggle form visibility
      if (formContainer.style.display === "none") {
        formContainer.style.display = "block";
        button.textContent = "Hide Category Form";
      } else {
        formContainer.style.display = "none";
        button.textContent = "Show Category Form";
      }
    }

    // Add Category listener to the button
    document.getElementById("showCategoryFormBtn").addEventListener("click", toggleCategoryForm);
  </script>





<script>
  function validateForm_category() {
    var titre = document.getElementById("Titre").value.trim();
    var description = document.getElementById("Description").value.trim();
    var nbr_events = document.getElementById("Nbr_Events").value.trim();

    // Regular expression to check if only characters are entered
    var charRegex = /^[A-Za-z]+$/;

    // Check if Titre contains only characters
    if (!charRegex.test(titre)) {
        alert("Titre should contain only characters.");
        return false;
    }

    // Check if Description contains only characters
    if (!charRegex.test(description)) {
        alert("Description should contain only characters.");
        return false;
    }

    // Check if Nbr_events is not more than 50
    if (parseInt(nbr_events) > 50) {
        alert("Nbr_Events should not be more than 50.");
        return false;
    }

    // If all validations pass, return true
    return true;
}



</script>



<!-- Container for the form (initially hidden) -->
<div id="CategoryFormContainer" style="display: none;">


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-6">
          <!-- Form for adding a new category -->


          <form method="POST" action="process_category.php" onsubmit="return validateForm_category()" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="Titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="Titre" name="Titre" value="">
    </div>
    <div class="mb-3">
        <label for="Description" class="form-label">Description</label>
        <input type="text" class="form-control" id="Description" name="Description" value="">
    </div>
    <div class="mb-3">
        <label for="Nbr_Events" class="form-label">Nbr_Events</label>
        <input type="text" class="form-control" id="Nbr_Events" name="Nbr_events" value="">
    </div>
    <button type="submit" class="btn btn-primary" name="add_category">Add category </button>
</form>




            
            

            <!-- / Content -->

            <?php include 'Footer.php'; ?>

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    


    <?php include 'Scripts.php'; ?>




  </body>
</html>