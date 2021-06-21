<?php

ob_start();
include 'db/connection.php';
include 'db/database.php';

$id = $_GET['id'];
$link = DBConnect();
$title = 'Anúncio';

DBClose($link);

include_once 'includes/header.php';

if($dados = DBRead('comercio', '*', "WHERE id_comercio = '$id'")) {
  foreach ($dados as $comercio) {
    $vitrine = "uploads/". $comercio['nome_comercio']. '-vitrine.png';
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
    <head>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script type="text/javascript">
      jQuery(document).ready(function($){
        $('.button').on('click', function(e){
            e.preventDefault();
            var user_id = $(this).attr('user_id');
            var commerce_id = $(this).attr('commerce_id');
            var method = $(this).attr('method');
            if (method == "Like") {
              $(this).attr('method', 'Unlike')
              $('#' + commerce_id).replaceWith('<i class="fa fa-heart" id="' + commerce_id + '"></i>')
            } else {
              $(this).attr('method', 'Like')
              $('#' + commerce_id).replaceWith('<i class="fa fa-heart-o" id="' + commerce_id + '"></i>')
            }
            $.ajax({
                url: 'favs.php',
                type: 'GET',
                data: {user_id: user_id, commerce_id: commerce_id, method: method},
                success: function(data){
                }
            });
        });

        $('#login').on('click', function() {
          window.location.href = 'account/login.php'
        })
      });
    </script>
    </head>
    <div class="py-5 text-center text-white h-100 align-items-center d-flex" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('<?php echo $vitrine ?>'); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat;" alt="Vitrine <?= $comercio['nome_comercio'] ?>">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <h1 class="display-3 mb-4"></h1>
                    <h3><?php echo $comercio['nome_comercio'] ?></h3>
                    <p class="lead mb-5"><?php echo $comercio['descricao'] ?></p>
                    <button class="btn btn-danger" type="button">
                      <?php

                        function checkFavorite($user_id, $commerce_id) {
                          $sql = "SELECT * FROM favorito WHERE id_comercio = '$commerce_id'";
                          $result = DBExecute($sql);
                          $num_results = mysqli_num_rows($result);

                          if (isset($_SESSION['id'])) {
                            if ($num_results == 0) {?>
                              <div class='button' method='Like' user_id='<?= $user_id ?>' commerce_id='<?= $commerce_id ?>'><i class="fa fa-heart-o" id="<?= $commerce_id ?>"></i></div>
                            <?php
                            } else {?>
                              <div class='button' method='Unlike' user_id='<?= $user_id ?>' commerce_id='<?= $commerce_id ?>'><i class="fa fa-heart" id="<?= $commerce_id ?>"></i></div>
                              <?php
                              }                           
                          } else {?>
                              <div id="login">Faça login para favoritar</div>
                            <?php
                          }
                        }
                        
                        $commerce_id = $_GET['id'];
                        $user_id = $_SESSION['id'];
                        
                        $icon = checkFavorite($user_id, $commerce_id);
                        echo $icon;
                      ?>
                      </button>
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
                            <?php $imagem1 = "uploads/". $comercio['nome_comercio']. '-0.png' ?>
                            <img src="<?php echo $imagem1 ?>" class="d-block w-100" alt="Imagem 1">
                          </div>
                          <div class="carousel-item">
                            <?php $imagem2 = 'uploads/'. $comercio['nome_comercio']. '-1.png'?>
                            <img src="<?php echo $imagem2 ?>" class="d-block w-100" alt="Imagem 2">
                          </div>
                          <div class="carousel-item">
                          <?php $imagem3 = "uploads/". $comercio['nome_comercio']. '-2.png' ?>
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
                            <button class="btn btn-info" data-toggle="popover" title="Facebook">
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
                          <a href="https://api.whatsapp.com/send?phone=+55<?php echo $comercio['celular']; ?>" target="_blank" style="color: #e8f3ff;">
                            <button class="btn btn-info" data-toggle="popover" title="WhatsApp">
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
                <a href="https://www.google.com/maps/search/?api=<?php echo $comercio['endereco']?>" target="_blank"><?php echo $comercio['endereco']?></a>
            </p>
          </div>
        </div>
      </div>
      <?php 
  }
}
require_once 'includes/footer.html';