<?php 

require_once 'db/connection.php';
require_once 'db/database.php';

$link = DBConnect();
$upload_err = '';
$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(20));

// A pasta de upload terá o mesmo nome que o comércio
// Os arquivos serão: nome_comercio-1, nome_comercio-2...
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['token'])) {
  if (!empty($_POST)) {
    // Cria um array para inserção de dados na tabela comerciante
    $comerciante = array (
      'nome_comerciante ' => $_POST['nameperson'],
      'email' => $_POST['email'],
      'CNPJ' => $_POST['cnpj']
    );
    
    if(DBCreate('comerciante', $comerciante)) {
      $last_id = get_last_id();
    }

    // Cria um array para inserção de dados na tabela comercio
    $comercio = array (
      'nome_comercio' => $_POST['nameplace'],
      'endereco' => $_POST['endereco'],
      'telefone' => $_POST['telefone'],
      'facebook' => $_POST['facebook'],
      'celular' => $_POST['celular'],
      'descricao' => $_POST['descricao'],
      'categoria' => $_POST['select_categoria'],
      'id_comerciante' => $last_id
    );

    // Insere na tabela comerciante
    $result = DBCreate('comercio', $comercio);
    
    if ($result) {
      header("Location: index.php?registrado_com_sucesso"); 
    } else {
      echo '<div>Ops, houve um erro: '. mysqli_error($link).'</div>';
    }
    
    DBClose($link);

    $dir = './uploads/';
    
    if (isset($_FILES['vitrine'])) {
      $ext = strtolower(substr($_FILES['vitrine']['name'],-4));
    
      if ($ext !== '.png') {
        $upload_err = 'Extensão não permitida';
      } else {
        $new_name = $comercio['nome_comercio']. "-vitrine" . $ext;
        move_uploaded_file($_FILES['vitrine']['tmp_name'], $dir.$new_name);
      }
    }
    
    // Diretório para salvar as imagens.
    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
    // Loop para ler as imagens.
    for ($controle = 0; $controle < count($arquivo['name']); $controle++) {
      $extensao = pathinfo($_FILES['arquivo']['name'][$controle], PATHINFO_EXTENSION);
      $novaExtensao = strtolower($extensao);
        $novoNome = $comercio['nome_comercio']. "-". $controle . ".". $novaExtensao;
        $destino = $dir. $novoNome;
        if(!move_uploaded_file($arquivo['tmp_name'][$controle], $destino)) {
          echo 'Erro ao realizar upload';
      }
    }
  }
}


$title = 'Registrar Estabelecimento';

require_once 'includes/header.php';

require_once 'templates/register_place.php';

require_once 'includes/footer.html';