<?php
session_start();

require_once '../db/connection.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['token'])) {
    $link = DBConnect();

    $username = $password = '';
    $username_err = $password_err = $login_err = '';

    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor digite um nome de usuário.";
    } else {
        $nome = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor digite uma senha.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_usuario, nome, senha FROM usuario WHERE nome = ?d";
        
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 's', $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Nome de usuário ou senha inválidos.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Nome de usuário ou senha inválidos.";
                }
            } else {
                echo "OPA! Algo de errado aconteceu. Por favor tente novamente depois.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    DBClose($link);
}

$title = 'Entrar';

require_once '../includes/header.php';

require_once '../templates/login.html';

require_once '../includes/footer.html';