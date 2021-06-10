<?php

require_once '../db/connection.php';

$link = DBConnect();

// JOIN
$sql = 'SELECT * FROM comercio JOIN'

DBExecute($sql);

require_once '../includes/header.php';

?>

<h1></h1>

<?php require_once '../includes/footer.php'; ?>