<?php include 'cabecalho.php';
      include 'classes/Empresa.php';
      
      if(isset($_GET['p'])){
            $p = $_GET['p'];
      }else{
            $p = 0;
      }
      
     
?>

<div class="row d-flex justify-content-center">
      <div class="btn-group" role="group" aria-label="Basic example" >
            <button id="busca-juridica" name="busca-juridica" type="button" class="btn btn-primary">Pessoa Juridica</button>
            <button id="busca-fisica" name="busca-fisica" type="button" class="btn btn-secondary">Pessoa Física</button>
      </div>
</div>
</br>
      
      <div class="d-flex justify-content-center">
            <div class="spinner-border" role="status" id='loading'>
                  <span class="sr-only">Carregando...</span>
            </div>
      </div>
      
<?php
      echo "<div id='conteudo' style='display:none;'>";
      echo "<div id='visivel1'>";
      include 'consulta.php';
      echo "</div>";

      echo "<div id='visivel2' style='display: none;'>";
      include 'consulta_pFisica.php';
      echo "</div>";
      echo "</div>";

      include 'rodape.php';
?>

<script type="text/javascript" src="app3.js" ></script>