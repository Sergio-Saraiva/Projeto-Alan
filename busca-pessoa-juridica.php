<?php
    include_once('classes/Empresa.php');
    if (!isset($_SESSION)) session_start();

    //recuperando o valor da palavra
    
    $razao_psq = $_POST['palavra'];
    $tBusca = $_POST['tipodebusca'];
    

    $empresa = new Empresa();

    $resultado_pesquisa = $empresa->consultaPessoasJuridicas($razao_psq,$tBusca);

    if(count($resultado_pesquisa)<=0 ){
        echo "<p class='text-center'>";
        echo "Nenhum cadastro encontrado.";
        echo "</p>";
        
    }else{
        foreach($resultado_pesquisa as $elemento){ ?>
            
            <div class="card">
    <h5 class="card-header"><i class="fa fa-briefcase" aria-hidden="true"></i><?php echo " ".$elemento['fantasia'] ?><div class="btn-group float-right">
        
    <?php if( $_SESSION['UsuarioNivel'] < 2){?>
        <form method="post" action="deleta-pessoa-juridica.php" id="submeterDelete<?php echo $elemento['id_juridica'] ?>">
            <a href="#" onClick="document.getElementById('submeterDelete<?php echo $elemento['id_juridica'] ?>').submit();aguardar();" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            <input type="hidden" name="id" id="id" value="<?php echo $elemento['id_juridica'] ?>"/>
        </form>
    <?php }?>
    </h5>
    <div class="card-body">
      <p class="card-text">
        <b clas="h6">RAZÃO SOCIAL:</b> <?php echo $elemento['razao'] ?></br>
        <b clas="h6">CNPJ:</b> <?php echo $elemento['cnpj'] ?></br>
       <!--
          <b>ESTADO:</b> <?php echo $elemento['estado'] ?>&nbsp &nbsp <b>CIDADE:</b> <?php echo $elemento['cidade'] ?> &nbsp &nbsp <b>CEP:</b> <?php echo $elemento['cep'] ?></br>
        <b>ENDEREÇO:</b> <?php echo $elemento['endereco'] ?></br>
        
          <b>TELEFONE:</b> <?php echo $elemento['telefone'] ?></br>
        
        -->
      </p>
      <div class="btn-group">
        <form method="post" action="servicos.php" id="submeterServicos<?php echo $elemento['id_juridica']?>">
            <a href="#" onClick="document.getElementById('submeterServicos<?php echo $elemento['id_juridica']?>').submit();aguardar();" class="btn btn-primary ">Serviços</a>
            <input type="hidden" name="id" id="id" value="<?php echo $elemento['id_juridica'] ?>" />
        </form>
        &nbsp
        <form method="post" action="Contatos-Empresa.php" id="submeterColaborador<?php echo $elemento['id_juridica']?>">
            <a href="#" onClick="document.getElementById('submeterColaborador<?php echo $elemento['id_juridica']?>').submit();aguardar();" class="btn btn-secondary">Contatos</a>
            <input type="hidden" name="id" id="id" value="<?php echo $elemento['id_juridica'] ?>" />
        </form>
        &nbsp
        <form method="post" action="maisInformacoesEmpresa.php" id="submeterInfo<?php echo $elemento['id_juridica']?>">
            <a href="#" onClick="document.getElementById('submeterInfo<?php echo $elemento['id_juridica']?>').submit();aguardar();" class="btn btn-info">Informações</a>
            <input type="hidden" name="id" id="id" value="<?php echo $elemento['id_juridica'] ?>" />
        </form>

      </div>
    </div>
  </div>

            <?php echo "</br>";
        } //fim do foreach
    }
    
?>