<?php

include 'db/connection.php';
include 'db/database.php';

$id = $_GET['id'];
  
$link = DBConnect();
  
$sql = "SELECT * FROM comercio WHERE id_comercio = '$id'";
$result = DBExecute($sql);
$num_results = mysqli_num_rows($result);

DBClose($link);


$title = 'Anúncio';
require_once 'includes/header.php';
if($num_results > 0) {
  foreach ($result as $comercio) {
    $vitrine = "uploads/". $comercio['nome_comercio']. '-vitrine.png';
?>
    <div class="py-5 text-center text-white h-100 align-items-center d-flex" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('<?php echo $vitrine ?>'); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat;" alt="frente-pizzaria">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <h1 class="display-3 mb-4"></h1>
                    <h3><?php echo $comercio['nome_comercio'] ?></h3>
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
                            <?php $imagem1 = "uploads/". $comercio['nome_comercio']. '-1.png' ?>
                            <img src="<?php echo $imagem1 ?>" class="d-block w-100" alt="Imagem 1">
                          </div>
                          <div class="carousel-item">
                            <?php $imagem2 = 'uploads'. $comercio['nome_comercio']. '-2.png'?>
                            <img src="<?php echo $imagem2 ?>" class="d-block w-100" alt="Imagem 2"
                          </div>
                          <div class="carousel-item">
                          <?php $imagem3 = "uploads/". $comercio['nome_comercio']. '-3.png' ?>
                            <img src="<?php echo $imagem3 ?>" class="d-block w-100" alt="Imagem 3">
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
                          <p style="font-size: 25px;"><?php echo $comercio['telefone'] ?></p>
                      </h1>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Facebook</th>
                    <td>
                        <h1>
                          <a href="https://facebook.com/<?php echo $comercio['facebook']; ?>" target="_blank" style="color: #e8f3ff;">
                            <button class="btn btn-info">
                                    <i class="fa fa-facebook"></i>
                                  </button>
                          </a>
                        </h1>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Celular (Whatsapp)</th>
                    <td>
                        <h1>
                          <a href="https://api.whatsapp.com/send?phone=<?php echo $comercio['celular']; ?>" target="_blank" style="color: #e8f3ff;">
                            <button class="btn btn-info">
                                <i class="fa fa-whatsapp"></i>
                              </button>
                            </a>
                        </h1>
                    </td>
                  </tr>
                </tbody>
            </table>
            <h1>Endereço</h1>            
            <p style="padding-top: 10px;">
                <a href="https://www.google.com/maps/search/?api=+55<?php echo $comercio['endereco']?>" target="_blank"><?php echo $comercio['endereco']?></a>
            </p>
            </div>
        </div>
    </div>
<?php 

  }
}

require_once 'includes/footer.html' ?>