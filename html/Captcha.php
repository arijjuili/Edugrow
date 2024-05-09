<?php

// Start the session (if not already started)
session_start();

// Function to generate a random string for the CAPTCHA challenge
function generateRandomString($length = 6) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Generate a random string for the CAPTCHA challenge
$captchaText = generateRandomString();

// Store the CAPTCHA challenge in the session
$_SESSION['captcha'] = $captchaText;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Text CAPTCHA</title>
</head>
<body>
    <h1>Random Text CAPTCHA</h1>
    <p>Enter the following text:</p>
    <p><strong><?php echo $captchaText; ?></strong></p>
    <form action="verify_captcha.php" method="post">
        <label for="captchaInput">Enter the text above:</label><br>
        <input type="text" id="captchaInput" name="captchaInput" required><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
