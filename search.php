<?php

require_once 'db/connection.php';
require_once 'db/database.php';

$link = DBConnect();

$title = 'Pesquisa';

require_once 'includes/header.php';

if (isset($_GET['q'])) {
    $search = DBEscape($_GET['q']);

    $sql = "SELECT * FROM comercio WHERE (`nome_comercio` LIKE '%$search%') OR (`descricao` LIKE '%$search%') OR (`categoria` LIKE '%$search%')";

    $result = DBExecute($sql);
    $num_results = mysqli_num_rows($result);
    
    if ($num_results > 0):?>
        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Resultados da pesquisa</h2>
                        <p>Foram encontrados <?= $num_results ?> resultados.</p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($result as $comercio):?>
                        <div class="col-md-4">
                            <div class="card custom-card">
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
                </div>
            </div>
        </div>
<?php
        endforeach;
    else:?>
        <p>Infelizmente, não temos nenhum resultado de acordo com sua busca.</p>
    <?php     
endif;
}

require_once 'includes/footer.html';