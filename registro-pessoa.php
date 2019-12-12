<?php
    include 'cabecalho.php';
    $v = $_GET['v'];
?>



<?php
if($v == 1){
    echo '<div class="alert alert-danger" role="alert">
            CNPJ ou Razão Social já cadastrados!
            </div>';
}elseif($v==2) {
    echo '<div class="alert alert-danger" role="alert">
            CNPJ e Razão Social não podem ser vazios!
            </div>';
}
?>
<h1>Cadastro</h1>
<hr>
<div class="btn-group" role="group" aria-label="Basic example">
        <button id="botao-juridica" type="button" class="btn btn-secondary">Pessoa Juridica</button>
        <button id="botao-fisica" type="button" class="btn btn-secondary">Pessoa Física</button>
</div>
    <form id="pessoa-juridica" method="POST" class="needs-validation" action="nova-pessoa-juridica.php" novalidate>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input id="cnpj" name="cnpj" type="text" class="form-control" placeholder="XX.XXX.XXX/XXXX-XX" required>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div class="form-group">
            <label for="rsocial">Razão Social</label>
            <input id="rsocial" name="razao" type="text" class="form-control" required>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div class="form-group">
            <label for="fantasia">Fantasia</label>
            <input id="fantasia" name="fantasia" type="text" class="form-control" required>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div id='divT' class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-Mail</label>
                <input id="email" name="email" type="email" class="form-control" required>
                <div class="invalid-feedback">
                    Obrigatório
                </div>
            </div>
                <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label><i id="addtelefone" class="far fa-plus-square"></i><i id="subtelefone" class=" far fa-minus-square"></i>
                    <input class="form-control phone_with_ddd" type="text" id="telefone" name="telefone"  placeholder="(__) ____-____">
                </div>
        </div>
        
        <h1>Endereço</h1>
        <i id="addendereco" class="far fa-plus-square"></i><i id="subendereco" class=" far fa-minus-square"></i>
        <hr>
        <div id="divEnd">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"class="form-control" name="nome[]" id="nome">
            </div>
            <div id="div" class="form-row">
                <div class="form-group col-md-6">
                
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro[]">
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Nº</label>
                    <input class="form-control" type="number" id="numero" name="numero[]">
                </div>
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro[]">
                </div>
            </div>
            <div id="divCit" class="form-row">
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade[]"  >
                </div>
                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <select id="estado" class="custom-select" name="estado[]">
                        <option selected>Selecione o estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MT">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PB">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocatins</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep[]"  placeholder="____-___">
                </div>
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <div id="destino"></div>
    <!-- formulario de cadastro pessoa física -->
    <form id="pessoa-fisica" method="POST" class="needs-validation" action="nova-empresa.php" novalidate style="display: none;">
        <div class="form-group">
            <label for="cnpj">Nome</label>
            <input id="cnpj" name="cnpj" type="text" class="form-control" placeholder="XX.XXX.XXX/XXXX-XX" required>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div class="form-group">
            <label for="rsocial">Razão Social</label>
            <input id="rsocial" name="razao" type="text" class="form-control" required>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div id="form-linha" class="form-row">
            <div class="form-group col-md-6">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="form-group col-md-6">
                <label for="telefone">Telefone</label>
                <input class="form-control" type="text" id="telefone" name="telefone"  placeholder="(__) ____-____">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade"  >
            </div>
            <div class="form-group col-md-4">
                <label for="estado">Estado</label>
                <select id="estado" class="custom-select" name="estado">
                    <option selected>Selecione o estado</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MT">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PB">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocatins</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep"  placeholder="____-___">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>


    <script>
    jQuery(function($){
		       $("#cnpj").mask("99.999.999/9999-99");
            //    $("#telefone").mask("(99) 9999-9999");
               $("#cep").mask("99999-999");
		});
</script>
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script> 

<?php 
    include 'rodape.php';
 ?>