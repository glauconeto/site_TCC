<?php

require_once 'config.php';

// Fecha conexão com o DB
function DBClose($link){
    @mysqli_close($link) or die(mysqli_error($link));
}

// Cria conexão com o DB
function DBConnect() {
    $link = mysqli_connect(DB_HOSTNAME, DB_USER, DB_PASSWORD, DB_DATABASE);
    if (!$link) {
        die('<strong>Erro de Conexão: não foi possível se 
            conectar ao Banco de Dados!</strong>');
    }
    mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
    
    return $link;
}