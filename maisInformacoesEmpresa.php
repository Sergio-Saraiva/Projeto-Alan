<?php
    include 'cabecalho.php';
    include_once('classes/Empresa.php') ;

    $id = $_GET['id'];

    $empresa = new Empresa();

    $lista = $empresa->maisInformacoesPessoaJuridica($id);

?>

<h1>Informações Gerais Sobre a Empresa</h1>
<hr>    

<?php foreach($lista[1] as $registro)
 { ?>

    <div role="card" class="alert alert-warning">
     
      <div class="card-body">
        <p class="card-text">
        <b class="h6">NOME FANTASIA:</b> <?php echo $registro['fantasia'] ?></br>
        <b class="h6">RAZÃO SOCIAL:</b> <?php echo $registro['razao'] ?></br>
         <b class="h6">CNPJ:</b> <?php echo $registro['cnpj'] ?></br>
         <b class="h6">ESTADO:</b> <?php echo $registro['estado'] ?>&nbsp &nbsp <b class="h6">CIDADE:</b> <?php echo $registro['cidade'] ?> &nbsp &nbsp <b class="h6">CEP:</b> <?php echo $registro['cep'] ?></br>
         <b class="h6">ENDEREÇO:</b> <?php echo $registro['endereco'] ?></br>
         <b class="h6">TELEFONE:</b> <?php echo $registro['telefone'] ?></br>
     </p>
         <a href="consulta.php" class="btn btn-outline-secondary">Retornar</a>
      </div>
   </div>
 <?php } ?>

 <hr>  


  




<?php 
    include 'rodape.php';
 ?>