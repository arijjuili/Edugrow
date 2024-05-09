<?php
include "../../controller/utilisateurC.php";
include "../../model/Utilisateur.php";


$error = "";


$yass = null;


$yassC = new UtilisateurC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["age"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["rôle"]) &&
    isset($_POST["email"])&&
    isset($_POST["pwd"])&&
    isset($_POST["pwd1"]) 

) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["age"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["rôle"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["pwd"]) &&
        !empty($_POST["pwd1"]) 
       
    ) {
        $yass = new Utilisateur(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['age'],
            $_POST['tel'],
            $_POST['rôle'],
            $_POST['email'],
            $_POST['pwd']
    
        );
        $yassC->addUser($yass);
        header('Location:listUtilisateur.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="listUtilisateur.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    
    <form action="" method="POST" onsubmit="return test()"> 
    <table border="1" align="center" >
        <tr>
            <td><label for="nom">Nom :</label></td>
            <td><input type="text" name="nom" id="nom" maxlength="20"></td>
        </tr>
        <tr>
            <td><label for="prenom">Prénom :</label></td>
            <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
        </tr>
        <tr>
            <td><label for="age">Âge :</label></td>
            <td>
                <select name="age" id="age">
                    <option value="">Sélectionner l'âge</option>
                    <!-- Ajoutez des options pour l'âge à partir de 6 ans -->
                    <?php
                    for ($i = 6; $i <= 100; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="tel">Téléphone :</label></td>
            <td><input type="text" name="tel" id="tel"></td>
        </tr>
        <tr>
            <td><label for="rôle">Rôle :</label></td>
            <td>
                <select name="rôle" id="rôle">
                    <option value="etudiant">Étudiant</option>
                    <option value="admin">Administrateur</option>
                    <option value="responsable_cours">Responsable des cours</option>
                    <option value="responsable_event">Responsable des événements</option>
                    <option value="responsable_dons">Responsable des dons</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="email">Email :</label></td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td><label for="pwd">Mot de passe :</label></td>
            <td>
                <input type="password" name="pwd" id="pwd">
                <button type="button" onclick="togglePasswordVisibility('pwd')">👁️</button>
            </td>
        </tr>
        <tr>
            <td><label for="pwd1">Confirmation du mot de passe :</label></td>
            <td>
                <input type="password" name="pwd1" id="pwd1">
                <button type="button" onclick="togglePasswordVisibility('pwd1')">👁️</button>
            </td>
        </tr>
        <tr align="center">
            <td><input type="submit" value="Save" ></td>
            <td><input type="reset" value="Reset"></td>
        </tr>
    </table>
</form>
<!--<script src="test.js"></script>-->

<script>
    function test(){
        nom=document.getElementById("nom").value;
        prenom=document.getElementById("prenom").value;
    age=document.getElementById("age").value;
    tel=document.getElementById("tel").value;
    rôle=document.getElementById("rôle").value;
    email=document.getElementById("email").value;
    pwd=document.getElementById("pwd").value;
    pwd1=document.getElementById("pwd1").value;

    if(nom.length==0 ){
        alert("nom invalid");
        return false;
    }
    if(prenom.length==0 ){
        alert("prenom invalid");
        return false;
    }
    if(age.length==0 ){
        alert("age invalid");
        return false;
    }
    if(tel.length==0 ){
        alert("tel  invalid");
        return false;
    }
    if(rôle.length==0 ){
        alert("rôle  invalid");
        return false;
    }
    if(email.length==0 || email.indexOf("@")==-1 || email.indexOf(".")==-1 || email.indexOf(".")>email.indexOf("@")){
        alert("email invalid");
        return false;
    }
    if(pwd.length==0 ){
        alert("Mot de passe invalid");
        return false;
    }

    if(pwd1==0 ){
        alert("Mot de passe invalid");
        return false;
    }
}
    function togglePasswordVisibility(fieldId) {
        var pwdField = document.getElementById(fieldId);
        if (pwdField.type === "password") {
            pwdField.type = "text";
        } else {
            pwdField.type = "password";
        }
    }


 
</script>

</body>

</html>