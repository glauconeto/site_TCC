<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location: index.php');
    exit;
}

// require_once 'includes/config.php';

$username = $password = '';
$username_err = $password_err = $login_err = '';

$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['token']) && isset($_POST['token']) == $_POST['token']) {
    if (empty(trim($_POST['username']))) {
        $username_err = 'Por favor digite seu nome de usuário';
    } else {
        $username = trim($_POST['username']);
    }
    
    if (empty(trim($_POST['password']))) {
        $password_err = 'Por favor digite sua senha';
    } else{
        $password =  trim($_POST['password']);
    }
    
    if (empty($username_err) && empty($password_err)) {
        $sql = 'SELECT id, username, password FROM users WHERE username=:username';
        
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            $param_username = $username;
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $hashed_password = $row['password'];

                        if (password_verify($password, $hashed_password)) {
                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;                          
                            
                            header('location: index.php');
                        } else {
                            $login_err = 'Usuário ou senha inválidos';
                        }
                    }
                } else {
                    $login_err = 'Usuário ou senha inválidos';
                }
            } else {
                echo 'OPA! Algo de errado aconteceu. Por favor tente novamente depois';
            }

            // Close statement
            unset($stmt);
        }
    }

    unset($pdo);
}

$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));

$title = 'Entrar';

require_once 'includes/header.html';

require_once 'templates/login.html';

require_once 'includes/footer.html';