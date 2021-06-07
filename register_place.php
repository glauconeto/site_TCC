<?php 

require_once('db/connection.php');
require_once('db/database.php');

$link = DBConnect();

// A pasta de upload terá o mesmo nome que o comércio
// Os arquivos serão: nome_comercio_1, nome_comercio_2...
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Faz a criação das variáveis com os valores vindos do formulário 
  // de cadastro
  if (!empty($_POST)) {
    $nomePessoa = trim($_POST['nameperson']);
    $email = trim($_POST['email']);
    $cnpj = trim($_POST['cnpj']);
    $nomeEstabelecimento =  trim($_POST['nameplace']);
    $fone = trim($_POST['telefone']);
    $celular = trim($_POST['celular']);
    $facebook = trim($_POST['facebook']);
    $endereco = trim($_POST['endereco']);
    $descricao = trim($_POST['descricao']);
    $categoria = trim($_POST['select_categoria']);
    
    if ($cnpj > 14) {
      $mensagem = '<div class="alert alert-danger" role="alert">CNPJ é muito grande!</div>';
    }
    $fone = preg_replace("/[^0-9]/", "", $fone);
    $celular = preg_replace("/[^0-9]/", "", $celular);
    // Valida o e-mail
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $dir = './uploads/';

    if(isset($_FILES['vitrine'])) {
      $ext = strtolower(substr($_FILES['vitrine']['name'],-4));

      if($ext !== '.png') {
        die('ERRO ! Extensão não permitida');
      } else {
        $new_name = $nomeEstabelecimento. "-vitrine" . $ext;
        move_uploaded_file($_FILES['vitrine']['tmp_name'], $dir.$new_name);
      }
    }

    // diretório para salvar as imagens
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    // loop para ler as imagens
    for($controle = 0; $controle < count($arquivo['name']); $controle++) {
      $nome = $arquivo['name'];
      $extensao = pathinfo($_FILES['arquivo']['name'][$controle], PATHINFO_EXTENSION);
      $novaExtensao = strtolower($extensao);
      
      $novoNome = $nomeEstabelecimento. "-". $controle. ".". $novaExtensao;
      $destino = $dir. $novoNome;
      
      move_uploaded_file($arquivo['tmp_name'][$controle], $destino);
    }
    
    // Insere na tabela comércio
    $sql = "INSERT INTO comercio (nome_comercio, endereco, telefone, facebook, celular, descricao, categoria, vitrine, imagem_1, imagem_2, imagem_3) VALUES ('$nomeEstabelecimento', '$endereco', '$fone', '$facebook', '$celular', '$descricao', '$categoria')";
    $result = DBExecute($sql);

    // // Insere na tabela comerciante
    $query = "INSERT INTO comerciante (nome_comerciante, email, CNPJ) VALUES ('$nomePessoa', '$email', '$cnpj')";
    $result = DBExecute($query);
    if ($result) {
      header("Location: index.php?registro_com_sucesso"); 
    } else {
      echo '<div>Ops, houve um erro: '. mysqli_error($bd).'</div>';
    }

    DBClose($link);
  }
}

$title='Registrar Estabelecimento';
require_once 'includes/header.php';

?>

<style>
  footer {
    margin-top: 0px;
  }

  div.row {
    padding-top: 10px;
  }

  label {
    padding-left: 34px;
  }
</style>

  <div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg'); background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 col-10 bg-white p-5 offset-md-1">
          <h1 class="mb-4">Registrar Estabelecimento</h1>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="inputname" class="col-2 col-form-label">Seu Nome</label>
              <div class="col-10">
                <input type="text" class="form-control" name="nameperson" ></div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-2 col-form-label">E-mail</label>
              <div class="col-10">
                <input type="email" class="form-control" name="email" ></div>
            </div>
            <div class="form-group row">
              <label for="cnpj" class="col-2 col-form-label">CNPJ</label>
              <div class="col-10">
                <input type="text" class="form-control" name="cnpj" ></div>
            </div>
            <div class="form-group row">
              <label for="nameestabelecimento" class="col-2 col-form-label">Nome do Estabelecimento</label>
              <div class="col-10">
                <input type="text" class="form-control" name="nameplace" ></div>
            </div>
            <div class="form-group row">
              <label for="whatsapp" class="col-2 col-form-label">Telefone</label>
              <div class="col-10">
                <input type="text" class="form-control" name="telefone" ></div>
            </div>
            <div class="form-group row">
              <label for="endereco" class="col-2 col-form-label">Celular</label>
              <div class="col-10">
                <input type="text" class="form-control" name="celular"></div>
            </div>
            <div class="form-group row">
              <label for="facebook" class="col-2 col-form-label">Facebook</label>
              <div class="col-10">
                <input type="text" class="form-control" name="facebook"></div>
            </div>
            <div class="form-group row">
              <label for="endereco" class="col-2 col-form-label">Endereço</label>
              <div class="col-10">
                <input type="text" class="form-control" name="endereco" placeholder="Rua nome, número - bairro"></div>
            </div>
            <div class="form-group row">
              <label for="descricao" class="col-2 col-form-label">Descrição</label>
              <div class="col-10">
                <textarea cols="5" rows="5" class="form-control" placeholder="Escreva um pouco sobre o estabelecimento" name="descricao"></textarea>
              </div>
            </div>
            <div class="for-group row">
                <label for="upload-1">Imagem de vitrine</label>
                <input type="file" name="vitrine">
            </div>
            <div class="for-group row">
              <input type="file" name="arquivo[]" multiple="multiple" /><br><br>
            </div>
            <div class="form-group row" style="padding-left: 60px;">
              <select id="txt_maq" name="select_categoria">
                <option value="">Selecione</option>
                <option value="Roupas">Roupas</option>
                <option value="Tecnologia">Tecnologia</option>
                <option value="Alimentos">Alimentos</option>
                <option value="Livros">Livros</option>
                <option value="Restaurantes">Restaurantes</option>
                <option value="Diversos">Diversos</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php require_once 'includes/footer.html' ?>