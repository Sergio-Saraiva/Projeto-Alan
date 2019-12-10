<?php
    require_once 'cabecalho.php';
?>
    <h1>Cadastro</h1>
    <hr>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button id="botao-juridica" type="button" class="btn btn-secondary">Pessoa Juridica</button>
        <button id="botao-fisica" type="button" class="btn btn-secondary">Pessoa Física</button>

    </div>
    <div id="principal"></div>

    <script src="cadastro.js"></script>
    <script>
    jQuery(function($){
		       $("#cnpj").mask("99.999.999/9999-99");
               $("#telefone").mask("(99) 9999-9999");
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
    require_once 'rodape.php';
?>