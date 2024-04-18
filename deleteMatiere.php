<?php
include '../controller/MatiereC.php';

$matiereC = new MatiereC(); 

// Check if 'idm' is set in the URL
if(isset($_GET["idm"])) {
    // Call the deleteMatiere method with the idm parameter from the URL
    $matiereC->deleteMatiere($_GET["idm"]);
    // Redirect to the listMatiere.php page after deletion
    header('Location: listMatiere.php');
} else {
    // If idm is not set in the URL, handle the error accordingly
    echo "Error: Missing idm parameter";
}
?>
