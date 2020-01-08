<?php 
include 'cabecalho.php';
include 'config.php';

if( !($_SESSION['UsuarioNivel'] < 2)){header("Location: erro.php"); exit;}

$cadastros = new Cadastros;

//Nos campos abaixo (User ativo, Privilégios do user)
$usuarios_admin = $cadastros->listarCadastros(1,1);
$usuarios_not_admin = $cadastros->listarCadastros(1,2);
$usuarios_sem_acesso = $cadastros->listarCadastros(0,2);

//Data atual
$data_atual = date('y/m/d');


///Fim de tratamentos iniciais
?>

<?php
//alertas
  if(isset($_GET['alerta']) and $_GET['alerta']==1){
      
      echo "<div class='alert alert-success' role='alert' style='font-size: 0.9rem; text-align:center;'>";
      echo "Permissão <b>concedida</b> com sucesso!";
      echo "</div>";
  }
  if(isset($_GET['alerta']) and $_GET['alerta']==2){
    
    echo "<div class='alert alert-danger' role='alert' style='font-size: 0.9rem; text-align:center;'>";
    echo "Permissão <b>retirada</b> com sucesso!";
    echo "</div>";
  }
  if(isset($_GET['alerta']) and $_GET['alerta']==3){
    
    echo "<div class='alert alert-success' role='alert' style='font-size: 0.9rem; text-align:center;'>";
    echo "O acesso à plataforma foi liberado para o usuário selecionado com sucesso!";
    echo "</div>";
  }
  //fim de alertas
?>

<div class="card text-center">
  <div class="card-header">

    <div class="container">
      <div class="row no-gutters justify-content-center">

        <!-- concedendo acesso -->
        <div class="col-12 col-sm-6 col-md-7.5 justify-content-center" >
          <h4><b>Conceder</b> acesso admnistrativo</h4>
          
            <form class="form-inline justify-content-center" action="modificarConta.php" method="post">
              <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name='id'>
                <option selected value='f'>Usuários</option>

              <?php foreach($usuarios_not_admin as $usersSem){

                if($usersOff['id'] != $_SESSION['UsuarioID']){
                  echo "<option name='id' value='".$usersSem['id']."'>".$usersSem['nome']."</option>";
                }
                
              } ?>
              </select>
              <input type="hidden" name="operacao" value="1" />
              <button type="submit" class="btn btn-primary my-1">Conceder</button>
            </form>
            <hr>
        </div>

        <!-- retirar acesso -->
        <div class="col-12 col-sm-6 col-md-7.5 justify-content-center" >
          <h4><b>Retirar</b> acesso admnistrativo</h4>
          
            <form class="form-inline justify-content-center" action="modificarConta.php" method="post">
              <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
              <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name='id'>
                <option selected value='f'>Usuários</option>

              <?php foreach($usuarios_admin as $usersCom){
                 if($usersCom['id'] != $_SESSION['UsuarioID']){
                  echo "<option value='".$usersCom['id']."'>".$usersCom['nome']."</option>";
                 }
              } ?>
              </select>
              <input type="hidden" name="operacao" value="2" />
              <button type="submit" class="btn btn-danger my-1">Retirar</button>
            </form>
            <hr>
        </div>

      </div>
    </div> <!-- fim do containers -->

  </div>
</div> <!-- fim do card -->

</br>

<div class="card text-center"> <!-- inicio de card dos usuarios aguardando acesso -->
  <div class="card-header">
    <h5>Usuários aguardando liberação de acesso</h5>
  </div>

  <?php
    foreach($usuarios_sem_acesso as $usersOff){
  ?>
    <form method="post" id="liberarConta<?php echo $usersOff['id'] ?>" action="modificarConta.php">
      <div class="card">
      <div class="card-body text-left">
        <h6>
        <i class="fa fa-user-circle" aria-hidden="true"></i>
          <?php echo $usersOff['nome']; ?>
          <a href="#" onClick="document.getElementById('liberarConta<?php echo $usersOff['id'] ?>').submit();" class="btn btn-success" style="float:right;"><i class="fa fa-check" aria-hidden="true"></i> Liberar</a>
        </h6>
        <small id="usuarioHelp" class="form-text text-muted"><b>Função:</b> <?php echo $usersOff['funcao']; ?></small>
        <small id="usuarioHelp" class="form-text text-muted"><b>E-mail:</b> <?php echo $usersOff['email']; ?></small>
        <small id="usuarioHelp" class="form-text text-muted"><b>Cadastro:</b> <?php echo $usersOff['cadastro'];?></small>
      </div>
      </div>
      <input type="hidden" name="id" value="<?php echo $usersOff['id']?>" />
      <input type="hidden" name="operacao" value="3" />
    </form>

  <?php  
    }
  ?>


  
  <div class="card-footer text-muted">
    
  </div>
</div> <!-- fim de card -->




<?php include 'rodape.php'; ?>