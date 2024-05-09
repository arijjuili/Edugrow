<?php
session_start();
include 'C:\xampp\htdocs\koukou\yass\controller\utilisateurC.php';
include '../../model/Utilisateur.php';


$db = 'mysql:dbname=edu_grow;host=localhost';
$user = 'root';
$password = '';
 
try
{
  $pdo = new PDO($db,$user,$password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo "PDO error".$e->getMessage();
  die();
}




if (isset($_SESSION['email'])) {
  header('Location:index.php');
  exit();
} else if (isset($_POST['submit'])) {

  $email = $_POST['email2'];
$pwd = $_POST['pwd2'];
}


if (isset($_SESSION['email'])) {
  header('Location:index.php');
  exit();
} else if (isset($_POST['submit'])) {

  $email = $_POST['email2'];
$pwd = $_POST['pwd2'];



 

  $res=UtilisateurC::listUsers($db);

  foreach($res as $t){
    if($t["email"]==$_POST["email2"] && $t["pwd"]==$_POST["pwd2"]){

      $_SESSION['id']=$t['id'];

      $_SESSION['email']=$_POST["email2"];
     // header("location:Backoffice");
     

    // Redirect based on role
    if($t["rôle"] == "Administrateur") {
      header("Location: ../../View/Backoffice/profile_admin.php");
    } elseif ($t["rôle"] == "Étudiant") {
      header("Location: profile_etudiant.php");
    } 
    elseif ($t["rôle"] == "Responsable des cours") {
      header("Location: profile_cours.php");
    } 
    elseif ($t["rôle"] == "Responsable des événements") {
      header("Location: profile_event.php");
    
    } 





    else {
      echo "Unknown role";
    }
    exit();
  }
}
echo "Email ou motdepasse invalid ";
}


$error = "";

$yass = null;

$yassC = new UtilisateurC();
if (
  isset($_POST["nom"]) &&
  isset($_POST["prenom"]) &&
  isset($_POST["age"]) &&
  isset($_POST["tel"]) &&
  isset($_POST["rôle"]) &&
  isset($_POST["email"]) &&
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
      $_POST['pwd'],

    );
    $yassC->addUser($yass);
    $_SESSION['email']=$_POST['email'];
    header('Location:index.php');
  } else {
    $error = "Missing information";
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form </title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="log.css">
  <title>reCAPTCHA demo: Simple page</title>
    
</head>
<body>
  <div class="container">
  
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      

      <?php
      if (isset($errors) && count($errors) > 0) {
        foreach ($errors as $error_msg) {
          echo '<div class="alert alert-danger">' . $error_msg . '</div>';
        }
      }
      ?>

<form method="POST" action="" onsubmit="return validateLoginForm()">
    <input type="text" name="email2" placeholder="Entrer email" class="form-control">
    <input type="password" name="pwd2" placeholder="Entrer Mot de passe " class="form-control">
    <form action="" method="POST">
      <div class="g-recaptcha" data-sitekey="6LeVKyopAAAAAMeKQFGy_mx252xbUHAQxfaZzeAJ"></div>
      <br/>
     
    <a href="oublie.php">Forgot password?</a> 
    <input type="submit" name="submit" class="button" id="sub" value="Login">
</form>

      <script>
    function validateLoginForm() {
        // Récupérer les valeurs des champs email et mot de passe
        var email = document.getElementsByName("email2")[0].value.trim();
        var pwd = document.getElementsByName("pwd2")[0].value.trim();

        // Vérifier si les champs sont vides
        if (email === "" || pwd === "") {
            alert("Veuillez remplir tous les champs.");
            return false; // Empêcher la soumission du formulaire
        }

        // Si la validation réussit, permettre la soumission du formulaire
        return true;
    }
</script>

      <div class="signup">
          Don't have an account?
         <label for="check">Signup</label>
      </div>
    </div>


    <div class="registration form">
      <header>Signup</header>
      <style>
    .password-container {
        position: relative;
    }
    .password-toggle {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>

<form method="POST" action="" onsubmit="return test()">
    <input type="text" name="nom" id="nom" placeholder="Nom">
    <input type="text" name="prenom" id="prenom" placeholder="Prénom">
    <input type="number" name="age" id="age" placeholder="Âge" min="6">
    <input type="tel" name="tel" id="tel" placeholder="Téléphone">
    
    <div>
        <input list="roles" name="rôle" id="rôle" placeholder="Rôle">
        <datalist id="roles">
            <option value="Étudiant">
            <option value="Administrateur">
            <option value="Responsable des cours">
            <option value="Responsable des événements">
            
        </datalist>
    </div>
    
    <input type="email" name="email" id="email" placeholder="Email">
    <div class="password-container">
        <input type="password" name="pwd" id="pwd" placeholder="Mot de passe">
        <i class="password-toggle" id="toggle-password">👁️</i>
    </div>
    <div class="password-container">
        <input type="password" name="pwd1" id="pwd1" placeholder="Confirmer le mot de passe">
        <i class="password-toggle" id="toggle-password1">👁️</i>
    </div>
    <input type="submit" class="button" value="S'inscrire">
</form>


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


    const togglePassword = document.getElementById('toggle-password');
    const togglePassword1 = document.getElementById('toggle-password1');
    const passwordInput = document.getElementById('pwd');
    const passwordInput1 = document.getElementById('pwd1');

    togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.textContent = type === 'password' ? '👁️' : '👁️';
    });

    togglePassword1.addEventListener('click', function() {
        const type = passwordInput1.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput1.setAttribute('type', type);
        this.textContent = type === 'password' ? '👁️' : '👁️';
    });
    $(document).on('click' , '#sub' , function(){

var response = grecaptcha.getResponse();
if(response.length==0){
   alert("please verify you are not a robot")
   return false;
}
})
</script>





      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>

    