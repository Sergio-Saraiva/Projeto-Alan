<?php
//Primeira parte Código de paginação
  $maximo = 5;
  //armazenamos o valor da pagina atual
  $pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1'; 
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
      </div>
        
   
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
        <a href="colaboradoresEmpresa.php?id=<?php echo $elemento['id_juridica'] ?>"  class="btn btn-secondary">Sócios</a>
        <a href="maisInformacoesEmpresa.php?id=<?php echo $elemento['id_juridica'] ?>" class="btn btn-info">Informações</a>
      </div>
    </div>
  </div>
  </br>
  <?php } ?>
</div>

<nav aria-label="...">
<!----Aqui acrescenta-se o código dos botões de paginação---->
<div id="alignpaginacao" name="alignpaginacao">
<ul class="pagination justify-content-center">
       <?php
            //determina de quantos em quantos links serão adicionados e removidos
            $max_links = 3;
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
                    echo "<li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$previous>Anterior</a></li>";
                } else{
                    echo "<li class='page-item disabled'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$previous>Anterior</a></li>";
                }   
                   
                
                    for($i=$pagina-$max_links; $i <= $pgs; $i++) {
                        if ($i <= 0){
                        //enquanto for negativo, não faz nada
                        }else{
                            //senão adiciona os links para outra pagina
                            if($i != $pagina){
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo " <li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a></li>"; 
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a></li>"; 
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
                    echo " <li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$next>Próxima</a></li>";
                }else{
                    echo "<li class='page-item disabled'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$next>Próxima</a></li>";
                }
                               
            }
                           
       ?>   
</div>
</ul>
</nav>
<!------ Fim do código de botões de paginação ------->


