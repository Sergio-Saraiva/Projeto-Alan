<?php include 'cabecalho.php';
      include 'classes/Empresa.php';
?>

<div class="row d-flex justify-content-center">
      <div class="btn-group" role="group" aria-label="Basic example" >
            <button id="busca-juridica" name="busca-juridica" type="button" class="btn btn-primary">Pessoa Juridica</button>
            <button id="busca-fisica" name="busca-fisica" type="button" class="btn btn-secondary">Pessoa Física</button>
      </div>
</div>
</br>

<?php
      echo "<div id='visivel1'>";
      include 'consulta.php';
      echo "</div>";

      echo "<div id='visivel2' style='display: none;'>";
      include 'consulta_pFisica.php';
      echo "</div>";

      include 'rodape.php';
?>

<script type="text/javascript" src="app3.js" ></script>