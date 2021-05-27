<?php
require_once 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Faz a criação das variáveis com os valores vindos do formulário 
    // de cadastro
    if (!empty($_POST)) {
        $nomePessoa = isset(trim($_POST['nameperson'])) ? $_POST['nameperson'] : $erro = 'Nome da pessoa incorreto ou inválido';
        $email = isset(trim($_POST['email']))) ? $_POST['email'] : $erro = 'E-mail incorreto ou inválido';
        $nomeestabelecimento = isset(trim($_POST['nameplace']))) ? $_POST['nameplace'] : $erro = 'Erro com o nome do estabelecimento';
        $fone = isset(isset(trim($_POST['telefone'])) ? $_POST['telefone'] : $erro = 'Telefone inválido ou incompleto';
        $celular = isset(trim($_POST['celular'])) ? $_POST['celular'] : $erro = 'Número de celular incorreto';
        $facebook = isset(trim($_POST['facebook'])) ? $_POST['facebook'] : $erro = 'Facebook incorreto';
        $endereco = isset(trim($_POST['endereco']))) ? $_POST['endereco'] : $erro = 'Endereço inválido';
        $descricao = isset(trim($_POST['descricao']))) ? $_POST['descricao'] : $erro = 'Descrição inválida';
    } else {
        echo '<div class="alert alert-danger">'. $erro. '</div>';
    }
    /*
    Telefone = 10 dígitos
    Telefone celular(chip) = 11 dígitos
    */
    
    if (empty($error)) {
        // BD com PDO
    }
}