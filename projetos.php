<?php
    include 'cabecalho.php';
    include_once('classes/Empresa.php') ;

    $id = $_GET['id'];

    $empresa = new Empresa();

    $lista = $empresa->consultaProjetos($id);

    


?>
    

<?php foreach($lista as $registro)
 { ?>

    <div class="card">
     <h5 class="card-header"><?php echo $registro['fantasia'] ?></h5>
      <div class="card-body">
        <p class="card-text">
        <b>NOME:
        <b>RAZÃO SOCIAL:</b> <?php echo $registro['razao'] ?></br>
         <b>CNPJ:</b> <?php echo $registro['cnpj'] ?></br>
         <b>ESTADO:</b> <?php echo $registro['estado'] ?>&nbsp &nbsp <b>CIDADE:</b> <?php echo $registro['cidade'] ?> &nbsp &nbsp <b>CEP:</b> <?php echo $registro['cep'] ?></br>
         <b>ENDEREÇO:</b> <?php echo $registro['endereco'] ?></br>
         <b>TELEFONE:</b> <?php echo $registro['telefone'] ?></br>
     </p>
      <a href="#" class="btn btn-primary">Mais Informações</a>  <a href="#" class="btn btn-danger">Deletar</a> 
      </div>
   </div>
 <?php } ?>





<?php 
    include 'rodape.php';
 ?>