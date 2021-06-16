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
            <?php
            // Inclui arquivo de configuração e conexão do db
            require_once 'db/connection.php';
            require_once 'db/database.php';

            $link = DBConnect();

            // Atente-se a execução da query preparada
            $sql = "SELECT * FROM comercio";
            $result = DBExecute($sql);

            $num_results = mysqli_num_rows($result);
            
            if ($num_results > 0):
                foreach ($result as $comercio): ?>
                <div class="col-md-4">
                    <div class="card custom-card">
                        <div class="card-img-overlay align-items-center d-flex">
                            <?php $vitrine = "../uploads/". $comercio['nome_comercio']. "-vitrine.png" ?>
                            <h4>
                                <a href="../anuncio.php?id=<?= $comercio['id_comercio']?>" class="card-link btn btn-outline-danger">
                                    <?= $comercio['nome_comercio'] ?>
                                </a>
                            </h4>
                        </div>
                        <img class="img-fluid w-100 rounded" src="<?= $vitrine ?>" />
                        <div class="card-body">
                            <h4 class="card-title"><?= $comercio['categoria'] ?></h4>
                        </div>
                    </div>
                </div>
                <?php 
                endforeach;
            else:?>
                <div class="alert alert-danger"><em>Sem comercios registrados</em></div>
            <?php endif;

            // Fecha a conexão
            DBClose($link);
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
                        <img src="assets/images/categorias/restaurantes.jpg" class="figure-img img-fluid rounded" alt="Categoria Roupas">
                    </figure>
                    <a href="search.php?q=Restaurantes" class="btn btn-danger">Restaurantes</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/hortifruti.jpg" class="figure-img img-fluid rounded" alt="Categoria Alimentos">
                    </figure>
                    <a href="search.php?q=Alimentos" class="btn btn-danger">Alimentos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/livros.jpg" class="figure-img img-fluid rounded" alt="Categoria Livros">
                    </figure>
                    <a href="search.php?q=Livros" class="btn btn-danger">Livros</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/diversos.jpg" class="figure-img img-fluid rounded" alt="Categoria Diversos">
                    </figure>
                    <a href="search.php?q=Diversos" class="btn btn-danger">Diversos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/roupas.jpg" class="figure-img img-fluid rounded" alt="Categoria Roupas">
                    </figure>
                    <a href="search.php?q=Roupas" class="btn btn-danger">Roupas</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/tecnologia.jpg" class="figure-img img-fluid rounded" alt="Categoria Tecnologia">
                    </figure>
                    <a href="search.php?q=Tecnologia" class="btn btn-danger">Tecnologia</a>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.html'?>