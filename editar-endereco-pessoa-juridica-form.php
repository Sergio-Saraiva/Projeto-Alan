<?php include 'cabecalho.php';
      include 'config.php';
      $id = $_GET['id'];
      $empresa = new Empresa();
      $lista = $empresa->maisInformacoesPessoaJuridica($id); 
?>

<h1>Edição de Endereço</h1>
<hr>
<h1>Endereço</h1>
    <form action="atualiza-endereco-pessoa-juridica.php" method="post">
    <?php foreach($lista[3] as $elemento){ ?>
        <div id="divEnd">
            <div class="form-group">
                <label for="nome">Titulo</label>
                <input type="text"class="form-control" name="nome[]" id="nome" value="<?php echo $elemento['nome'] ?>">
                <input type="hidden" name="id[]" value="<?php echo $elemento['idEndereco'] ?>">
            </div>
            <div id="div" class="form-row">
                <div class="form-group col-md-6">
                
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro[]" value="<?php echo $elemento['logradouro'] ?>" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Nº</label>
                    <input class="form-control" type="number" id="numero" name="numero[]" value="<?php echo $elemento['numero'] ?>" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro[]" value="<?php echo $elemento['bairro'] ?>" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
            </div>
            <div id="divCit" class="form-row">
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade[]" value="<?php echo $elemento['cidade'] ?>" required>
                    <div class="invalid-feedback">
                         Obrigatório
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <input type="text" id="estado" class="custom-select" name="estado[]" value="<?php echo $elemento['estado'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep[]"  placeholder="____-___" value="<?php echo $elemento['CEP'] ?>" required>
                    <div class="invalid-feedback">
                        Obrigatório
                    </div>
                </div>
            </div>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary">Salvar</button>
    </form>


<?php include 'rodape.php' ?>
<script>
    var estados;
axios.get("https://servicodados.ibge.gov.br/api/v1/localidades/estados").then(function (response) {
    console.log(response);
    estados = response;
    renderElementEstado(response, '', '');
}).catch(function (error) {
    console.log(error);
});

//mostrar dados recebidos da api de estados

function renderElementEstado(json, e, ef) {
    var select = document.getElementById('estado'+e);
    var selectf = document.getElementById('estadof'+ef);
    var tam = json.data.length;

    for(i = 0; i<tam; i++){
        var option = document.createElement('option');
        option.value = json.data[i].sigla;
        option.innerHTML = json.data[i].nome;
        select.appendChild(option);    
    }
    for(i = 0; i<tam; i++){
        var option = document.createElement('option');
        option.value = json.data[i].sigla;
        option.innerHTML = json.data[i].nome;
        selectf.appendChild(option);    
    }
}
</script>