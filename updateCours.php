<?php

include '../Controller/CoursC.php'; 

$error = "";
$cours = null;

$coursC = new CoursC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["idc"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["niveau"]) &&
        isset($_POST["description"]) &&
        isset($_POST["matiere_id"])
    ) {
        if (
            !empty($_POST["idc"]) &&
            !empty($_POST["nom"]) &&
            !empty($_POST["niveau"]) &&
            !empty($_POST["description"]) &&
            !empty($_POST["matiere_id"])
        ) {
            $cours = new Cours(
                $_POST["idc"],
                $_POST["nom"],
                $_POST["niveau"],
                $_POST["description"],
                $_POST["matiere_id"]
            );
            $coursC->updateCours($cours, $_POST["idc"]);
            header('Location: listCours.php');
            exit();
        } else {
            $error = "Missing information";
        }
    }
} else {
    if (isset($_GET['idc'])) {
        $idc = $_GET['idc'];
        $cours = $coursC->showCours($idc);
        if (!$cours) {
            echo "Cours not found!";
            exit();
        }
    } else {
        echo "IDC not provided!";
        exit();
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours Update</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <a href="listCours.php">Back to list</a>
    <hr>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (!isset($_POST['idc'])) {
        ?>

<form action="updateCours.php" method="POST">
    <input type="hidden" name="idc" value="<?php echo $cours['idc'] ?? ''; ?>">
    <table border="1" align="center">
        <tr>
            <td>
                <label for="nom">Nom:</label>
            </td>
            <td><input type="text" name="nom" id="nom" value="<?php echo $cours['nom'] ?? ''; ?>" maxlength="255"></td>
        </tr>
        <tr>
            <td>
                <label for="niveau">Niveau:</label>
            </td>
            <td><input type="text" name="niveau" id="niveau" value="<?php echo $cours['niveau'] ?? ''; ?>" maxlength="255"></td>
        </tr>
        <tr>
            <td>
                <label for="description">Description:</label>
            </td>
            <td><input type="text" name="description" id="description" value="<?php echo $cours['description'] ?? ''; ?>" maxlength="255"></td>
        </tr>
        <tr>
            <td>
                <label for="matiere_id">Matiere ID:</label>
            </td>
            <td><input type="text" name="matiere_id" id="matiere_id" value="<?php echo $cours['matiere_id'] ?? ''; ?>" maxlength="50" readonly></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Modifier">
            </td>
        </tr>
    </table>
</form>

    <?php } ?> 
</body>
</html>
