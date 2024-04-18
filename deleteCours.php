<?php
include '../controller/CoursC.php';

$coursC = new CoursC(); 

if(isset($_GET["idc"])) {
    $coursC->deleteCours($_GET["idc"]);
    header('Location: listCours.php');
} else {
    echo "Error: Missing idm parameter";
}
?>
