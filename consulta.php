<?php 
      require_once 'classes/Empresa.php';
      //$v = $_GET['v'];
      $v = 0;

      $empresas = new Empresa();
      $lista = $empresas->listarPessoasJuridicas();

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
  <?php foreach($lista[1] as $elemento){ ?>
  <div class="card">
    <h5 class="card-header"><i class="fa fa-briefcase" aria-hidden="true"></i><?php echo " ".$elemento['fantasia'] ?></h5>
    <div class="card-body">
      <p class="card-text">
        <b clas="h6">RAZÃO SOCIAL:</b> <?php echo $elemento['razao'] ?></br>
        <b clas="h6">CNPJ:</b> <?php echo $elemento['cnpj'] ?></br>
        <b clas="h6">E-MAIL:</b> <?php echo $elemento['email'] ?></br>
       <!--
          <b>ESTADO:</b> <?php echo $elemento['estado'] ?>&nbsp &nbsp <b>CIDADE:</b> <?php echo $elemento['cidade'] ?> &nbsp &nbsp <b>CEP:</b> <?php echo $elemento['cep'] ?></br>
        <b>ENDEREÇO:</b> <?php echo $elemento['endereco'] ?></br>
        
          <b>TELEFONE:</b> <?php echo $elemento['telefone'] ?></br>
        
        -->
      </p>
      <div class="btn-group">
        <a href="projetos.php?id=<?php echo $elemento['id_juridica'] ?>" class="btn btn-primary">Serviços</a>
        <a href="colaboradoresEmpresa.php?id=<?php echo $elemento['id_juridica'] ?>"  class="btn btn-secondary">Colaboradores</a>
        <a href="maisInformacoesEmpresa.php?id=<?php echo $elemento['id_juridica'] ?>" class="btn btn-info">Informações</a>
      </div>
    </div>
  </div>
  </br>
  <?php } ?>
</div>


