<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #909090f28f; /* Light green background color */
        }
        .login-form {
            width: 340px;
            margin: 50px auto;
        }
        .login-form form {
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
            border-radius: 10px;
        }
        .login-form h1 {
            text-align: center;
            color: black; 
        }
        .login-form p {
            text-align: center;
        }
        .login-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .login-form input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h1>Sign Up Now !</h1>

        <?php
            // Check if there is any login error message
            if (isset($_GET['login_err'])) {
                $login_err = $_GET['login_err'];
                switch ($login_err) {
                    case 'not_exist':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur:</strong> User does not exist!
                        </div>
                        <?php
                        break;
                    case 'wrong_password':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur:</strong> Incorrect password!
                        </div>
                        <?php
                        break;
                    case 'unknown_role':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur:</strong> Unknown user role!
                        </div>
                        <?php
                        break;
                    default:
                        break;
                }
            }
        ?>
        <form action="../controller/userC/login.php" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            
            <input type="submit" value="Login">
            <p>If you don't have an account yet, <a href="register.php">register here</a>.</p>

        </form>
    </div>
</body>
</html>