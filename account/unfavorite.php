<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    include '../db/connection.php';
    include '../db/database.php';

    $link = DBConnect();

    $id_comercio = $_GET['id'];

    $sql = "DELETE FROM favorito WHERE id_comercio = '$id_comercio'";

    if(DBExecute($sql)) {
        header('Location: favorites.php');
    }
}