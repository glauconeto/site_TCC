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
            $sql = "select * from comercio";
            $result = mysqli_query($bd,$sql);
            $num_results = mysqli_num_rows($result);

            
            if ($result) {
                if (count($result) > 0) {
                    foreach ($result as $comercio) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card">';
                        echo '<div class="card-img-overlay align-items-center d-flex">';

                        $vitrine = "uploads/". $comercio['nome_comercio']. '-vitrine.png';
                        echo '<h4><a class="card-link" href="anuncio.php?id='. $comercio['id_comercio'].'">'. $vitrine.'</a>';
                                    echo '</h4>';
                                echo '</div>';
                                echo '<img class="img-fluid w-100 rounded" src="' .$vitrine. '"/>';
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
            mysqli_close($bd);
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
                    <a href="#" class="btn btn-primary">Restaurantes</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/hortifruti.jpg" class="figure-img img-fluid rounded" alt="Categoria Alimentos">
                    </figure>
                    <a href="#" class="btn btn-primary">Alimentos</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/livros.jpg" class="figure-img img-fluid rounded" alt="Categoria Livros">
                        
                    </figure>
                    <a href="" class="btn btn-primary">Livros</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/restaurantes.jpg" class="figure-img img-fluid rounded" alt="Categoria restaurantes">
                    </figure>
                    <a href="#" class="btn btn-primary">Restaurantes</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/roupas.jpg" class="figure-img img-fluid rounded" alt="Categoria Roupas">
                    </figure>
                    <a href="#" class="btn btn-primary">Roupas</a>
                </div>
            </div>
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <figure class="figure">
                        <img src="assets/images/categorias/tecnologia.jpg" class="figure-img img-fluid rounded" alt="Categoria Tecnologia">
                    </figure>
                    <a href="#" class="btn btn-primary">Tecnologia</a>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.html'?>