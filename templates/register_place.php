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
                  <input type="text" class="form-control" onkeypress="$(this).mask('00.000.000/0000-00')" name="cnpj" ></div>
              </div>
              <div class="form-group row">
                <label for="nameestabelecimento" class="col-2 col-form-label">Nome do Estabelecimento</label>
                <div class="col-10">
                  <input type="text" class="form-control" name="nameplace" ></div>
              </div>
              <div class="form-group row">
                <label for="whatsapp" class="col-2 col-form-label">Telefone</label>
                <div class="col-10">
                  <input type="text" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')" name="telefone" ></div>
              </div>
              <div class="form-group row">
                <label for="endereco" class="col-2 col-form-label">Celular</label>
                <div class="col-10">
                  <input type="text" class="form-control" onkeypress="$(this).mask('(00) 0 0000-00009')" name="celular"></div>
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
                  <input class="<?php echo (!empty($upload_err)) ? 'is-invalid' : ''; ?>" type="file" name="vitrine">
              </div>
              <div class="for-group row">
                <input type="file" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" name="arquivo[]" multiple="multiple" /><br><br>
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