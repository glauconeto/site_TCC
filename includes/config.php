<?php

$host = 'localhost';
$user = 'neto';
$password = 'netozica';
$bd = 'db_tcc';
   
@$bd= mysqli_connect($host, $user, $password, $bd);
 
if (!$bd){
    die('<strong>Erro de Conexão: não foi possível se 
        conectar ao Banco de Dados!</strong>');
}