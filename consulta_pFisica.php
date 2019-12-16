<?php
//Primeira parte Código de paginação
  $maximo = 2;
  //armazenamos o valor da pagina atual
  $pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1'; 
  //subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
  $inicio = $pagina - 1;
  //multiplicamos a quantidade de registros da pagina pelo valor da pagina atual 
  $inicio = $maximo * $inicio;

?>
<?php 
      require_once 'classes/PessoaFisica.php';
      //$v = $_GET['v'];
      $v = 0;

      $pFisica = new pFisica();
      $lista = $pFisica->listarPessoasFisicas($inicio,$maximo);
      $total = count($lista[2]);

?>




<div class="container">
  <div class="row no-gutters justify-content-center ">
    <div class="col-8 col-sm-6 col-md-7.9 justify-content-center ">
      <h1>Colaboradores Registrados</h1>
      <hr>
    </div>
    
        <div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
          <input name="nomeP" id="nomeP" placeholder="Nome" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        </div>
        
   
  </div>
</div>


<div class="resultado_psq_2" id="resultado_psq_2" style="display: none;">
</div>

<div class="resultado_2" id ="resultado_2" style="display: block;">
  <?php foreach($lista[1] as $dados){ ?>

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

<!----Aqui acrescenta-se o código dos botões de paginação---->
<nav aria-label="...">
<div id="alignpaginacao_2" name="alignpaginacao_2">
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
                    echo "<li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$previous&p=1>Anterior</a></li>";
                } else{
                    echo "<li class='page-item disabled'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$previous&p=1>Anterior</a></li>";
                }   
                   
                
                    for($i=$pagina-$max_links; $i <= $pgs; $i++) {
                        if ($i <= 0){
                        //enquanto for negativo, não faz nada
                        }else{
                            //senão adiciona os links para outra pagina
                            if($i != $pagina){
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo " <li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=".($i)."&p=1>$i</a></li>"; 
                                }else{
                                    echo "<li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=".($i)."&p=1>$i</a></li>"; 
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
                    echo " <li class='page-item'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$next&p=1>Próxima</a></li>";
                }else{
                    echo "<li class='page-item disabled'><a class='page-link' href=".$_SERVER['PHP_SELF']."?pagina=$next&p=1>Próxima</a></li>";
                }
                               
            }
                           
       ?>   
</div>
</ul>
</nav>
<!------ Fim do código de botões de paginação ------->





<head>
      <script type ="text/javascript" src="app2.js"></script>
</head>

