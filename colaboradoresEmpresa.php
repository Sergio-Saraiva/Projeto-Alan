
<?php
    include 'cabecalho.php';
    include_once('classes/Empresa.php') ;

    $id = $_GET['id'];

    $empresa = new Empresa();

    $nomeEmpresa = $empresa->selecionaEmpresaNome($id);

    $lista = $empresa->colaboradoresEmpresa($id);

?>

<h2 align="center">Colaboradores da empresa <?php echo $nomeEmpresa ?></h2>
<hr>    

<?php foreach($lista as $registro)
 { ?>




        <?php 
            $informacoes = $empresa->cEmpresaColaborador($registro['pessoa_idPessoa']); 
            foreach($informacoes as $dados){
            ?>  

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



            <?php }

        ?>

         
         <?php //foreach($lista[3] as $listaenderecos){ 
             //echo "<hr>";
             
             //echo $listaenderecos['logradouro'].", N° ".$listaenderecos['numero'].", ".$listaenderecos['bairro'];
             //echo "</br>";
             //echo $listaenderecos['cidade'].", ".$listaenderecos['estado'];
             //echo "</br>";
             //echo $listaenderecos['CEP'];
            //}
         ?>
         

      
  
 <?php } ?>
 <a href="consultar.php" class="btn btn-outline-secondary">Retornar</a>

 <hr>  


  




<?php 
    include 'rodape.php';
 ?>