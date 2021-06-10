<?php

// Inicializa a sessão
session_start();

// Remove todas as variáveis de sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona para a página principal
header('location: ../index.php');
exit;