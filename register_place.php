<?php 

$title='Registrar Estabelecimento';
require_once 'includes/header.html'; 

?>

<style>
  footer {
    margin-top: 0px;
  }
</style>

  <div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-10 col-10 bg-white p-5 offset-md-1">
          <h1 class="mb-4">Registrar Estabelecimento</h1>
          <form id="c_form-h" action="register_place.php" method="post">
            <div class="form-group row"><label for="inputname" class="col-2 col-form-label">Seu Nome (obrigatório)</label>
              <div class="col-10">
                <input type="text" class="form-control" name="name" required></div>
            </div>
            <div class="form-group row"><label for="mail" class="col-2 col-form-label">E-mail</label>
              <div class="col-10">
                <input type="email" class="form-control" name="email" placeholder="(obrigatório)" required></div>
            </div>
            <div class="form-group row"><label for="nameestabelecimento" class="col-2 col-form-label">Nome do Estabelecimento </label>
              <div class="col-10">
                <input type="text" class="form-control" name="nomeestabelecimento" placeholder="(obrigatório)" required></div>
            </div>
            <div class="form-group row"><label for="whatsapp" class="col-2 col-form-label">Telefone</label>
              <div class="col-10">
                <input type="number" class="form-control" name="(obrigatório)" required></div>
            </div>
            <div class="form-group row"><label for="endereco" class="col-2 col-form-label">Whatsapp</label>
              <div class="col-10">
                <input type="number" class="form-control" name="whatsapp" placeholder="(opcional)"></div>
            </div>
            <div class="form-group row"><label for="facebook" class="col-2 col-form-label">Facebook</label>
              <div class="col-10">
                <input type="text" class="form-control" name="facebook" placeholder="(opcional)"></div>
            </div>
            <div class="form-group row"><label for="endereco" class="col-2 col-form-label">Endereço</label>
              <div class="col-10">
                <input type="text" class="form-control" name="endereco" placeholder="(obrigatório)" required></div>
            </div>
            <div class="form-group row"><label for="descricao" class="col-2 col-form-label">Descrição</label>
              <div class="col-10">
                <textarea type="text" cols="5" rows="5" class="form-control" id="inputestabelecimento" placeholder="Digite uma pequena descrição do estabelecimento"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php require_once 'includes/footer.html' ?>