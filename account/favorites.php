<?php

// JOIN
// $sql = 'SELECT * FROM comercio JOIN'

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

                // $id_usuario = $_SESSION['id'];

                $link = DBConnect();

                $sql = 'SELECT comercio.id_comercio, comercio.nome_comercio, comercio.categoria FROM favorito f INNER JOIN comercio ON comercio.id_comercio = f.id_comercio INNER JOIN usuario ON usuario.id_usuario = f.id_usuario ';

                DBExecute($sql);

                $result = DBExecute($sql);
                $num_results = mysqli_num_rows($result);

                if ($num_results > 0) {
                    foreach ($result as $comercio) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card">';
                        echo '<div class="card-img-overlay align-items-center d-flex">';

                        $vitrine = "../uploads/". $comercio['nome_comercio']. '-vitrine.png';
                        echo '<h4><a class="card-link" href="../anuncio.php?id='. $comercio['id_comercio'].'">'. $comercio['nome_comercio'].'</a>';
                                    echo '</h4>';
                                echo '</div>';
                                echo '<img class="img-fluid w-100 rounded" src="' .$vitrine. '"/>';
                            echo '<div class="card-body">';
                                echo '<h4 class="card-title">'. $comercio['categoria']. '</h4>';
                            echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    unset($result);
                } else {
                    echo '<div class="alert alert-danger"><em>Sem registros encontrados</em></div>';
                }
            ?>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.html' ?>