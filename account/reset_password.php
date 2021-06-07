<?php
// Inicializa a sessão
session_start();
 
// Checa se o usuário esta logado, se sim redireciona para a página de login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: index.php');
    exit;
}
 
// Inclui o arquivo de configuração
require_once '../db/connection.php';
 
// Define variáveis e inicializa com valores vazios
$new_password = $confirm_password = '';
$new_password_err = $confirm_password_err = '';
 
// Processa dados do formulário quando é submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    // Valida nova senha
    if (empty(trim($_POST['new_password']))) {
        $new_password_err = 'Por favor digite a nova senha';
    } elseif (strlen(trim($_POST['new_password'])) < 8) {
        $new_password_err = 'Senha tem que ter no mínimo 8 caracteres';
    } else{
        $new_password = trim($_POST['new_password']);
    }
    
    // Valida a confirmação de senha
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Por favor confirme a senha';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = 'Senha não confere';
        }
    }
        
    // Checa erros de entrada antes de atualizar a base de dados
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepara uma declaração de atualização
        $sql = 'UPDATE users SET password = :password WHERE id = :id';
        
        if ($stmt = $pdo->prepare($sql)) {
            // Vincula variáveis à instrução preparada como parâmetros
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
            $stmt->bindParam(':id', $param_id, PDO::PARAM_INT);
            
            // Define parâmetros
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION['id'];
            
            // Atente-se a executar a declaração preparada
            if ($stmt->execute()) {
                // Senha atualizada com sucesso. Destrói a sessão, e redireciona para a sessão de login
                session_destroy();
                header('location: index.php');
                exit();
            } else {
                echo 'OPA! Algo de errado aconteceu, tente novamente depois';
            }

            // Fecha declaração
            unset($stmt);
        }
    }
    
    // Fecha conexão
    unset($pdo);
}

$title = 'Redefinição de Senha';

require_once 'includes/header.html';

require_once 'templates/reset_password.html';

require_once 'includes/footer.html';