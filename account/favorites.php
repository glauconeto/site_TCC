<?php

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

                $sql = "SELECT comercio.id_comercio, comercio.nome_comercio, comercio.categoria FROM favorito f 
                INNER JOIN comercio ON comercio.id_comercio = f.id_comercio 
                INNER JOIN usuario ON usuario.id_usuario = f.id_usuario WHERE f.id_usuario = $id_user";

                DBExecute($sql);

                $result = DBExecute($sql);
                $num_results = mysqli_num_rows($result);

                if ($num_results > 0):
                    foreach ($result as $comercio): ?>
                    <div class="col-md-4">
                        <div class="card custom-card">
                            <div class="card-img-overlay align-items-center d-flex">
                                <?php $vitrine = "../uploads/". $comercio['nome_comercio']. "-vitrine.png" ?>
                                <h4>
                                    <a class="card-link" href="../anuncio.php?id=<?= $comercio['id_comercio'] ?>">
                                        <?= $comercio['nome_comercio'] ?>
                                    </a>
                                </h4>
                            </div>
                            <img class="img-fluid w-100 rounded" src="<?= $vitrine ?>" />
                            <div class="card-body">
                                <h4 class="card-title"><?= $comercio['categoria'] ?></h4>
                            </div>
                        </div>
                        <a class="btn btn-danger" href="unfavorite.php?id=<?= $comercio['id_comercio'] ?>" name="id" value="<?= trim($_GET['id']) ?>" title="Desfavoritar"><span class="fa fa-times"></span></a>
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