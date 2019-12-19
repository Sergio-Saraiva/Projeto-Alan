<?php
      session_start(); // Inicia a sessão
      session_destroy(); // Destrói a sessão limpando todos os valores salvos
      header("Location: index.php?erro=3"); exit; // Redireciona o visitante
?>