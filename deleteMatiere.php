<?php
include '../controller/MatiereC.php';

$matiereC = new MatiereC(); 

if(isset($_GET["idm"])) {
    $matiereC->deleteMatiere($_GET["idm"]);
    header('Location: listMatiere.php');
} else {
    echo "Error: Missing idm parameter";
}
?>
