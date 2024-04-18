<?php

include '../Controller/CoursC.php';

$error = "";
$CoursC = null;


$CoursC = new CoursC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["niveau"]) &&
    isset($_POST["description"]) &&
    isset($_POST["matiere_id"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["niveau"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["matiere_id"])
    ) {
        $Cours = new Cours(
            null,
            $_POST['nom'],
            $_POST['niveau'],
            $_POST['description'],
            $_POST['matiere_id']
        );
        $CoursC->addCours($Cours);
        header('Location:listCours.php'); 
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Cours</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>

</head>
<body>
    <a href="listCours.php">Retour à la liste</a>
    <hr>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();" novalidate>>
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="nom">Nom:
                    </label>
                </td>
                <td><input type="text" name="nom" id="nom" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="niveau">Niveau:
                    </label>
                </td>
                <td><input type="text" name="niveau" id="niveau" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description:
                    </label>
                </td>
                <td><input type="text" name="description" id="description" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="matiere_id">Matiere ID:
                    </label>
                </td>
                <td><input type="text" name="matiere_id" id="matiere_id" maxlength="50"></td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
