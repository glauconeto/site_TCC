<?php

require_once 'db/connection.php';
require_once 'db/database.php';

$link = DBConnect();

$method = $_GET['method'];
$user_id = $_GET['user_id'];
$commerce_id = $_GET['commerce_id'];

if ($method == "Like") {
    DBExecute("INSERT INTO favorito (id_usuario, id_comercio) VALUES ('$user_id', '$commerce_id')");
} else {
    DBExecute("DELETE FROM favorito WHERE id_usuario = '$user_id' AND id_comercio = '$commerce_id'");
}