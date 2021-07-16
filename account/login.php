<?php

require_once '../db/connection.php';

$link = DBConnect();

$username = $password = '';
$username_err = $password_err = $login_err = '';
$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: ../index.php');
    exit;
}
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor digite um nome de usuário.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor digite sua senha.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_usuario, nome, senha FROM usuario WHERE nome = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1) {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("Location: ../index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Nome de usuário ou senha incorretos";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Nome de usuário ou senha incorretos";
                }
            } else{
                echo "OPA! Algo de errado aconteceu. Tente novamente depois.";
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

require_once '../templates/login.php';

require_once '../includes/footer.html';