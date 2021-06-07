<?php

require_once('connection.php');

function DBExecute($sql){
    $link = DBConnect();
    $result = @mysqli_query($link, $sql) or die(mysqli_error($link));
    
    DBClose($link);
    return $result;
}