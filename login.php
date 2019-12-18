<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="jquery/1.5.2.js"></script>
	<script type="text/javascript" src="jquery/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript" src="js/bootstrap.js" ></script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <style type="text/css">
    body {
        background: #ffffff;
        /*background: linear-gradient(to right, #ffffff, #005453);*/
    }

    </style>
    
    
    <title>Sistema de Login - Alan Araujo</title>
</head>
<body>
    <br>
    <br>
    <div id="main" class="d-flex justify-content-center" >

    <div class="card bg-light mb-6" style="max-width: 22rem;">
        <div class="card-header">Sistema de Login</div>
            <div class="card-body">
                <img src="imgs/LOGO-SITE-425X80-GRANDE.png" height="30rem" width="130rem" style="background-color: #000000;"/>
            <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Login</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail   " required autofocus>
                <small id="emailHelp" class="form-text text-muted">Jamais forneça seus dados pessoais a terceiros.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" required> 
            </div>
            <div class="form-check" style=" text-align: center;">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Manter-se conectado</label>
            </div>
            <hr />
            <button type="submit" class="btn btn-primary">Entrar</button>
            </form>

            </div>
        </div>
    </div>

</body>
</html>