<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../db/connection.php';
    include '../db/database.php';

    $link = DBConnect();

    $id_comercio = $_POST['id'];

    $sql = "DELETE FROM favorito WHERE id_comercio = '$id_comercio'";

    if(DBExecute($sql)) {
        header('Location: favorites.php?defavoritado_com_sucesso');
    }
}

$title = 'Remover favorito';

require '../includes/header.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg'); background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-10 col-10 bg-white p-5 offset-md-1">
                    <div class="wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="mt-5 mb-3">Deletar Registro</h2>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                        <div class="alert alert-danger">
                                            <input type="hidden" name="id" value="<?= trim($_GET['id']) ?>"/>
                                            <p>Você tem certeza que quer desfavoritar esse comercio ?</p>
                                            <p>
                                                <input type="submit" value="Sim" class="btn btn-danger">
                                                <a href="favorites.php" class="btn btn-secondary ml-2">Não</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?= require '../includes/footer.html'?>