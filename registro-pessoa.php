<?php
    include 'cabecalho.php';
    require_once 'classes/PessoaFisica.php';
    $pfisica = new pFisica();
    $lista = $pfisica->listar();
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
        <button id="botao-juridica" type="button" class="btn btn-primary">Pessoa Juridica</button>
        <button id="botao-fisica" type="button" class="btn btn-secondary">Pessoa Física</button>
</div>
    <form id="pessoa-juridica" method="POST" class="needs-validation" action="nova-pessoa-juridica.php" novalidate>
        <div class="form-group">
            <label for="dono">A quem pertence essa empresa?</label>
            <select name="dono" id="dono" class="custom-select">
                <option value="">Nova empresa</option>
                <?php foreach ($lista as $elemento) { ?>
                    <option value="<?php echo $elemento['idPessoa'] ?>"><?php echo $elemento['Nome'] ?></option>
                <?php } ?>
            </select>
        </div>
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
                    <input class="form-control phone_with_ddd" type="text" id="telefone" name="telefone"  placeholder="(__) ____-____" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
        </div>
        
        <h1>Endereço</h1>
        <i id="addendereco" class="far fa-plus-square"></i><i id="subendereco" class=" far fa-minus-square"></i>
        <hr>
        <div id="divEnd">
            <div class="form-group">
                <label for="nome">Titulo</label>
                <input type="text"class="form-control" name="nome[]" id="nome">
            </div>
            <div id="div" class="form-row">
                <div class="form-group col-md-6">
                
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Nº</label>
                    <input class="form-control" type="number" id="numero" name="numero[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
            </div>
            <div id="divCit" class="form-row">
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <select id="estado" class="custom-select" name="estado[]" required>
                    <div class="invalid-feedback">
                        Obrigatório
                     </div>
                        <option selected>Selecione o estado</option>
                        
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep[]"  placeholder="____-___" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>


    <!-- formulario de cadastro pessoa física -->
    <form id="pessoa-fisica" method="POST" class="needs-validation" action="nova-pessoa-fisica.php" novalidate style="display: none;">
        <div class="form-group">
            <label for="nomepf">Nome</label>
            <input id="nomepf" name="nomepf" type="text" class="form-control" required>
            <div class="invalid-feedback">
                Obrigatório
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="number" placeholder="___.___.___-__" class="form-control" required>
                <div class="invalid-feedback">
                    Obrigatório
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="datanasc">Data de Nascimento</label>
                <input class="form-control" type="date" name="datanasc" id="datanasc" required>
                <div class="invalid-feedback">
                 Obrigatório
            </div>
            </div>
            <div class="form-group col-md-4">
                <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo" class="custom-select">
                    <option selected>Selecione o sexo</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>
            </div>
        </div>
        <div id="divTf" class="form-row">
        <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" class="form-control" required>
                <div class="invalid-feedback">
                    Obrigatório
                </div>
            </div>
            <div class="form-group col-md-6">
                <label for="telefone">Telefone</label><i id="addtelefonef" class="far fa-plus-square"></i><i id="subtelefonef" class=" far fa-minus-square"></i>
                <input class="form-control phone_with_ddd" type="text" id="telefonef" name="telefone"  placeholder="(__) ____-____" required>
                <div class="invalid-feedback">
                 Obrigatório
            </div>
            </div>
        </div>
        <h1>Endereço</h1>
        <i id="addenderecof" class="far fa-plus-square"></i><i id="subenderecof" class=" far fa-minus-square"></i>
        <hr>
        <div id="divEndf">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"class="form-control" name="nome[]" id="nomef">
            </div>
            <div id="div" class="form-row">
                <div class="form-group col-md-6">
                
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" id="logradourof" name="logradouro[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="numero">Nº</label>
                    <input class="form-control" type="number" id="numerof" name="numero[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairrof" name="bairro[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
            </div>
            <div id="divCit" class="form-row">
                <div class="form-group col-md-4">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidadef" name="cidade[]" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <select id="estadof" class="custom-select" name="estado[]">
                        <option selected>Selecione o estado</option>
                        
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cepf" name="cep[]"  placeholder="____-___" required>
                    <div class="invalid-feedback">
                 Obrigatório
            </div>
                </div>
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