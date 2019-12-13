<?php 
    // conexão com o banco de dados 
   require_once 'classes/Conexao.php';
    //faz a conexão com o BD
    $pdo = Conexao::getConexao();

    //determina o numero de registros que serão mostrados na tela
    $maximo = 3;
    //armazenamos o valor da pagina atual
    $pagina = isset($_GET['pagina']) ? ($_GET['pagina']) : '1'; 
    //subtraimos 1, porque os registros sempre começam do 0 (zero), como num array
    $inicio = $pagina - 1;
    //multiplicamos a quantidade de registros da pagina pelo valor da pagina atual 
    $inicio = $maximo * $inicio;
    
    $queryT= "SELECT * FROM juridica";
    $contadorT = $pdo->query($queryT);
    $total = $contadorT->rowCount() ;

    //$query = "SELECT razao FROM juridica";
    $query = "SELECT * FROM juridica ORDER BY id_juridica LIMIT $inicio,$maximo";

    $strCount = $pdo->query($query);
    
    
        foreach ($strCount as $row) {
            //armazeno o total de registros da tabela para fazer a paginação
            $ver = $row["razao"]; 
            echo $ver;
            echo '</br>';
        }
    

?>
<html>
<body>
<div id="alignpaginacao">
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
                    echo "<div id='botaoanterior'><a href=".$_SERVER['PHP_SELF']."?pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='button' /></a></div>";
                } else{
                    echo "<div id='botaoanteriorDis'><a href=".$_SERVER['PHP_SELF']."?pagina=$previous><input type='submit'  name='bt-enviar' id='bt-enviar' value='Anterior' class='button' disabled='disabled'/></a></div>";
                }   
                   
                echo "<div id='numpaginacao'>";
                    for($i=$pagina-$max_links; $i <= $pgs-1; $i++) {
                        if ($i <= 0){
                        //enquanto for negativo, não faz nada
                        }else{
                            //senão adiciona os links para outra pagina
                            if($i != $pagina){
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo "<a href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a> ..."; 
                                }else{
                                    echo "<a href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a>"; 
                                }
                            } else{
                                if($i == $pgs){ //se for o final da pagina, coloca tres pontinhos
                                    echo "<span class='current'> ".$i."</span> ..."; 
                                }else{
                                    echo "<span class='current'> ".$i."</span>";
                                }
                            } 
                        }
                    }
                       
                echo "</div>";
                   
                //botao proximo
                if($next <= $pgs){
                    echo " <div id='botaoprox'><a href=".$_SERVER['PHP_SELF']."?pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='button'/></a></div>";
                }else{
                    echo " <div id='botaoproxDis'><a href=".$_SERVER['PHP_SELF']."?pagina=$next><input type='submit'  name='bt-enviar' id='bt-enviar' value='Proxima' class='button' disabled='disabled'/></a></div>";
                }
                               
            }
                           
       ?>   
</div>
</body>
</html>