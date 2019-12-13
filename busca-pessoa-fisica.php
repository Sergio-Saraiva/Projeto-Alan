<?php
    include_once('classes/PessoaFisica.php');

    //recuperando o valor da palavra
    
    $nome_psq = $_POST['palavra'];
    

    $pFisica = new pFisica();
    $resultado_pesquisa = $pFisica->consultaPessoasFisicas($nome_psq);

    if(count($resultado_pesquisa)<=0 ){
        echo "Nenhum cadastro encontrado.";
        echo $nome_psq."olá";
        
    }else{
        foreach($resultado_pesquisa as $dados){ 
                
            ?>

                
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

        <?php
        } //fim do foreach
    }
    
?>