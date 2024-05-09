<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
session_start();

require '../../View/Frontoffice/phpmailer/src/Exception.php';
require '../../View/Frontoffice/phpmailer/src/PHPMailer.php';
require '../../View/Frontoffice/phpmailer/src/SMTP.php';
include '../../controller/utilisateurC.php';
require('config2.php');
$email = $_SESSION['em'];
$mdp = $_SESSION['md'];
$code = $_SESSION['rand'];

if(isset($_POST['submit']))
{ 
   if(isset($_POST['code']))
   
    {
        if($code==$_POST['code']){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true ;
        $mail->Username = 'yassminehamadi2@gmail.com' ;
        $mail->Password = 'mmto lvxv yoap bzpt' ;
        $mail->SMTPSecure = 'ssl' ;
        $mail->Port = 465 ;


        $mail->SetFrom('yassminehamadi2@gmail.com') ;

        $mail->AddAddress($email) ;

        $mail->isHTML(true) ;

        $mail->Subject = "recuperation mot de passe" ;
        $mail->Body = $mdp ;

        $mail->send() ;
        session_destroy();
        header("location:login.php");
    }
    else{
        header("location:oublie.php");
    }
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
  
  <link rel="stylesheet" href="log.css">
</head>
<body>
  <div class="container">
  
    <input type="checkbox" id="check">
    <div class="login form">
      <header>ENTER CODE</header>
               <form method="POST" action="" >
                <input type="number" name="code" placeholder="Enter code recieved" class="form-control">
                <input type="submit" name="submit" class="button" value="valider">


    </form> 
    </div>

  </div>
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
        alert("nom obligatoire");
        return false;
    }
    if(prenom.length==0 ){
        alert("prenom obligatoire");
        return false;
    }
    if(age.length==0 ){
        alert("age obligatoire");
        return false;
    }
    if(tel.length==0 ){
        alert("tel  obligatoire");
        return false;
    }
    if(rôle.length==0 ){
        alert("rôle  obligatoire");
        return false;
    }
    if(email.length==0 || email.indexOf("@")==-1 || email.indexOf(".")==-1 || email.indexOf(".")>email.indexOf("@")){
        alert("email invalid");
        return false;
    }
    if(pwd.length==0 ){
        alert("Mot de passe obligatoire");
        return false;
    }

    if(pwd1==0 ){
        alert("Mot de passe obligatoire");
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
</script>
</body>
</html>
