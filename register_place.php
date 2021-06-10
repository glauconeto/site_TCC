<?php 

require_once('db/connection.php');
require_once('db/database.php');

$link = DBConnect();

$upload_err = '';

// A pasta de upload terá o mesmo nome que o comércio
// Os arquivos serão: nome_comercio-1, nome_comercio-2...
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

    $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
    
    $fone = preg_replace("/[^0-9]/", "", $fone);
    $celular = preg_replace("/[^0-9]/", "", $celular);

    // Valida o e-mail
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $dir = './uploads/';

    if(isset($_FILES['vitrine'])) {
      $ext = strtolower(substr($_FILES['vitrine']['name'],-4));

      if($ext !== '.png') {
        $upload_err = 'Extensão não permitida';
      } else {
        $new_name = $nomeEstabelecimento. "-vitrine" . $ext;
        move_uploaded_file($_FILES['vitrine']['tmp_name'], $dir.$new_name);
      }
    }

    // Diretório para salvar as imagens.
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    // Loop para ler as imagens.
    for($controle = 0; $controle < count($arquivo['name']); $controle++) {
      $nome = $arquivo['name'];
      $extensao = pathinfo($_FILES['arquivo']['name'][$controle], PATHINFO_EXTENSION);
      if ($extensao !== '.png') {
        $upload_err = 'Extensão não permitida';
      } else {
        $novaExtensao = strtolower($extensao);
        $novoNome = $nomeEstabelecimento. "-". $controle. ".". $novaExtensao;
        $destino = $dir. $novoNome;
        move_uploaded_file($arquivo['tmp_name'][$controle], $destino);

      }
    }

    // Insere na tabela comerciante
    $query = "INSERT INTO comerciante (nome_comerciante, email, CNPJ) VALUES ('$nomePessoa', '$email', '$cnpj')";

    mysqli_query($link, $query);
    
    $last_id = mysqli_insert_id($link);
    
    $result = DBExecute($query);

    
    // Insere na tabela comércio
    $sql = "INSERT INTO comercio (nome_comercio, endereco, telefone, facebook, celular, descricao, categoria, id_comerciante) VALUES ('$nomeEstabelecimento', '$endereco', '$fone', '$facebook', '$celular', '$descricao', '$categoria', '$last_id')";
    $result = DBExecute($sql);

    if ($result) {
      header("Location: index.php?registro_com_sucesso"); 
    } else {
      echo '<div>Ops, houve um erro: '. mysqli_error($link).'</div>';
    }

    DBClose($link);
  }
}

$title='Registrar Estabelecimento';
require_once 'includes/header.php';

require_once 'templates/register_place.html';

require_once 'includes/footer.html';