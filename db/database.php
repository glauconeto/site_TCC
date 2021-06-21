<?php

require_once("connection.php");

// Seleciona registro do DB
function DBRead($tabela, $campos = '*', $parametros = null) {
    $query = "SELECT {$campos} FROM $tabela {$parametros}";
    $result = DBExecute($query);

    if (!mysqli_num_rows($result)) {
        return 'Nenhum dado encontrado';
    } else {
        while($res = mysqli_fetch_assoc($result)) {
            $dados[] = $res;
        }
    }

    return $dados;
}

// Realiza a inserção de dados
function DBCreate($tabela, array $dados){
    $dados = DBEscape($dados);

    $campos_tabela = implode(', ', array_keys($dados));
    $valores       = "'".implode("', '", $dados)."'";

    $query = "INSERT INTO {$tabela} ( {$campos_tabela} ) VALUES ( $valores )";
    
    return DBExecute($query);
}

// Executa Query SQL
function DBExecute($sql){
    $link   = DBConnect();
    $result = @mysqli_query($link, $sql) or die(mysqli_error($link));
    
    DBClose($link);
    return $result;
}

// Pega último id inserido da tabela comerciante
function get_last_id() {
    $query = 'SELECT * FROM comerciante WHERE id_comerciante = (SELECT max(id_comerciante) FROM comerciante)';

    if($result = DBExecute($query)) {
        while($row = mysqli_fetch_assoc($result)) {
            return intval($row['id_comerciante']);
        }
    }

    DBClose($link);
}