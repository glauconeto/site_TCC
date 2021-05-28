<?php
require_once 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Faz a criação das variáveis com os valores vindos do formulário 
    // de cadastro
    if (!empty($_POST)) {
        $nomePessoa = isset(trim($_POST['nameperson'])) ? $_POST['nameperson'] : null;
        $email = isset(trim($_POST['email']))) ? $_POST['email'] : null;
        $nomeestabelecimento = isset(trim($_POST['nameplace']))) ? $_POST['nameplace'] : null;
        $fone = isset(isset(trim($_POST['telefone'])) ? $_POST['telefone'] : null;
        $celular = isset(trim($_POST['celular'])) ? $_POST['celular'] : null;
        $facebook = isset(trim($_POST['facebook'])) ? $_POST['facebook'] : null;
        $endereco = isset(trim($_POST['endereco']))) ? $_POST['endereco'] : null;
        $descricao = isset(trim($_POST['descricao']))) ? $_POST['descricao'] : null;
    }

    // Validar e-mail

    // Processa os dados do formulário para inserção do formulário
    if (empty($error)) {
        $stmt = $pdo->prepare('INSERT INTO comercio() VALUES()');
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
}