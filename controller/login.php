<?php
require_once '../../config.php'; // Include the database connection
//session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if the form is submitted via POST


    // Check if the user exists
    $db = config::getConnexion();
    $check = $db->prepare('SELECT id, pseudo, email, password, role FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();

    if (!$data) { // If user does not exist
        header('Location: ../../view/login.php?login_err=not_exist');
        exit();
    }

    // Verify password
    if (password_verify($password, $data['password'])) {
        // Start a new session and store user data
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['role'] = $data['role'];

        // Redirect based on user role
        switch ($data['role']) {
            case 'admin':
                header('Location: ../../view/public/index.php');
                exit();
            case 'user':
                header('Location: ../../view/index.php');
                exit();
            default:
                header('Location: ../../view/login.php?login_err=unknown_role');
                exit();
        }
    } else {
        header('Location: ../../view/login.php?login_err=wrong_password');
        exit();
    }
} else {
    // If the form is not submitted via POST, redirect to the login page
    header('Location: ../../view/index.html');
    exit();
}
?>