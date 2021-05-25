<?php 

$title = 'Início';
require_once 'includes/header.html';

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
                                    <p>
                                        Explore lugares divertidos para comprar diversos produtos e roupas diferentes do habitual.
                                    </p>
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
                <!-- Implementar iteração para exibir cards dinamicamente -->
                <!-- foreach ($items as $item => $value): ?> -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-overlay align-items-center d-flex">
                            <h4 class="w-100 text-center"><a class="card-link" href="#">Card Image Overlay</a></h4>
                        </div>
                        <img class="img-fluid w-100 rounded" src="https://picsum.photos/600/600?image=1074" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Item</h4>
                            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                 <!-- endforeach -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-overlay align-items-center d-flex">
                            <h4 class="w-100 text-center"><a class="card-link" href="anuncio.html">Peperoni Fornalha</a></h4>
                        </div>
                        <img class="img-fluid w-100 rounded" src="assets/images/pizza/frente-pizzaria.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Pizzas, Restaurante</h4>
                            <p>Experimente as deliciosas pizzas da Peperoni Fornalha, com diversos tipos de massas e sabores.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-overlay align-items-center d-flex">
                            <h4 class="w-100 text-center"><a class="card-link" href="#">Card Image Overlay</a></h4>
                        </div>
                        <img class="img-fluid w-100 rounded" src="https://picsum.photos/600/600?image=1074" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Item</h4>
                            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-overlay align-items-center d-flex">
                            <h4 class="w-100 text-center"><a class="card-link" href="#">Card Image Overlay</a></h4>
                        </div>
                        <img class="img-fluid w-100 rounded" src="https://picsum.photos/600/600?image=1074" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Item</h4>
                            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-overlay align-items-center d-flex">
                            <h4 class="w-100 text-center"><a class="card-link" href="#">Card Image Overlay</a></h4>
                        </div>
                        <img class="img-fluid w-100 rounded" src="https://picsum.photos/600/600?image=1074" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Item</h4>
                            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-img-overlay align-items-center d-flex">
                        <h4 class="w-100 text-center"><a class="card-link" href="#">Card Image Overlay</a></h4>
                    </div>
                    <img class="img-fluid w-100 rounded" src="https://picsum.photos/600/600?image=1074" alt="Card image">
                    <div class="card-body">
                        <h4 class="card-title">Item</h4>
                        <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Categorias</h2>
                <hr class="mb-4">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-8 col-lg-6 text-black" id="my-card">
                <img src="assets/images/categorias/roupas.jpg" class="card-img" alt="categoria-roupas" width="400" height="300">
                <div class="card-img-overlay">
                  <h5 id="card-title-category">Roupas</h5>
                </div>
            </div>
            <div class="card bg-dark text-white" id="my-card">
                <img src="assets/images/categorias/tecnologia.jpg" class="categoria-tecnologia" alt="categoria-restaurante" width="400" height="300">
                <div class="card-img-overlay">
                  <h5 id="card-title-category">Tecnologia</h5>
                </div>
            </div>
            <div class="col-sm-3 col-md-8 col-lg-10 text-white" id="my-card" style="width:70%;">
                <img src="assets/images/categorias/hortifruti.jpg" class="card-img" alt="categoria-alimentos" width="400" height="300">
                <div class="card-img-overlay">
                  <h5 id="card-title-category">Alimentos</h5>
                </div>
            </div>
            <div class="card bg-dark text-white" id="my-card">
                <img src="assets/images/categorias/livros.jpg" class="card-img" alt="categoria-livros" width="400" height="300">
                <div class="card-img-overlay">
                  <h5 id="card-title-category">Livros</h5>
                </div>
            </div>
            <div class="card bg-dark text-white" id="my-card">
                <img src="assets/images/categorias/diversos.jpg" class="card-img" alt="categoria-diversos" width="400" height="300">
                <div class="card-img-overlay">
                  <h5 id="card-title-category">Diversos</h5>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.html' ?>