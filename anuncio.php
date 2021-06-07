<?php

include ("db/connection.php");
include('db/database.php');

$link = DBConnect();

// Atente-se a execução da query preparada
$sql = "SELECT * FROM comercio";
$result = DBExecute($sql);
$num_results = mysqli_num_rows($result);


$title = 'Anuncio Teste';
require_once 'includes/header.php';

foreach ($result as $comercio) {
?>
    <div class="py-5 text-center text-white h-100 align-items-center d-flex" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(''); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat;" alt="frente-pizzaria">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <h1 class="display-3 mb-4"></h1>
                    <p class="lead mb-5"><?php echo $comercio['descricao']; ?></p>
                    <button class="btn btn-warning" type="submit">Favoritar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <h2>Galeria de Imagens</h2>
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="assets/images/pizza/interior.jpg" class="d-block w-100" alt="Imagem interior pizzaria">
                          </div>
                          <div class="carousel-item">
                            <img src="assets/images/pizza/forno.jpg" class="d-block w-100" alt="Imagem fornalha a lenha">
                          </div>
                          <div class="carousel-item">
                            <img src="assets/images/pizza/delivery.jpg" class="d-block w-100" alt="Imagem delivery">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Próxima</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Informações de contato</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Forma de Contato</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Telefone</th>
                    <td>
                        <h1>
                            <button class="btn btn-info">
                                <a href="https://phone:+5519123456789" style="color: #e8f3ff;">
                                    <i class="fa fa-phone"></i>
                                </a>
                            </button>
                        </h1>
                    </td>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Facebook</th>
                    <td>
                        <h1>
                            <button class="btn btn-info">
                                <a href="https://facebook.com/"<?php echo $comercio['facebook']; ?> style="color: #e8f3ff;">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </button>
                        </h1>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Celular (Whatsapp)</th>
                    <td>
                        <h1>
                            <button class="btn btn-info">
                                <a href="https://api.whatsapp.com/send?phone=5519123456789" style="color: #e8f3ff;"></a>
                                <i class="fa fa-whatsapp"></i>
                            </button>
                        </h1>
                    </td>
                  </tr>
                </tbody>
            </table>
            <h1>Endereço</h1>            
            <p style="padding-top: 10px;">
                <a href="https://www.google.com/maps/search/?api=1&parameters">Rua Exemplo, 1. Jardim dos Campos, Campinas, São Paulo.</a>
            </p>
            </div>
        </div>
    </div>
<?php 
// Fecha a conexão
DBClose($link);
require_once 'includes/footer.html' ?>