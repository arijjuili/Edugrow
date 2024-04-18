<?php

include '../Controller/MatiereC.php';

$error = "";
$MatiereC = null;

$MatiereC = new MatiereC();
if (
    isset($_POST["Nom"]) &&
    isset($_POST["Niveau"]) &&
    isset($_POST["Description"])
) {
    if (
        !empty($_POST['Nom']) &&
        !empty($_POST["Niveau"]) &&
        !empty($_POST["Description"])
    ) {
        $Matiere = new Matiere(
            null,
            $_POST['Nom'],
            $_POST['Niveau'],
            $_POST['Description']
        );
        $MatiereC->addMatiere($Matiere);
        header('Location:listMatiere.php'); 
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Matiere</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="scriptmat.js"></script>

</head>
<body>
    <a href="listMatiere.php">Retour à la liste</a>
    <hr>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm2();" novalidate>>
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="Nom">Nom:
                    </label>
                </td>
                <td><input type="text" name="Nom" id="Nom" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="Niveau">Niveau:
                    </label>
                </td>
                <td><input type="text" name="Niveau" id="Niveau" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="Description">Description:
                    </label>
                </td>
                <td><input type="text" name="Description" id="Description" maxlength="255"></td>
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
