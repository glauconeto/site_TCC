<?php

session_start();

require_once '../db/connection.php';

$link = DBConnect();

$username = $password = $email = $confirm_password = '';
$username_err = $password_err = $confirm_password_err = '';

$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));

if($_SERVER["REQUEST_METHOD"] == "post" && isset($_SESSION['token'])) {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor digite um nome de usuário.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Nome de usuário pode conter apenas letras, números e underlines.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id_usuario FROM usuario WHERE nome = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 's', $param_username);
            
            // Set parameters
            $param_username = trim($_POST['username']);
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Esse nome de usuário já está sendo usado.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo mysqli_error($link);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))) {
        $password_err = "Por favor digite uma senha.";     
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have atleast 8 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Por favor confirme a senha.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Senhas não conferem.";
        }
    }
    
    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO usuario (nome, senha) VALUES (?, ?)";
         
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("Location: login.php");
            } else {
                echo 'OPA! Algo de errado aconteceu. Por favor tente novamente depois';
            }

            // Fecha a declaração
            mysqli_stmt_close($stmt);
        }
    }
    
    // Fecha a conexão
    DBClose($link);
}

$title = 'Cadastre-se';

require_once '../includes/header.php';

require_once '../templates/register.php';

require_once '../includes/footer.html';