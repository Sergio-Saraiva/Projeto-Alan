

<head>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/font-awesome.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

  
  <div class="float-left" style="position: relative;" >
  <div class="toggled" id="wrapper" style="position:absolute; ">
    <!-- Sidebar -->
    <div class="bg-sidebar border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" style="text-align:right"> <img src="img\logo.png" href="home.php" width="135rem" height="30rem" ></div>
      <div class="list-group list-group-flush">
        <a href="home.php" class="list-group-item list-group-item-action bg-primary">Home</a>
        <a href="registro-pessoa.php" class="list-group-item list-group-item-action bg-primary">Registro</a>
        <a href="consultar.php" class="list-group-item list-group-item-action bg-primary">Consultar</a>
        <!-- acesso restrito-->
        <?php if( $_SESSION['UsuarioNivel'] < 2){?>
          <a href="acessos.php" class="list-group-item list-group-item-action bg-primary">Acesso</a>    
        <?php }?>
        <!-- fim -->
        <a href="logout.php" class="list-group-item list-group-item-action bg-primary">Sair</a>
        <div style="color: #cedbdb; font-size: 0.8rem; text-align:center">
          </br><span style="font-size: 3rem;"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
          </br>Bem vindo</br><p style="margin-bottom: -1.8rem;"><?php echo $_SESSION['UsuarioNome']; ?></p></br>
          <hr style="border-color: #cedbdb; width:6rem; margin-bottom: -0.1rem;"><span style=""><?php echo $_SESSION['UsuarioFuncao']; ?></span>
        </div>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="position:fixed;">
        <button class="btn btn-primary" id="menu-toggle"><i class='fa fa-bars' aria-hidden='true'></i></br>Menu</button>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");

      if(!$("#wrapper").hasClass("toggled")){
        $('#menu-toggle').html("<div class='botaoRecolher'><i class='fa fa-arrow-left' aria-hidden='true''></i></br>Recolher</div>");
      }else{
        $('#menu-toggle').html("<i class='fa fa-bars' aria-hidden='true'></i></br>Menu");
      }
      
    });
  </script>



