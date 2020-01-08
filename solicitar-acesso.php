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
    <title>Solicitar Acesso - Alan Araujo</title>

</head>
<body>
    <br>

    <div id="main" class="d-flex justify-content-center">

    <div class="card bg-light mb-6" style="max-width: 22rem;">
        <div class="card-header">Solicitar Acesso ao Sistema</div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <img src="imgs/icone_alan_eng.png" height="40rem" width="40rem" />
                </div>
            
                <!-- Alerta-->
                <?php
                    if(isset($_GET['erro']) and $_GET['erro']==1){
                        echo '</br>';
                        echo "<div class='alert alert-danger' role='alert' style='font-size: 0.9rem; text-align:center;'>";
                        echo "Já existe usuário cadastrado para o e-mail informado.";
                        echo "</div>";
                    }
                    if(isset($_GET['erro']) and $_GET['erro']==2){
                        echo '</br>';
                        echo "<div class='alert alert-success' role='alert' style='font-size: 0.9rem; text-align:center;'>";
                        echo "Solicitação realizada com sucesso! Aguarde a autorização do administrador para dar início a seu acesso.";
                        echo "</div>";
                    }
                ?>
                <div id="alerta" style="font-size: 0.9rem; text-align:center; display:none;">
                    </br>
                    <div  class="alert alert-warning" role="alert" >
                        <span id="textoAlerta">sdfs</span>
                    </div>
                </div>

                <!--- Fim de alerta--->
            <form action="enviarSolicitarAcesso.php" method="post" id="enviarSolicitar" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="solicitarNome">Nome completo</label>
                <input type="text" name="solicitarNome" class="form-control" id="solicitarNome" aria-describedby="usuarioHelp" placeholder="Nome" required autofocus>
                <small id="usuarioHelp" class="form-text text-muted">Ex.: Luis Antônio Pereira Silva</small>
            </div>
            <div class="form-group">
                <label for="solicitarFuncao">Função</label>
                <input type="text" name="solicitarFuncao" class="form-control" id="solicitarFuncao" aria-describedby="usuarioHelp" placeholder="Função" required autofocus>
                <small id="usuarioHelp" class="form-text text-muted">Ex.: Colaborador, Cliente, Fornecedor. </small>
            </div>
            <div class="form-group">
                <label for="solicitarEmail">E-mail</label>
                <input type="email" name="solicitarEmail" class="form-control" id="solicitarEmail" aria-describedby="usuarioHelp" placeholder="Nome" required>
                <small id="usuarioHelp" class="form-text text-muted">Ex.: antonio.pereira@exemplo.com</small>
            </div>
            <div class="form-group">
                <label for="solicitarSenha1">Senha</label>
                <input type="password" name="solicitarSenha1" class="form-control" id="solicitarSenha1" placeholder="Senha" required> 
                <label for="solicitarSenha2">Confirmação da Senha</label>
                <input type="password" name="solicitarSenha2" class="form-control" id="solicitarSenha2" placeholder="Cofirmação de Senha" required> 
                <small id="usuarioHelp" class="form-text text-muted">A senha deve conter entre 6 e 20 caracteres, e aconselha-se evitar referencias ao próprio nome.</small>
            </div>
            
            <button type="button" href="#" onClick="checkForm();" class="btn btn-primary">Solicitar</button>
            <label style="font-size:0.9rem; text-align:right; float: right;"><label><a href="./" class="btn btn-outline-secondary" >Voltar</a></label></label>
            <hr />
            <div class="text-center text-muted" style="margin-bottom:-0rem; font-size:0.8rem;">Alan Araujo - 2020 &copy</></div>
            
            </form>
            

            </div>
        </div>
    </div>
    </br>
</body>
 <script type="text/javascript" src="js/jsSolicitarAcesso.js"></script>
</html>