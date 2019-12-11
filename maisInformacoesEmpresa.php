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

    <div role="card" >
     
      <div class="card-body">
        <p class="card-text">
        <b class="h6">NOME FANTASIA:</b> <?php echo $registro['fantasia'] ?></br>
        <b class="h6">RAZÃO SOCIAL:</b> <?php echo $registro['razao'] ?></br>
         <b class="h6">CNPJ:</b> <?php echo $registro['cnpj'] ?></br>

         <b class="h6">TELEFONES:</b> <?php foreach($lista[2] as $listatelefonica){ echo $listatelefonica['telefone_juridica']." / "; } ?></br>
         </br>
         <b class="h6">ENDEREÇOS</b></br>
         
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