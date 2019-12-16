<?php
    include_once('classes/Empresa.php');

    //recuperando o valor da palavra
    
    $razao_psq = $_POST['palavra'];
    

    $empresa = new Empresa();

    $resultado_pesquisa = $empresa->consultaPessoas($razao_psq);

    if(count($resultado_pesquisa)<=0 ){
        echo "<p class='text-center'>";
        echo "Nenhum cadastro encontrado.";
        echo "</p>";
        
    }else{
        foreach($resultado_pesquisa as $elemento){ 
            echo "<div class='card'>";
                echo "<h5 class='card-header'>".$elemento['fantasia']."</h5>";
                echo "<div class='card-body'>";
                        echo "<p class='card-text'>";
                        echo "<b>RAZÃO SOCIAL: </b>".$elemento['razao']."</br>";
                        echo "<b>CNPJ:</b> ".$elemento['cnpj']."</br>";
                        echo "<b>ESTADO:</b> ".$elemento['estado']."&nbsp &nbsp <b>CIDADE: </b>".$elemento['cidade']." &nbsp &nbsp <b>CEP:</b> ".$elemento['cep']."</br>";
                        echo "<b>ENDEREÇO:</b> ".$elemento['endereco']."</br>";
                        echo "<b>TELEFONE:</b> ".$elemento['telefone']."</br>";
                        echo "</p>";
                    echo "<a href='projetos.php?id=".$elemento['id']."' class='btn btn-primary'>Projetos</a> <button type='button' class='btn btn-info'>Editar</button> <a href='#' class='btn btn-danger'>Deletar</a>";
                echo "</div>";
            echo "</div>";
        } //fim do foreach
    }
    
?>