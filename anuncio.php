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
    <div class="py-5 text-center text-white h-100 align-items-center d-flex" style="background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('<?php echo $vitrine ?>'); background-position: center center, center center; background-size: cover, cover; background-repeat: repeat, repeat;" alt="Vitrine Comercio">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <h1 class="display-3 mb-4"></h1>
                    <h3><?php echo $comercio['nome_comercio'] ?></h3>
                    <p class="lead mb-5"><?php echo $comercio['descricao']; ?></p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                      <button type="submit" name="favorite" value="<?php echo $comercio['id_comercio']?>" class="btn btn-lg btn-danger" data-toggle="popover" title="Favoritar" data-content="<?php echo (!empty($favorite_err)) ? 'is-invalid' : ''; ?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                      </button>
                    </form>
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
                            <?php $imagem2 = 'uploads/'. $comercio['nome_comercio']. '-2.png'?>
                            <img src="<?php echo $imagem2 ?>" class="d-block w-100" alt="Imagem 2">
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
                            <button class="btn btn-info" data-toggle="popover" title="FaceBook">
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

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $id_user = $_SESSION['id'];
    $id_commerce = $_GET['id'];

    $sql = "SELECT id_comercio FROM favorito WHERE id_usuario = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $param_favorite);
        $param_id_user = trim($id_user);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if ($mysqi_stmt_num_rows($stmt) == 1) {
                $favorite_err = 'Esse comércio já esta nos seus favoritos.';
            } else {
                $sql = 'INSERT INTO favorito id_usuario, id_comercio VALUES (?, ?)';

                mysqli_stmt_bind_param($stmt, "ss", $id_user, $id_commerce);

                if (mysqli_stmt_execute($stmt)) {
                  header('location: account/favorites.php?favoritado_com_sucesso');
                } else {
                  echo mysqli_error($link);
                }
            }
        }
    }    
} else {
    header('location: account/login.php?login_necessario');
    exit;
}

require_once 'includes/footer.html';