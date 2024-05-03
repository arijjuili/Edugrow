<?php
// Include necessary files and classes
require_once 'C:\xampp\htdocs\edugrow\config.php'; // Assuming you have a config.php file for database connection
require_once 'C:\xampp\htdocs\edugrow\Model\Category.php';
require_once 'C:\xampp\htdocs\edugrow\Controller\CategoryC.php';

// Initialize CategoryC object
$CategoryC = new CategoryC();

// Add category
if (isset($_POST['add_category'])) {
    // Check if all required fields are present
    if (isset($_POST['Titre'], $_POST['Description'], $_POST['Nbr_events'])) {
        $Titre = $_POST['Titre'];
        $Description = $_POST['Description'];
        $Nbr_events = $_POST['Nbr_events'];

        // Check if any required field is empty
        if (!empty($Titre) && !empty($Description) && !empty($Nbr_events)) {
            // Create a new category object
            $Category = new Category();
            $Category->setTitre($Titre);
            $Category->setDescription($Description);
            $Category->setNbr_events($Nbr_events);
            
            // Add the category
            $CategoryC->addCategory($Category);

            // Redirect to the page after adding
            header('Location: Event.php');
            exit();
        } else {
            echo "All fields are required for adding a category."; // Provide appropriate error handling
            exit();
        }
    } else {
        echo "All fields are required for adding a category."; // Provide appropriate error handling
        exit();
    }
}



if (isset($_POST['edit_category'])) {
    // Check if all required fields are present
    if (isset($_POST['idC'], $_POST['Titre'], $_POST['Description'], $_POST['Nbr_events'])) {
        $idC = $_POST['idC'];
        $Titre = $_POST['Titre'];
        $Description = $_POST['Description'];
        $Nbr_events = $_POST['Nbr_events'];

        // Create a new Category object with updated details
        $Category = new Category();
        $Category->setIdC($idC);
        $Category->setTitre($Titre);
        $Category->setDescription($Description);
        $Category->setNbr_events($Nbr_events);
        
        // Call the modifyCategory method to update the category
        $CategoryC->modifyCategory($Category);

        // Redirect back to the Category.php page after updating
        header('Location: Event.php');
        exit();
    } else {
        echo "All fields are required for updating a category.";
        exit();
    }
}




// Delete category
if (isset($_GET['delete'])) {
    $idC = $_GET['delete'];
    $CategoryC->deleteCategory($idC);

    // Redirect back to the destination page after deleting
    header('Location: Event.php');
    exit();
}
?>
