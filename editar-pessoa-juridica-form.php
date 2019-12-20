<?php 
    include 'cabecalho.php';
    require_once 'config.php';
?>
    <h1>Edição de Dados</h1>
<hr>
    <form id="pessoa-juridica" method="POST" class="needs-validation" action="nova-pessoa-juridica.php" novalidate>
    <h1>Dados da Empresa</h1>
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
            <div class="form-group col-md-6" id="divEmailJ">
                <label for="email">E-Mail</label>
                <i class="far fa-plus-square" onclick="addEmailJ()"></i>
                <i class="far fa-minus-square" onclick="subEmailJ()"></i>
                <input id="email" name="email[]" type="email" class="form-control" required>
                <div class="invalid-feedback">
                    Obrigatório
                </div>
            </div>
                <div class="form-group col-md-6">
                    <label for="telefone">Telefone</label>
                    <i id="addtelefone" class="far fa-plus-square"></i>
                    <i id="subtelefone" class=" far fa-minus-square"></i>
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
            <h1>Contato</h1>
            <i id="addcontato" class="far fa-plus-square"></i><i id="subcontato" class=" far fa-minus-square"></i>
            <div id="divCont">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nomeResponsavel">Nome do Responsável</label>
                        <input class="form-control" type="text" name="nomeResponsavel[]" id="nomeResponsavel">
                        <input type="hidden" name="qtdResp" id="qtdResp" value="1">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="setor">Setor</label>
                        <input class="form-control" type="text" name="setor[]" id="setor">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6" id="divEmailC">
                    <label for="emailcont">E-Mail</label>
                    <i id="addEmailContato" class="far fa-plus-square" onclick="addEmailC(1)"></i><i id="subEmailContato" class="far fa-minus-square" onclick="subEmailC(1)"></i>
                    <input id="emailcont" name="emailcont[1][]" type="email" class="form-control" required>
                    <div class="invalid-feedback">
                        Obrigatório
                    </div>
                </div>
                    <div class="form-group col-md-6" id="divTel">
                        <label for="telefonecont">Telefone</label><i onclick="addTelefone(1)" id="addtelefonecont" class="far fa-plus-square"></i><i onclick="subTelefone(1)" id="subtelefonecont" class=" far fa-minus-square"></i>
                        <input class="form-control phone_with_ddd" type="number" id="telefonecont" name="telefonecont[1][]"  placeholder="(__) ____-____" required>
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