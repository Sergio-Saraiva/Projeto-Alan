<?php require_once 'cabecalho.php';
      require_once 'classes/Empresa.php';

      $v = $_GET['v'];
?>
<?php 
  $empresas = new Empresa();
  $lista = $empresas->listar();

  if($v == 1){
    echo '<div class="alert alert-success" role="alert">
            Empresa cadastrada com sucesso!
            </div>';
}
?>
<h1>Empresas Registradas</h1>
<hr>
<table class="table">
  <form method="POST" action="processaConsulta.php"><label>CNPJ: <input type="text" name="cnpj" id="cnpj"></label></form>

  <thead class="thead-dark">
    <tr>
      <th scope="col">CNPJ</th>
      <th scope="col">Razão Social</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">cep</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($lista as $elemento){ ?>
    <tr>
      <td><?php echo $elemento['cnpj'] ?></td>
      <td><?php echo $elemento['razao'] ?></td>
      <td><?php echo $elemento['endereco'] ?></td>
      <td><?php echo $elemento['telefone'] ?></td>
      <td><?php echo $elemento['estado'] ?></td>
      <td><?php echo $elemento['cidade'] ?></td>
      <td><?php echo $elemento['cep'] ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<?php 
    include 'rodape.php';  
?>
