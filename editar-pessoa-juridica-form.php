<?php 
    include 'cabecalho.php';
    require_once 'config.php';

    $id = $_GET['id'];

    $empresa = new Empresa();
    $lista = $empresa->maisInformacoesPessoaJuridica($id);
    
?>
    <h1>Edição de Dados</h1>
<hr>
    <form id="pessoa-juridica" method="POST" class="needs-validation" action="atualiza-pessoa-juridica.php" novalidate>
    <h1>Dados da Empresa</h1>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <?php foreach($lista[1] as $registro){?>
        
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input id="cnpj" name="cnpj" type="text" class="form-control" placeholder="XX.XXX.XXX/XXXX-XX" value="<?php echo $registro['cnpj'] ?>" required >
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div class="form-group">
            <label for="rsocial">Razão Social</label>
            <input id="rsocial" name="razao" type="text" class="form-control" value="<?php echo $registro['razao'] ?>" required>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div class="form-group">
            <label for="fantasia">Fantasia</label>
            <input id="fantasia" name="fantasia" type="text" class="form-control" value="<?php echo $registro['fantasia'] ?>" required>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <?php } ?>
        <div id='divT' class="form-row">
            <div class="form-group col-md-6" id="divEmailJ">
            <?php $email_1 = $empresa->listarEmailPessoasJuridicas($registro['id_juridica']);
                    $qtd = count($email_1[2]);
            ?>
                <label for="email">E-Mail</label>
                <i class="far fa-plus-square" onclick="addEmailJ()"></i>
                <i class="far fa-minus-square" onclick="subEmailJ()"></i>
                <input id="email" name="email[]" type="email" class="form-control" value="<?php echo $email_1[2][0]['email_juridica'] ?>"  required>
                <input type="hidden" name="emailAntigo[]" value="<?php echo $email_1[2][0]['email_juridica'] ?>">
                <div class="invalid-feedback">
                    Obrigatório
                </div>
                <?php for($i=1; $i<$qtd; $i++){ ?>
                    <label for="email">E-Mail</label>
                    <input id="email" name="email[]" type="email" class="form-control" value="<?php echo $email_1[2][$i]['email_juridica'] ?>"  required>
                    <input type="hidden" name="emailAntigo[]" value="<?php echo $email_1[2][$i]['email_juridica'] ?>">
                    <div class="invalid-feedback">
                        Obrigatório
                    </div>
                <?php } ?>
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