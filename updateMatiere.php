<?php
include '../Controller/MatiereC.php';

$error = "";
$matiereC = new MatiereC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["idm"]) &&
        isset($_POST["nom"]) && 
        isset($_POST["niveau"]) &&
        isset($_POST["description"])
    ) {
        if (
            !empty($_POST["idm"]) &&
            !empty($_POST["nom"]) &&
            !empty($_POST["niveau"]) &&
            !empty($_POST["description"])
        ) {
            $matiere = new Matiere(
                $_POST["idm"],
                $_POST["nom"],
                $_POST["niveau"],
                $_POST["description"]
            );
            $matiereC->updateMatiere($matiere, $_POST["idm"]);
            exit(); 
        } else {
            $error = "Missing information. Please fill in all fields.";
        }
    } else {
        $error = "Incomplete form submission.";
    }
}


if (isset($_GET['idm'])) {
    $idm = $_GET['idm'];
    $matiere = $matiereC->showMatiere($idm);
    if (!$matiere) {
        echo "Matiere not found!";
        exit();
    }
} else {
    echo "IDM not provided!";
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matiere Update</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <a href="listMatiere.php">Back to list</a>
    <hr>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="updateMatiere.php" method="POST">
        <input type="hidden" name="idm" value="<?php echo isset($matiere['idm']) ? $matiere['idm'] : ''; ?>">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="nom">Nom:</label>
                </td>
                <td><input type="text" name="nom" id="nom" value="<?php echo isset($matiere['nom']) ? $matiere['nom'] : ''; ?>" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="niveau">Niveau:</label>
                </td>
                <td><input type="text" name="niveau" id="niveau" value="<?php echo isset($matiere['niveau']) ? $matiere['niveau'] : ''; ?>" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description:</label>
                </td>
                <td><input type="text" name="description" id="description" value="<?php echo isset($matiere['description']) ? $matiere['description'] : ''; ?>" maxlength="255"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Modifier">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
