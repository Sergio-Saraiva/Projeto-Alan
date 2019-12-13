<?php 
      require_once 'classes/PessoaFisica.php';
      include('cabecalho.php');
      
      //$v = $_GET['v'];
      $v = 0;

      $empresas = new pFisica();
      $lista = $empresas->listar();
?>


<head>  
        
      <script type ="text/javascript" src="app4.js"></script>
      
      
</head>



<div class="container">
  <div class="row no-gutters">
    <div class="col-12 col-sm-6 col-md-8">
      <h1>Empresas Registradas</h1>
      <hr>
    </div>
    
        <form name="form_pesquisa_2" method="POST" action="" id="form_pesquisa_2">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
          <input name="nome_psq" id="nomeP" placeholder="Nome" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        </form>
        
   
  </div>
</div>


<div class="resultado_psq_2" id="resultado_psq_2" >
</div>

<div class="resultado_2" id ="resultado_2" >
  <?php foreach($lista as $dados){ ?>

    <div class="card">
                <h5 class="card-header"><i class="fa fa-address-card" aria-hidden="true"></i><?php echo " ".$dados['Nome'] ?></h5>
                <div class="card-body">
                <p class="card-text">
                <b class="h6">NOME :</b> <?php echo $dados['Nome'] ?></br>
                            <b class="h6">CPF:</b> <?php echo $dados['cpf'] ?></br>
                            <b class="h6">Data de Nascimento:</b> <?php echo $dados['dataDeNasc'] ?></br>
                            <b class="h6">Sexo:</b> <?php echo $dados['sexo'] ?></br>
                            <b class="h6">E-mail:</b> <?php echo $dados['email'] ?></br>
                </p>
                <!--
                <div class="btn-group">
                    <a href="#" class="btn btn-primary">Serviços</a>
                    <a href="#"  class="btn btn-secondary">Colaboradores</a>
                    <a href="#" class="btn btn-info">Informações</a>
                </div>
                -->
                </div>
            </div>
            </br>

  <?php } ?>
</div>


