<?php

// if(!isset($_SESSION['id'])) {
//     header('Location: login.php');
//     exit;
// }

$title = 'Meus favoritos';
require_once '../includes/header.php';

?>

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Meus Favoritos</h1>
                <hr class="mb-4">
            </div>
        </div>
        <div class="row">
            <?php

                include '../db/connection.php';
                include '../db/database.php';

                $link = DBConnect();
                $id_user = $_SESSION['id'];

                if ($dados = DBRead('favorito f', 'comercio.id_comercio, comercio.nome_comercio, comercio.categoria', "INNER JOIN comercio ON comercio.id_comercio = f.id_comercio 
                INNER JOIN usuario ON usuario.id_usuario = f.id_usuario WHERE f.id_usuario = $id_user ORDER BY nome_comercio")):
                    foreach ($dados as $comercio): ?>
                    <div class="col-md-4">
                        <div class="card custom-card">
                            <div class="card-img-overlay align-items-center d-flex">
                                <?php $vitrine = "../uploads/". $comercio['nome_comercio']. "-vitrine.png" ?>
                                <h4>
                                    <a class="card-link btn btn-outline-danger" href="../anuncio.php?id=<?= $comercio['id_comercio'] ?>">
                                        <?= $comercio['nome_comercio'] ?>
                                    </a>
                                </h4>
                            </div>
                            <img class="img-fluid w-100 rounded" src="<?= $vitrine ?>" />
                            <div class="card-body">
                                <h4 class="card-title"><?= $comercio['categoria'] ?></h4>
                                <a class="btn btn-danger" href="unfavorite.php?id=<?= $comercio['id_comercio'] ?>" name="id" value="<?= trim($_GET['id']) ?>" title="Desfavoritar"><span class="fa fa-times"></span></a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    endforeach;
                else:?>
                    <div class="alert alert-danger"><p>Sem favoritos encontrados</p></div>
                <?php endif;
            ?>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.html' ?>