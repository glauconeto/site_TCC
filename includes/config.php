<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'neto');
define('DB_PASSWORD', 'netozica');
define('DB_NAME', 'db_tcc');

// Atente-se a conectar a base de dados
try {
    $pdo = new PDO('mysql:host='. DB_SERVER .';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('ERRO: Não conseguiu se conectar. ' . $e->getMessage());
}
