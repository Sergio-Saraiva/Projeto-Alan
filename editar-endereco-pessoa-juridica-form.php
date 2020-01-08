<?php include 'cabecalho.php';
      include 'config.php';
      $id = $_GET['id'];
      $empresa = new Empresa();
      $lista = $empresa->maisInformacoesPessoaJuridica($id); ?>
<h1>Edição de Endereço</h1>
<hr />
<h1>Endereço</h1>
<form action="atualiza-endereco-pessoa-juridica.php" method="post">
  <?php
    $aux = ''; 
    foreach($lista[3] as $elemento){ ?>
  <div id="divEnd">
    <div class="form-group">
      <label for="nome">Titulo</label>
      <input
        type="text"
        class="form-control"
        name="nome[]"
        id="nome"
        value="<?php echo $elemento['nome'] ?>"
      />
      <input
        type="hidden"
        name="id[]"
        value="<?php echo $elemento['idEndereco'] ?>"
      />
    </div>
    <div id="div" class="form-row">
      <div class="form-group col-md-6">
        <label for="logradouro">Logradouro</label>
        <input
          type="text"
          class="form-control"
          id="logradouro"
          name="logradouro[]"
          value="<?php echo $elemento['logradouro'] ?>"
          required
        />
        <div class="invalid-feedback">
          Obrigatório
        </div>
      </div>
      <div class="form-group col-md-2">
        <label for="numero">Nº</label>
        <input
          class="form-control"
          type="number"
          id="numero"
          name="numero[]"
          value="<?php echo $elemento['numero'] ?>"
          required
        />
        <div class="invalid-feedback">
          Obrigatório
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="bairro">Bairro</label>
        <input
          type="text"
          class="form-control"
          id="bairro"
          name="bairro[]"
          value="<?php echo $elemento['bairro'] ?>"
          required
        />
        <div class="invalid-feedback">
          Obrigatório
        </div>
      </div>
    </div>
    <div id="divCit" class="form-row">
      <div class="form-group col-md-4">
        <label for="cidade">Cidade</label>
        <input
          type="text"
          class="form-control"
          id="cidade"
          name="cidade[]"
          value="<?php echo $elemento['cidade'] ?>"
          required
        />
        <div class="invalid-feedback">
          Obrigatório
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="estado-edit">Estado</label>
        <select id="estado" class="custom-select" name="estado[]" required="">
          Obrigatório

          <option selected value="<?php echo $elemento['estado'] ?>"
            ><?php echo $elemento['estado'] ?></option
          >

          <option value="RO">Rondônia</option
          ><option value="AC">Acre</option
          ><option value="AM">Amazonas</option
          ><option value="RR">Roraima</option
          ><option value="PA">Pará</option
          ><option value="AP">Amapá</option
          ><option value="TO">Tocantins</option
          ><option value="MA">Maranhão</option
          ><option value="PI">Piauí</option
          ><option value="CE">Ceará</option
          ><option value="RN">Rio Grande do Norte</option
          ><option value="PB">Paraíba</option
          ><option value="PE">Pernambuco</option
          ><option value="AL">Alagoas</option
          ><option value="SE">Sergipe</option
          ><option value="BA">Bahia</option
          ><option value="MG">Minas Gerais</option
          ><option value="ES">Espírito Santo</option
          ><option value="RJ">Rio de Janeiro</option
          ><option value="SP">São Paulo</option
          ><option value="PR">Paraná</option
          ><option value="SC">Santa Catarina</option
          ><option value="RS">Rio Grande do Sul</option
          ><option value="MS">Mato Grosso do Sul</option
          ><option value="MT">Mato Grosso</option
          ><option value="GO">Goiás</option
          ><option value="DF">Distrito Federal</option></select
        >
      </div>
      <div class="form-group col-md-4">
        <label for="cep">CEP</label>
        <input
          type="text"
          class="form-control"
          id="cep"
          name="cep[]"
          placeholder="____-___"
          value="<?php echo $elemento['CEP'] ?>"
          required
        />
        <div class="invalid-feedback">
          Obrigatório
        </div>
      </div>
    </div>
  </div>
  <?php $aux++; } ?>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<?php include 'rodape.php' ?>
