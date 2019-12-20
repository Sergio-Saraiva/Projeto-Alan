

<head>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

  
  <div class="float-left" style="position: relative;" >
  <div class="d-flex" id="wrapper" style="position:absolute; ">
    <!-- Sidebar -->
    <div class="bg-sidebar border-right" id="sidebar-wrapper">
      <div class="sidebar-heading" style="text-align:right"> <img src="img\logo.png" href="home.php" width="135rem" height="30rem" ></div>
      <div class="list-group list-group-flush">
        <a href="home.php" class="list-group-item list-group-item-action bg-primary">Home</a>
        <a href="registro-pessoa.php" class="list-group-item list-group-item-action bg-primary">Registro</a>
        <a href="consultar.php" class="list-group-item list-group-item-action bg-primary">Consultar</a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-primary">sair</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="position:fixed;">
        <button class="btn btn-primary" id="menu-toggle"><i class='fa fa-arrow-left' aria-hidden='true'></i></br>Recolher</button>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="jquery/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");

      if($("#wrapper").hasClass("toggled")){
        $('#menu-toggle').html("<i class='fa fa-bars' aria-hidden='true'></i></br>Menu");
      }else{
        $('#menu-toggle').html("<i class='fa fa-arrow-left' aria-hidden='true'></i></br>Recolher");
      }
      
    });
  </script>



