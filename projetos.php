<?php
    include 'cabecalho.php';
    include_once('classes/Empresa.php') ;

    $id = $_GET['id'];

    $empresa = new Empresa();

    $lista = $empresa->consultaProjetos($id);

?>

<h1>Projetos Cadastrados</h1>
<hr>    

<?php foreach($lista as $registro)
 { ?>

    <div class="card">
     
      <div class="card-body bg-light">
        <p class="card-text">
        <b>NOME FANTASIA:</b> <?php echo $registro['fantasia'] ?></br>
        <b>RAZÃO SOCIAL:</b> <?php echo $registro['razao'] ?></br>
         <b>CNPJ:</b> <?php echo $registro['cnpj'] ?></br>
         <b>ESTADO:</b> <?php echo $registro['estado'] ?>&nbsp &nbsp <b>CIDADE:</b> <?php echo $registro['cidade'] ?> &nbsp &nbsp <b>CEP:</b> <?php echo $registro['cep'] ?></br>
         <b>ENDEREÇO:</b> <?php echo $registro['endereco'] ?></br>
         <b>TELEFONE:</b> <?php echo $registro['telefone'] ?></br>
     </p>
      
      </div>
   </div>
 <?php } ?>

 <hr>    




<?php 
    include 'rodape.php';
 ?>