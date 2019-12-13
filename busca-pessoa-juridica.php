<?php
    include_once('classes/Empresa.php');

    //recuperando o valor da palavra
    
    $razao_psq = $_POST['palavra'];
    

    $empresa = new Empresa();

    $resultado_pesquisa = $empresa->consultaPessoasJuridicas($razao_psq);

    if(count($resultado_pesquisa)<=0 ){
        echo "Nenhum cadastro encontrado.";
        
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
                    echo "<div class='btn-group'>";
                    echo "<a href='projetos.php?id=".$elemento['id_juridica']."' class='btn btn-primary'>Serviços</a>";
                    echo "<a href='colaboradoresEmpresa.php?id=".$elemento['id_juridica']."' class='btn btn-secondary' style='text-color:white;'>Servidores</a>"; 
                    echo "<a href='maisInformacoesEmpresa.php?id=".$elemento['id_juridica']."' class='btn btn-info'>Informações</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "</br>";
        } //fim do foreach
    }
    
?>