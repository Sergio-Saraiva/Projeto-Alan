<?php
include 'config.php';
try{
    $empresa = new Empresa();
    $id = $_POST['id'];
    $lista = $empresa->selecionaIdContatoPorIdJuridica($id);
    foreach ($lista as $elemento) {
        $idContato = $elemento['idcontato_juridica'];
        $empresa->deletaTelefoneContato($idContato);
        $empresa->deletaEmailContato($idContato);
    }
    $empresa->deletaContato($id);
    $empresa->deletaTelefone($id);
    $empresa->deletaEmail($id);
    $empresa->deletaEndereco($id);
    $empresa->deletaPessoaJuridica($id);
    header("Location: consultar.php?alerta=1");
}catch(Exception $e){
    Erro::tratarErro($e);
}
?>