<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style type="text/css">
    body {background: #ffffff;}
    </style>
    
    
    <title>Sistema de Login - Alan Araujo</title>
</head>
<body>
    <br>

    <div id="main" class="d-flex justify-content-center">

    <div class="card bg-light mb-6" style="max-width: 22rem;">
        <div class="card-header">Sistema de Login</div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <img src="imgs/icone_alan_eng.png" height="40rem" width="40rem" />
                </div>
            
                <!-- Alerta-->
                <?php
                    if(isset($_GET['erro']) and $_GET['erro']==1){
                        echo '</br>';
                        echo "<div class='alert alert-warning' role='alert' style='font-size: 0.9rem; text-align:center;'>";
                        echo "E-mail e/ou senha não conferem, verifique as informações e tente novamente.";
                        echo "</div>";
                    }
                    if(isset($_GET['erro']) and $_GET['erro']==2){
                        echo '</br>';
                        echo "<div class='alert alert-danger' role='alert' style='font-size: 0.9rem; text-align:center;'>";
                        echo "Página restrita, efetue login para ter acesso.";
                        echo "</div>";
                    }
                    if(isset($_GET['erro']) and $_GET['erro']==3){
                        echo '</br>';
                        echo "<div class='alert alert-success' role='alert' style='font-size: 0.9rem; text-align:center;'>";
                        echo "Sessão finalizada com sucesso.";
                        echo "</div>";
                    }
                    if(isset($_GET['erro']) and $_GET['erro']==4){
                        echo '</br>';
                        echo "<div class='alert alert-danger' role='alert' style='font-size: 0.9rem; text-align:center;'>";
                        echo "Usuário se encontra em processo de análise para liberação de acesso à plataforma.";
                        echo "</div>";
                    }
                ?>
                <!--- Fim de alerta--->
            <form action="validacao.php" method="post">
            <div class="form-group">
                <label for="txtUsuario">Login</label>
                <input type="email" name="email" class="form-control" id="txtUsuario" aria-describedby="usuarioHelp" placeholder="E-mail" required autofocus>
                <small id="usuarioHelp" class="form-text text-muted text-center">Jamais forneça seus dados pessoais a terceiros.</small>
            </div>
            <div class="form-group">
                <label for="txtSenha">Senha</label>
                <input type="password" name="senha" class="form-control" id="txtSenha" placeholder="Senha" required> 
                <small id="usuarioHelp" class="form-text text-muted text-center">Senha informada no processo da solicitação de cadastro.</small>
            </div>
            
            <button type="submit" class="btn btn-primary">Entrar</button>
            <label style="font-size:0.9rem; text-align:right; float: right;"><label><a href="solicitar-acesso.php" class="btn btn-outline-secondary" >Solicitar acesso</a></label></label>
            <hr />
            <div class="text-center text-muted" style="margin-bottom:-0rem; font-size:0.8rem;">Alan Araujo - 2020 &copy</></div>
            
            </form>
            

            </div>
        </div>
    </div>

</body>
</html>