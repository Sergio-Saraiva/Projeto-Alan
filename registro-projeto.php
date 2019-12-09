<?php
    include 'cabecalho.php';
    include 'classes/Empresa.php';

    $empresa = new Empresa();

    $lista = $empresa->listar();

?>
<h1>Registro de Projeto</h1>
<hr>
    <form method="POST" class="needs-validation" action="novo-projeto.php" novalidate>
        <div class="form-group">
            <label for="rsocial">Razão Social</label>
            <select name="rsocial" id="rsocial" class="form-control">
                <?php foreach($lista as $elemento){ ?>
                <option value="<?php echo $elemento['razao'] ?>"><?php echo $elemento['razao'] ?></option>
                <?php } ?>
            </select>
            <div class="invalid-feedback">
                 Obrigatório
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="data_entrega">Data de Entrega</label>
                <input type="date" class="form-control" id="data_entrega" name="data_entrega">
            </div>
            <div class="form-group col-md-6">
                <label for="protocolo">Protocolo</label>
                <input class="form-control phone_with_ddd" type="number" id="protocolo" name="protocolo"  placeholder="(__) ____-____">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo"  >
            </div>
            <div class="form-group col-md-4">
                <label for="cidade">Cidade</label>
                <select id="cidade" class="custom-select" name="cidade">
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
                <label for="postes">Quantidade de Postes</label>
                <input type="text" class="form-control" id="postes" name="qtd_postes">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                    <option value="avaliacao">Avaliação</option>
                    <option value="aprovado">Aprovado</option>
                    <option value="reprovado">Reprovado</option>
                    <option value="construcao">Construção</option>
                </select>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary"  >Registrar</button>
    </form>

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