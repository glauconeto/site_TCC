<?php

session_start();

// require_once 'includes/config.php';
 
$username = $password = $email = $confirm_password = '';
$username_err = $email_err = $password_err = $confirm_password_err = '';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Valida o e-mail
	if(empty(trim($_POST['email']))) {
		$email_err = 'Por favor digite um e-mail';
	} else {
        $sql = 'SELECT id FROM users WHERE email = :email';

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            
            $param_email = trim($_POST['email']);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $email_err = 'Esse nome de e-mail já esta sendo usado';
                } else {
                    $email = trim($_POST['email']);
                }
            } else {
                echo 'OPA! Algo de errado aconteceu. Por favor tente novamente depois';
            }

            unset($stmt);
        }
    }
 
    // Valida o nome de usuário
    if (empty(trim($_POST['username']))) {
        $username_err = 'Por favor digite um nome de usuário';
    } else {
        $sql = 'SELECT id FROM users WHERE username = :username';
        
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            $param_username = trim($_POST['username']);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $username_err = 'Esse nome de usuário já esta sendo usado';
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo 'OPA! Algo de errado aconteceu. Por favor tente novamente depois';
            }

            unset($stmt);
        }
    }
    
    // Valida a senha
    if (empty(trim($_POST['password']))) {
        $password_err = 'Por favor digite uma senha';
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = 'Sua senha tem que ter no mínimo 6 caracteres';
    } else {
        $password = trim($_POST['password']);
    }
    
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Por favor confirme a sua senha';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = 'Senha não confere';
        }
    }
    
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)) {
        
        $sql = 'INSERT INTO users (email, username, password) VALUES (:email, :username, :password)';
         
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if ($stmt->execute()) {
                header('location: login.php');
            } else {
                echo 'OPA! Algo de errado aconteceu. Por favor tente novamente depois';
            }

            unset($stmt);
        }
    }
    
    unset($pdo);
}

$title = 'Cadastre-se';

require_once 'includes/header.html';

require_once 'templates/register.html';

require_once 'includes/footer.html';