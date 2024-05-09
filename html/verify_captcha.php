<?php

// Start the session (if not already started)
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the user's response to the CAPTCHA challenge from the form
    $userInput = $_POST['captchaInput'];

    // Retrieve the CAPTCHA challenge text from the session
    $captchaText = isset($_SESSION['captcha']) ? $_SESSION['captcha'] : '';

    // Check if the user's response matches the CAPTCHA challenge text
    if (strcasecmp($userInput, $captchaText) == 0) {
        // CAPTCHA challenge passed
        echo "CAPTCHA verification successful! You are human.";
    } else {
        // CAPTCHA challenge failed
        echo "CAPTCHA verification failed! Please try again.";
    }

    // Unset the CAPTCHA challenge text from the session (optional)
    unset($_SESSION['captcha']);
} else {
    // If the form was not submitted via POST method, redirect to the home page or display an error message
    header("Location: Event.php"); // Replace index.php with the appropriate URL
    exit;
}

?>
