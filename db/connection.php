<?php

require_once('config.php');

//Prevenção contra SQL Injection
function DBEscape($dados){
    $link = DBConnect();

    if(!is_array($dados)) {
        $dados = mysqli_real_escape_string($link, $dados);
    } else {
        $array = $dados;

        foreach($array as $key => $value){
            $key    = mysqli_real_escape_string($link, $key);
            $value  = mysqli_real_escape_string($link, $value);

            $dados[$key] = $value;
        }
    } 

    DBClose($link);
    return $dados;
}

//Fecha conexão com o BD
function DBClose($link){
    @mysqli_close($link) or die(mysqli_error($link));
}

//Cria conexão com o BD
function DBConnect(){
    // $link = mysqli_connect(DB_HOSTNAME, DB_USER, DB_PASSWORD, DB_DATABASE);
    $link = mysqli_connect('localhost', 'glauco', 'zicaneto', 'db_TCC');
    if (!$link){
        die('<strong>Erro de Conexão: não foi possível se 
            conectar ao Banco de Dados!</strong>');
    }
    mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
    
    return $link;
}
