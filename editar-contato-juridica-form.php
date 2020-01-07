<?php 
    include 'config.php';
    include 'cabecalho.php';

    $id = $_POST['id'];

?>
<h1>Edição de Contato</h1>
<hr>
<h1>Contato</h1>
    <div id="divCont">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nomeResponsavel">Nome do Responsável</label>
                <input class="form-control" type="text" name="nomeResponsavel[]" id="nomeResponsavel">
                <input type="hidden" name="qtdResp" id="qtdResp" value="1">
            </div>
            <div class="form-group col-md-6">
                <label for="setor">Setor</label>
                <input class="form-control" type="text" name="setor[]" id="setor">
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6" id="divEmailC">
            <label for="emailcont">E-Mail</label>
            <i id="addEmailContato" class="far fa-plus-square" onclick="addEmailC(1)"></i><i id="subEmailContato" class="far fa-minus-square" onclick="subEmailC(1)"></i>
            <input id="emailcont" name="emailcont[1][]" type="email" class="form-control" required>
            <div class="invalid-feedback">
                Obrigatório
            </div>
        </div>
            <div class="form-group col-md-6" id="divTel">
                <label for="telefonecont">Telefone</label><i onclick="addTelefone(1)" id="addtelefonecont" class="far fa-plus-square"></i><i onclick="subTelefone(1)" id="subtelefonecont" class=" far fa-minus-square"></i>
                <input class="form-control phone_with_ddd" type="number" id="telefonecont" name="telefonecont[1][]"  placeholder="(__) ____-____" required>
                <div class="invalid-feedback">
                    Obrigatório
                </div>
            </div>
    </div>