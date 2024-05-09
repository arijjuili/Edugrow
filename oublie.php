<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

require '../../View/Frontoffice/phpmailer/src/Exception.php';
require '../../View/Frontoffice/phpmailer/src/PHPMailer.php';
require '../../View/Frontoffice/phpmailer/src/SMTP.php';
include '../../controller\utilisateurC.php';
require('config2.php');

if(isset($_POST['submit'])) { 
    $rand = rand(1000, 9999);
    $email = $_POST['email'];
    $sql = "SELECT pwd FROM user WHERE email='$email'";
    $db = config::getConnexion();
    $query = $db->prepare($sql);
    $query->execute();
    $res = $query->fetch(PDO::FETCH_ASSOC);
    $motdepasse = $res['pwd'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yassminehamadi2@gmail.com';
        $mail->Password = 'mmto lvxv yoap bzpt';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender
        $mail->setFrom('yassminehamadi2@gmail.com', 'Your Name');

        // Recipient
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Password Recovery";
        $mail->Body = "Your temporary password is: $rand"; // Consider a structured email template

        // Save data in session
        $_SESSION['rand'] = $rand;
        $_SESSION['md'] = $motdepasse;
        $_SESSION['em'] = $email;

        // Send email
        $mail->send();
        header('location: code.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration Form</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Password Recovery</header>
            <form method="POST" action="">
                <input type="email" name="email" placeholder="Enter your Email" class="form-control">
                <input type="submit" name="submit" class="button" value="Recover">
            </form> 
        </div>
    </div>
    <script>
        // Password toggle function
        function togglePassword() {
            var x = document.getElementById("pwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>
