<?php

include_once 'config.php';

$pagina_de_erro = 'Location: index.php?erro=1';

$validar = new Validacao();
    
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
      header($pagina_de_erro); exit;
  }
  
  $usuario = $_POST['email'];
  $senha = $_POST['senha'];

// Validação do usuário/senha digitados

$query = $validar->validar($usuario,$senha);

if ($query->rowCount() != 1){
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    header($pagina_de_erro); exit;
} else {
    
     // Salva os dados encontrados na variável $resultado
     $resultado = $query;
    
     // Se a sessão não existir, inicia uma
     if (!isset($_SESSION)) session_start();
   foreach($resultado as $res){
       // Salva os dados encontrados na sessão
     $_SESSION['UsuarioID'] = $res['id'];
     $_SESSION['UsuarioNome'] = $res['nome'];
     $_SESSION['UsuarioNivel'] = $res['nivel'];
   
     // Redireciona o visitante
     header("Location: home.php"); exit;

   }
     
}
  
  
  ?>