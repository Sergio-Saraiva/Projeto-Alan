<?php
    include 'cabecalho.php';
    include_once('config.php') ;

    $id = $_POST['id'];

    $empresa = new Empresa();

    $lista = $empresa->maisInformacoesPessoaJuridica($id);

?>

<div class="text-center">
    <h1 align="center">Informações Gerais Sobre a Empresa</h1>
    <a href="editar-pessoa-juridica-form.php?id=<?php echo $id ?>">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar 
    </a>
    
</div>
<hr>    

<?php foreach($lista[1] as $registro)
 { ?>

    <div role="card" >
     
      <div class="card-body">
        <p class="card-text">
        <b class="h6">NOME FANTASIA:</b> <?php echo $registro['fantasia'] ?></br>
        <b class="h6">RAZÃO SOCIAL:</b> <?php echo $registro['razao'] ?></br>
         <b class="h6">CNPJ:</b> <?php echo $registro['cnpj'] ?></br>
         <b class="h6">E-Mail(s):</b>
         <!-- Listagem de e-mails-->
         <?php 
        
        $email_1 = $empresa->listarEmailPessoasJuridicas($registro['id_juridica']);

        foreach($email_1[2] as $emailsPrincipal){?>
          <?php echo $emailsPrincipal['email_juridica'] ?> / 

        <?php
        };
        ?>
         <!-- Fim de listagem de emails -->
         </br>
         <b class="h6">TELEFONES:</b> <?php foreach($lista[2] as $listatelefonica){ echo $listatelefonica['telefone_juridica']." / "; } ?></br>
         </br>
         <b class="h6">ENDEREÇOS</b>
         <a href="editar-endereco-pessoa-juridica-form.php?id=<?php echo $id ?>">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar 
    </a>
         </br>
         
         <?php foreach($lista[3] as $listaenderecos){ 
             echo "<hr>";
             
             echo $listaenderecos['logradouro'].", N° ".$listaenderecos['numero'].", ".$listaenderecos['bairro'];
             echo "</br>";
             echo $listaenderecos['cidade'].", ".$listaenderecos['estado'];
             echo "</br>";
             echo $listaenderecos['CEP'];
             
        
         }
         ?>
         

     </p>
         <a href="consultar.php" class="btn btn-outline-secondary">Retornar</a>
      </div>
   </div>
 <?php } ?>

 <hr>  


  




<?php 
    include 'rodape.php';
 ?>