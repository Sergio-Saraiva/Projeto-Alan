<?php
    include 'cabecalho.php';
    include_once('config.php') ;

    $id = $_POST['id'];

    $empresa = new Empresa();

    $nomeEmpresa = $empresa->selecionaEmpresaNome($id);

    $lista = $empresa->contatosEmpresa($id);

?>


<h2 align="center">Contatos da empresa <?php echo $nomeEmpresa ?></h2>
<hr>    

<?php foreach($lista as $registro)
 { ?>

       

            <div class="card">
                <h5 class="card-header"><i class="fa fa-address-card" aria-hidden="true"></i><?php echo " ".$registro['nomeResp'] ?></h5>
                <div class="card-body">
                <p class="card-text">
                <b class="h6">NOME :</b> <?php echo $registro['nomeResp'] ?></br>
                            <b class="h6">SETOR:</b> <?php echo $registro['setor'] ?></br>
                            <!--
                            <b class="h6">Data de Nascimento:</b> <?php echo $registro['dataDeNasc'] ?></br>
                            <b class="h6">Sexo:</b> <?php echo $registro['sexo'] ?></br>
                            <b class="h6">E-mail:</b> <?php echo $registro['email'] ?></br>
                            -->
                </p>
                <b class="h6">E-MAILS:</br></b>
                <?php 
                    $emailContatos = $empresa->contatosEmpresaEmails($registro['idcontato_juridica']); 
                    foreach($emailContatos as $dados){
                ?> 
            
                <?php echo $dados['email'] ?></br>

                <?php 
                    }
                ?>

                <!-- PAREI AQUI, ADAPTAR $emailContatos PARA MOSTRAR TODOS OS EMAILS
                <div class="btn-group">
                    <a href="#" class="btn btn-primary">Serviços</a>
                    <a href="#"  class="btn btn-secondary">Colaboradores</a>
                    <a href="#" class="btn btn-info">Informações</a>
                </div>
                -->
                </div>
            </div>
            </br>



            <?php 

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