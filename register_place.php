<?php 

$title='Registrar Estabelecimento';
require_once 'includes/header.php';

?>

<style>
  footer {
    margin-top: 0px;
  }
</style>

  <div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg'); background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 col-10 bg-white p-5 offset-md-1">
          <h1 class="mb-4">Registrar Estabelecimento</h1>
          <form action="process_place.php" method="post">
            <div class="form-group row">
              <label for="inputname" class="col-2 col-form-label">Seu Nome</label>
              <div class="col-10">
                <input type="text" class="form-control" name="nameperson" required></div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-2 col-form-label">E-mail</label>
              <div class="col-10">
                <input type="email" class="form-control" name="email" required></div>
            </div>
            <div class="form-group row">
              <label for="nameestabelecimento" class="col-2 col-form-label">Nome do Estabelecimento</label>
              <div class="col-10">
                <input type="text" class="form-control" name="nameplace" required></div>
            </div>
            <div class="form-group row">
              <label for="whatsapp" class="col-2 col-form-label">Telefone</label>
              <div class="col-10">
                <input type="text" class="form-control" name="telefone" required></div>
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
                <input type="text" class="form-control" name="endereco" required></div>
            </div>
            <div class="for-group row">
                <label for="upload-1">Imagem de vitrine</label>
                <input type="file" name="arquivo-1" id="upload-1"><br>
            </div>
            <div class="for-group row">
                <label for="upload-1">Imagens para galeria</label>
                <input type="file" name="arquivo-1" id="upload-1" multiple><br>
            </div>
            <div class="form-group row">
              <label for="descricao" class="col-2 col-form-label">Descrição</label>
              <div class="col-10">
                <textarea cols="5" rows="5" class="form-control" placeholder="Escreva um pouco sobre o estabelecimento" name="descricao"></textarea>
              </div>
            </div>
            <div class="form-group row" style="padding-left: 60px;">
              <label class="input-group-text" for="inputCategorias">Categorias</label>
              <select class="form-select" id="inputGroupSelect01">
                <option selected>Escolha uma categoria</option>
                <option value="Roupas">Roupas</option>
                <option value="Tecnologia">Tecnologia</option>
                <option value="Alimentos">Alimentos</option>
                <option value="Livros">Livros</option>
                <option value="Diversos">Diversos</option>
                <option value="Restaurantes">Restaurantes</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php require_once 'includes/footer.html' ?>