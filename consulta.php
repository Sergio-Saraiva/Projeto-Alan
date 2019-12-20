<?php
//Primeira parte Código de paginação
  $maximo = 5;
  //armazenamos o valor da pagina atual
  $pagina = isset($_GET['pagina_j']) ? ($_GET['pagina_j']) : '1'; 
  //subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
  $inicio = $pagina - 1;
  //multiplicamos a quantidade de registros da pagina pelo valor da pagina atual 
  $inicio = $maximo * $inicio;

?>

<?php 
      require_once 'classes/Empresa.php';
      //$v = $_GET['v'];
      $v = 0;

      $empresas = new Empresa();
      $lista = $empresas->listarPessoasJuridicas($inicio,$maximo);
      $total = count($lista[2]);

    
?>

<head>
      <script type ="text/javascript" src="app2.js"></script>
</head>
<!---alerta-->
<div class="alert alert-warning" role="alert" id="alerta" style="display:none; text-align:center">
  Aguarde
  </br>
  <div class="spinner-grow text-warning" role="status">
      <span class="sr-only">Loading...</span>
  </div>
</div>
<!----Fim de alerta--->

<div class="container">
  <div class="row no-gutters justify-content-center">
    <div class="col-8 col-sm-6 col-md-7.9 justify-content-center" >
      <h1>Empresas Registradas</h1>
      <hr>
    </div>
    
      <div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
          <input name="razao_psq" id="razao_psq" placeholder="Razão Social" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
          
        </div>
        
        <div class="form-check-wg">
            <input class="form-check-input" type="radio" name="tipoDeBusca" id="buscarnarazao" value="razao" checked>
            <label class="form-check-label" for="buscarnarazao">
              Razão Social &nbsp&nbsp&nbsp&nbsp
            </label>
            <input class="form-check-input" type="radio" name="tipoDeBusca" id="buscarnocnpj" value="cnpj">
            <label class="form-check-label" for="buscarnocnpj">
              CNPJ
            </label>
          </div>
          
      </div>
        
   
  </div>
</div>


<div class="resultado_psq" id="resultado_psq" style="display: none;">
</div>
<div class="resultado" id ="resultado" style="display: block;">
  <?php foreach($lista[1] as $elemento){ ?>
  <div class="card">
    <h5 class="card-header"><i class="fa fa-briefcase" aria-hidden="true"></i><?php echo " ".$elemento['fantasia'] ?><div class="btn-group float-right">
        <form method="post" action="deleta-pessoa-juridica.php" id="submeterDelete<?php echo $elemento['id_juridica'] ?>">
            <a href="#" onClick="document.getElementById('submeterDelete<?php echo $elemento['id_juridica'] ?>').submit();aguardar();" class="btn btn-primary"><i class="fas fa-trash-alt"></i></a>
            <input type="hidden" name="id" id="id" value="<?php echo $elemento['id_juridica'] ?>"/>
        </form></h5>
    
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
        <form method="post" action="servicos.php" id="submeterServicos">
            <a href="#" onClick="document.getElementById('submeterServicos').submit();aguardar();" class="btn btn-primary">Serviços</a>
            <input type="hidden" name="id" id="id" value="<?php print $elemento['id_juridica'] ?>" />
        </form>
        &nbsp
        <form method="post" action="colaboradoresEmpresa.php" id="submeterColaborador">
            <a href="#" onClick="document.getElementById('submeterColaborador').submit();aguardar();" class="btn btn-secondary">Contatos</a>
            <input type="hidden" name="id" id="id" value="<?php print $elemento['id_juridica'] ?>" />
        </form>
        &nbsp
        <form method="post" action="maisInformacoesEmpresa.php" id="submeterInfo">
            <a href="#" onClick="document.getElementById('submeterInfo').submit();aguardar();" class="btn btn-info">Informações</a>
            <input type="hidden" name="id" id="id" value="<?php print $elemento['id_juridica'] ?>" />
        </form>

      </div>
    </div>
  </div>
  </br>
  <?php } ?>
</div>


<!----Aqui acrescenta-se o código dos botões de paginação---->
<nav aria-label="...">
<div id="alignpaginacao" name="alignpaginacao">
<ul class="pagination justify-content-center">
       <?php
            //determina de quantos em quantos links serão adicionados e removidos
            $max_links = 4;
            //dados para os botões
            $previous = $pagina - 1; 
            $next = $pagina + 1; 
            //usa uma funcção "ceil" para arrendondar o numero pra cima, ex 1,01 será 2
            
            $pgs = ceil($total / $maximo); 
            
            //se a tabela não for vazia, adiciona os botões
            if($pgs > 1 ){   
                echo "<br/>"; 
                //botao anterior
                if($previous > 0){
                    echo "<li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina_j=$previous>Anterior</a></li>";
                } else{
                    echo "<li class='page-item disabled'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina_j=$previous>Anterior</a></li>";
                }   
                   //$pgs;

                   ///Verificando se já chegou nas últimas paginas
                   if($pagina >= $pgs - $max_links){
                     $aupg = $pgs;
                   }else{
                    $aupg = $pagina+$max_links;
                   }
                
                    for($i=$pagina-$max_links; $i <= $aupg; $i++) {
                        if ($i <= 0){
                        //enquanto for negativo, não faz nada
                        }else{
                            //senão adiciona os links para outra pagina
                            if($i != $pagina){
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo " <li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina_j=".($i).">$i</a></li>"; 
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina_j=".($i).">$i</a></li>"; 
                                }
                            } else{
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo "<li class='page-item active'><a class='page-link' href='#'><span> ".$i."</span></a></li>"; 
                                }else{
                                    echo "<li class='page-item active'><a class='page-link' href='#'><span> ".$i."</span></a></li>";
                                }
                            } 
                        }
                    }
                       
                
                   
                //botao proximo
                if($next <= $pgs){
                    echo " <li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina_j=$next>Próxima</a></li>";
                }else{
                    echo "<li class='page-item disabled'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina_j=$next>Próxima</a></li>";
                }
                               
            }
                           
       ?>   
</div>
</ul>
</nav>
<!------ Fim do código de botões de paginação ------->


