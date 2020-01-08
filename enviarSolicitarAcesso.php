<?php 
 include_once 'config.php';
 
 $NOVOcadastro = new Cadastros();
 
 $NOVOcadastro->nome = $_POST['solicitarNome'];
 $NOVOcadastro->funcao = $_POST['solicitarFuncao'];
 $NOVOcadastro->email = $_POST['solicitarEmail'];
 $NOVOcadastro->senha = sha1($_POST['solicitarSenha1']);
 $NOVOcadastro->nivel = 2;
 $NOVOcadastro->ativo = 0;
 
 

    $acao = $NOVOcadastro->inserirNovoCadastro();
    
    if($acao == 0){
        //Cadastro efetuado com sucesso
        $pagina_de_erro = "Location: solicitar-acesso.php?erro=2";    
    }else if($acao == 1){
        //Já existe usuário cadastrado na plataforma para este e-mail!
        $pagina_de_erro = "Location: solicitar-acesso.php?erro=1";    
    }
    
    //$pagina_de_erro = "Location: cadastro-certificado.php?erro=1";
    header($pagina_de_erro); exit;
 ?>