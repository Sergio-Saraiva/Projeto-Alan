<?php 
    include 'cabecalho.php';
    require_once 'config.php';

    $id = $_GET['id'];

    $empresa = new Empresa();
    $lista = $empresa->maisInformacoesPessoaJuridica($id);
    
?>
    <h1>Edição de Emails</h1>
<hr>
    <form id="pessoa-juridica" method="POST" class="needs-validation" action="atualiza-pessoa-juridica.php" novalidate>
    <input type="hidden" name="id" value="<?php echo $id ?>">
        
        <div class="form-group">
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
        </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        
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