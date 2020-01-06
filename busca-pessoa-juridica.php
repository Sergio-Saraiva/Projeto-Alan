<?php
    include_once('classes/Empresa.php');

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
        foreach($resultado_pesquisa as $elemento){ 
            echo "<div class='card'>";
                echo "<h5 class='card-header'> <i class='fa fa-briefcase' aria-hidden='true'></i>  ".$elemento['fantasia']."</h5>";
                echo "<div class='card-body'>";
                        echo "<p class='card-text'>";
                        echo "<b clas='h6'>RAZÃO SOCIAL: </b>".$elemento['razao']."</br>";
                        echo "<b clas='h6'>CNPJ:</b> ".$elemento['cnpj']."</br>";
                        echo "<b clas='h6'>E-MAIL:</b> ".$elemento['email']."</br>";
                        echo "</p>";
                    ?>
                    <div class="btn-group">
                        <form method="post" action="servicos.php" id="submeterServicos">
                            <a href="#" onClick="document.getElementById('submeterServicos').submit();aguardar();" class="btn btn-primary">Serviços</a>
                            <input type="hidden" name="id" id="id" value="<?php print $elemento['id_juridica'] ?>" />
                        </form>
                        &nbsp
                        <form method="post" action="Contatos-Empresa.php" id="submeterColaborador">
                            <a href="#" onClick="document.getElementById('submeterColaborador').submit();aguardar();" class="btn btn-secondary">Contatos</a>
                            <input type="hidden" name="id" id="id" value="<?php print $elemento['id_juridica'] ?>" />
                        </form>
                        &nbsp
                        <form method="post" action="maisInformacoesEmpresa.php" id="submeterInfo">
                            <a href="#" onClick="document.getElementById('submeterInfo').submit();aguardar();" class="btn btn-info">Informações</a>
                            <input type="hidden" name="id" id="id" value="<?php print $elemento['id_juridica'] ?>" />
                        </form>

                    </div>
                    <?php
                echo "</div>";
            echo "</div>";
            echo "</br>";
        } //fim do foreach
    }
    
?>