<?php
$title = 'Início';
require_once 'includes/header.php';

?>

<div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-3">Bem-vindo ao nosso site</h1>
                    <p class="lead text-muted">Encontre o que precisa rapidamente</p>
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>Escolha Categorias</h3>
                                    <p>
                                        Temos diversas categorias para você escolher o que fazer,
                                        dentre roupas, livros, comida, restaurantes e outros!
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <h3>Conheça diversos lugares fantásticos</h3>
                                    <p>Explore lugares divertidos para comprar diversos produtos e roupas diferentes do habitual.</p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Estabelecimentos</h2>
                    <hr class="mb-4">
                </div>
            </div>
            <div class="row">
            <!-- Adaptar para o banco de dados para cada comércio -->
            <?php
            // Inclui arquivo de configuração e conexão do bd
            require_once "includes/config.php";

            // Atente-se a execução da query preparada
            $stmt = $pdo->prepare('SELECT * FROM comercio');
            $stmt->execute();
            $result = $stmt->fetchAll();

            if ($result) {
                if (count($result) > 0) {
                    foreach ($result as $comercio) {
                        echo '<div class="col-md-4">';
                            echo '<div class="card">';
                                echo '<div class="card-img-overlay align-items-center d-flex">';
                                    echo '<h4><a class="card-link" href="anuncio.php?id='. $comercio['id_comercio'].'">'.$comercio["nome_comercio"].'</a>';
                                    echo '</h4>';
                                echo '</div>';
                            echo '<img class="img-fluid w-100 rounded" src="assets/images/pizza/frente-pizzaria.jpg" alt="Imagem comercio">';
                            echo '<div class="card-body">';
                                echo '<h4 class="card-title">'. $comercio["categoria"]. '</h4>';
                            echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    unset($result);
                } else {
                    echo '<div class="alert alert-danger"><em>Sem registros encontrados</em></div>';
                }
            } else {
                echo "OPA! Algo de errado aconteceu, tente novamente depois";
            }

            // Fecha a conexão
            unset($pdo);
            ?>
            
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Categorias</h2>
            </div>
        </div>

        <div class="row row-cols-6">
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/roupas.jpg" class="figure-img img-fluid rounded" alt="categoria-roupas">
                    </figure>
                    <a href="#" class="btn btn-primary">Alimentos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/hortifruti.jpg" class="figure-img img-fluid rounded" alt="">
                        <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
                    </figure>
                    <a href="#" class="btn btn-primary">Alimentos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/hortifruti.jpg" class="figure-img img-fluid rounded" alt="">
                        <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
                    </figure>
                    <a href="" class="btn btn-primary">Alimentos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/hortifruti.jpg" class="figure-img img-fluid rounded" alt="">
                        <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
                    </figure>
                    <a href="#" class="btn btn-primary">Alimentos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/hortifruti.jpg" class="figure-img img-fluid rounded" alt="">
                        <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
                    </figure>
                    <a href="#" class="btn btn-primary">Alimentos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/hortifruti.jpg" class="figure-img img-fluid rounded" alt="">
                        <figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
                    </figure>
                    <a href="#" class="btn btn-primary">Alimentos</a>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.html'?>