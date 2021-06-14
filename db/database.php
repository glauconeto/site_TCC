<?php

require_once("connection.php");

//Realizar a inserção de dados
function DBCreate($tabela, array $dados){
    $dados = DBEscape($dados);

    $campos_tabela = implode(', ', array_keys($dados));
    $valores       = "'".implode("', '", $dados)."'";

    $query = "INSERT INTO {$tabela} ( {$campos_tabela} ) VALUES ( $valores )";
    
    return DBExecute($query);
}

//Executar Query SQL
function DBExecute($sql){
    $link   = DBConnect();
    $result = @mysqli_query($link, $sql) or die(mysqli_error($link));
    
    DBClose($link);
    return $result;
}

function get_last_id() {
    $query = 'SELECT * FROM comerciante WHERE id_comerciante = (SELECT max(id_comerciante) FROM comerciante)';

    if($result = DBExecute($query)) {
        while($row = mysqli_fetch_assoc($result)) {
            return intval($row['id_comerciante']);
        }
    }

    DBClose($link);
}