<?php

require_once 'db/connection.php';
require_once 'db/database.php';

$link = DBConnect();

if (isset($_POST['search']) && !empty($_POST['search'])) {
    $pesquisa = $_POST['search'];

    $sql = "SELECT * FROM comercio WHERE nome_comercio = '$pesquisa' OR descricao = '$pesquisa'";

    $result = DBExecute($sql);
    $num_results = mysqli_num_rows($result);
    
    if ($num_results > 0):
        foreach ($result as $comercio):?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-overlay align-items-center d-flex">
                        <?php $vitrine = "../uploads/". $comercio['nome_comercio']. "-vitrine.png"?>
                        <h4>
                            <a class="card-link" href="../anuncio.php?id=<?= $comercio['id_comercio']?>">
                            <?= $comercio['nome_comercio']?>
                            </a>
                            </h4>
                        </div>
                        <img class="img-fluid w-100 rounded" src="<?= $vitrine?>" />
                        <div class="card-body">
                            <h4 class="card-title"><?= $comercio['categoria']?></h4>
                        </div>
                    </div>
            </div>
<?php
        endforeach;
    endif;
}

