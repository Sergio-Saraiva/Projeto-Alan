<?php
    include 'cabecalho.php';
    include_once('classes/Empresa.php') ;

    $id = $_GET['id'];

    $empresa = new Empresa();

    $lista = $empresa->consultaProjetos($id);

?>

<h1>Projetos Cadastrados</h1>
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
         <a href="consulta.php" class="btn btn-outline-secondary">Alterar filtro</a>
      </div>
   </div>
 <?php } ?>

 <hr>  

 <?php foreach($lista[2] as $elemento){ ?>
  <div class="card">
    <h5 class="card-header">Nome do serviço/projeto: <?php echo $elemento['tipo'] ?></h5>
    <div class="card-body">
      <p class="card-text">
        <b class="h6">TIPO:</b> <?php echo $elemento['tipo'] ?></br>
        <b class="h6">PROTOCOLO:</b> <?php echo $elemento['protocolo'] ?></br>
        <b class="h6">DATA DE ENTREGA:</b> <?php echo $elemento['data_entrega'] ?></br>
        <b class="h6">CIDADE:</b> <?php echo $elemento['cidade'] ?>&nbsp &nbsp <b class="h6">QUANTIDADE DE POSTES:</b> <?php echo $elemento['qtd_postes'] ?></br>
        <b class="h6">ANDAMENTO:</b> <?php echo $elemento['andamento'] ?></br>
        
      </p>
      <a href="projetos.php?id=<?php echo $elemento['id'] ?>" class="btn btn-primary">Projetos</a> <button type="button" class="btn btn-info">Editar</button> <a href="#" class="btn btn-danger">Deletar</a>
    </div>
  </div>
  <?php } ?>

  




<?php 
    include 'rodape.php';
 ?>