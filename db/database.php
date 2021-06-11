<?php

require_once 'connection.php';

function DBCreate($tabela, array $dados) {
    $dados = DBEscape($dados);

    $campos_tabela = implode(', ', array_keys($dados));
    $valores = "'". implode("', '", $dados). "'";

    $query = "INSERT INTO {$tabela} ( {$campos_tabela} ) VALUES ( $valores )";

    return DBExecute($query);
}

function DBExecute($sql) {
    $link = DBConnect();
    $result = @mysqli_query($link, $sql) or die(mysqli_error($link));

    DBClose($link);
    return $result;
}