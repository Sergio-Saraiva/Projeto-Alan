<?php include 'cabecalho.php';
      include 'classes/Empresa.php';

      //$v = $_GET['v'];
      $v = 0;

      $empresas = new Empresa();
      $lista = $empresas->listar();

      if($v == 1){
        echo '<div class="alert alert-success" role="alert">
            Empresa cadastrada com sucesso!
            </div>';
      }
?>

<head>
      <script type ="text/javascript" src="app2.js"></script>
</head>


<div class="container">
  <div class="row no-gutters">
    <div class="col-12 col-sm-6 col-md-8">
      <h1>Empresas Registradas</h1>
      <hr>
    </div>
    
        <form name="form_pesquisa" method="POST" action="" id="form_pesquisa">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
          <input name="razao_psq" id="razao_psq" placeholder="Razão Social" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        </form>
        
   
  </div>
</div>


<div class="resultado_psq" id="resultado_psq" style="display: none;">
</div>
<div class="resultado" id ="resultado" style="display: block;">
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
</div>


<?php 
    include 'rodape.php';  
?>
