<?php require_once 'includes/header.html' ?>
    <div class="py-5 text-center text-white h-100 align-items-center d-flex" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(&quot;assets/images/pizza/frente-pizzaria.jpg&quot;); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat;" alt="frente-pizzaria">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <h1 class="display-3 mb-4">Pepperoni Fornalha</h1>
                    <p class="lead mb-5">A Peperoni a melhor em qualidade e sabor na região Oferecemos amplo cardápio de pizzas, calzones, lasanhas, e porções. Aceitamos encomendas para eventos pequenos e aniversário.</p>
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
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid">
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
                                <a href="https://facebook.com/pagina" style="color: #e8f3ff;">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </button>
                        </h1>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Whatsapp</th>
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
                <a href=" https://www.google.com/maps/search/?api=1&parameters">Rua Exemplo, 1. Jardim dos Campos, Campinas, São Paulo.</a>
            </p>
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.html' ?>