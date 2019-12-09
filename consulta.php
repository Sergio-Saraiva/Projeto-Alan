<?php include 'cabecalho.php';
      include 'classes/Empresa.php';

      //$v = $_GET['v'];
      $v = 0;
?>
<?php 
  $empresas = new Empresa();
  $lista = $empresas->listar();

  if($v == 1){
    echo '<div class="alert alert-success" role="alert">
            Empresa cadastrada com sucesso!
            </div>';
}
?>
<h1>Empresas Registradas</h1>
<hr>


<form name="form_pesquisa" method="POST" action="" id="form_pesquisa"><label> CNPJ: <input type="text" name="cnpj" id="cnpj" tabindex="1"></label></form>


<?php foreach($lista as $elemento){ ?>
<div class="card">
  <h5 class="card-header"><?php echo $elemento['fantasia'] ?></h5>
  <div class="card-body">
    <p class="card-text">
      <b>RAZÃO SOCIAL:</b> <?php echo $elemento['razao'] ?></br>
      <b>CNPJ:</b> <?php echo $elemento['cnpj'] ?></br>
      <b>ESTADO:</b> <?php echo $elemento['estado'] ?>&nbsp &nbsp <b>CIDADE:</b> <?php echo $elemento['cidade'] ?> &nbsp &nbsp <b>CEP:</b> <?php echo $elemento['cep'] ?></br>
      <b>ENDEREÇO:</b> <?php echo $elemento['endereco'] ?></br>
      <b>TELEFONE:</b> <?php echo $elemento['telefone'] ?></br>
    </p>
    <a href="projetos.php?id=<?php echo $elemento['id'] ?>" class="btn btn-primary">Projetos</a> <button type="button" class="btn btn-info">Editar</button> <a href="#" class="btn btn-danger">Deletar</a>
  </div>
</div>
<?php } ?>


<?php 
    include 'rodape.php';  
?>
